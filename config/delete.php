<?php
include 'koneksi.php';
$db = new Database();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $deleteBiografi = $db->delete($id);

    if ($deleteBiografi) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Gagal menghapus data!";
    }
}
?>