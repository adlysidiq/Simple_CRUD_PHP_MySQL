CRUD Biodata dengan PHP & MySQL

Deskripsi Proyek

ini adalah proyek CRUD (Create, Read, Update, Delete) sederhana menggunakan PHP dan MySQL.
Proyek ini memungkinkan pengguna untuk mengelola data biodata dengan fitur:

~~ Menambahkan data baru
~~ Menampilkan data dalam tabel
~~ Mengedit data yang sudah ada
~~ Menghapus data

Teknologi Yang Digunakan

~~ PHP (Vanila/Tanpa framework, hanya menggunakan pure PHP)
~~ MySQL (Sebagai database untuk menyimpan data)
~~ Boostrap (Untuk tampilan yang responsif)
~~ JavaScript (jQuery Untuk validasi form dari interaksi UI)

Struktur Folder

kosong

Instalasi & Setup

2. Konfigurasi Database
~~ Buat database baru di phpmyadmin bernama biodata_db
~~ Jalankan SQL berikut untuk membuat tabel:

sql : 

CREATE TABLE biografi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    email VARCHAR(100) NOT NULL,
    telepon VARCHAR(15),
    alamat_id INT,
    FOREIGN KEY (alamat_id) REFERENCES alamat(id) ON DELETE CASCADE
);

CREATE TABLE alamat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    desa VARCHAR(100),
    kecamatan VARCHAR(100),
    kota VARCHAR(100),
    provinsi VARCHAR(100)
);

~~ Ubah file config/koneksi.php sesuai dengan kredensial database-mu.

3. Jalankan di Browser
~~ Jalankan di server local XAMPP dan taruh file nya di XAMPP/htdocs/Simple_CRUD_PHP_MySQL
~~ Nyalakan apache dan  MySQL di xampp
~~ Buka browser dan akses :
        http://localhost/Simple_CRUD_PHP_MySQL


Lisensi 

Proyek ini dibuat untuk tujuan pembelajaran dan dapat digunakan serta dimodifikasi sesuai kebutuhan
