

<?php
include 'koneksi.php';
$db = new Database();
if(isset($_POST['kirim'])) {
    $nama           = $_POST['nama'];
    $tanggallahir   = $_POST['tanggallahir'];
    $jeniskelamin   = $_POST['jeniskelamin'];
    $email          = $_POST['email'];
    $telepon        = $_POST['telepon'];
    $jalan          = $_POST['jalan'];
    $kode_pos       = $_POST['kodepos'];
    $desa           = $_POST['desa'];
    $kecamatan      = $_POST['kecamatan'];
    $kota           = $_POST['kota'];
    $provinsi       = $_POST['provinsi'];
    $post = $db->post($nama, $tanggallahir, $jeniskelamin, $email, $telepon, $jalan, $kode_pos, $desa, $kecamatan, $kota, $provinsi);
    header('Location : ../view/index.php');
}

    ?>