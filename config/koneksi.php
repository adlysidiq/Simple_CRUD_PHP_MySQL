<?php 

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "biodata_db";
    public $koneksi;

    public function __construct() {
        $this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->koneksi->connect_error) {
            die("Koneksi gagal: " . $this->koneksi->connect_error);
        }
    }

    public function getAll() {
        $sql = "SELECT 
                    biografi.id, 
                    biografi.nama_lengkap, 
                    biografi.tanggal_lahir, 
                    biografi.jenis_kelamin, 
                    biografi.email, 
                    biografi.telepon, 
                    biografi.jalan, 
                    biografi.kode_pos, 
                    alamat.desa, 
                    alamat.kecamatan, 
                    alamat.kota, 
                    alamat.provinsi
                FROM biografi
                JOIN alamat ON biografi.alamat_id = alamat.id";
        
        $result = $this->koneksi->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getById($id) {
        $sql = "SELECT 
                    biografi.id, 
                    biografi.nama_lengkap, 
                    biografi.tanggal_lahir, 
                    biografi.jenis_kelamin, 
                    biografi.email, 
                    biografi.telepon, 
                    biografi.jalan, 
                    biografi.kode_pos, 
                    alamat.desa, 
                    alamat.kecamatan, 
                    alamat.kota, 
                    alamat.provinsi
                FROM biografi
                JOIN alamat ON biografi.alamat_id = alamat.id
                WHERE biografi.id = $id";
    
        $getid = $this->koneksi->query($sql);
    
        if ($getid->num_rows > 0) {
            return $getid->fetch_assoc();
        } else {
            return null;
        }
    }

    public function Update($id, $nama, $tanggallahir, $jeniskelamin, $email, $telepon, $jalan, $kode_pos, $desa, $kecamatan, $kota, $provinsi) {
        $sqlUpdate = "UPDATE biografi 
                JOIN alamat ON biografi.alamat_id = alamat.id
                SET 
                    biografi.nama_lengkap = '$nama', 
                    biografi.tanggal_lahir = '$tanggallahir', 
                    biografi.jenis_kelamin = '$jeniskelamin', 
                    biografi.email = '$email', 
                    biografi.telepon = '$telepon', 
                    biografi.jalan = '$jalan',
                    biografi.kode_pos = '$kode_pos', 
                    alamat.desa = '$desa', 
                    alamat.kecamatan = '$kecamatan', 
                    alamat.kota = '$kota', 
                    alamat.provinsi = '$provinsi'
                WHERE biografi.id = $id";

        $update = $this->koneksi->query($sqlUpdate);      
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sqldelete = "DELETE FROM alamat where id = $id";
        $sql = "DELETE FROM biografi where id = $id";
        $delete = $this->koneksi->query($sqldelete);
        $delete = $this->koneksi->query($sql);
        if($delete) {
            return true;
        }
    }

    public function post($desa, $kecamatan, $kota, $provinsi, $nama, $tanggallahir, $jeniskelamin, $email, $telepon, $jalan, $kode_pos) {
        $sqlAlt = "INSERT INTO alamat (desa, kecamatan, kota, provinsi) 
                   VALUES ($desa, $kecamatan, $kota, $provinsi)";        
        $postAlt = $this->koneksi->query($sqlAlt);
        if ($postAlt) {
            $alamatID = $this->koneksi->insert_id;
            $sqlBio = "INSERT INTO biodata (nama_lengkap, tanggal_lahir, jenis_kelamin, email, telepon, jalan, kode_pos, alamat_id) 
                       VALUES ($nama , $tanggallahir, $jeniskelamin, $email, $telepon, $jalan, $kode_pos, $alamatID)";
            $postBio = $this->koneksi->query($sqlBio);
            if ($postBio) {
                return "Data berhasil ditambahkan!";
            } else {
                return "Gagal menambahkan biodata: " . $this->koneksi->error;
            }
        } else {
            return "Gagal menambahkan alamat: " . $this->koneksi->error;
        }
    }
}


?>