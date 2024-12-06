<?php
session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $id = $_POST['produk_id'];
    $nama = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Buat query untuk memperbarui data              
    $sql = "UPDATE produk SET
            namaProduk='$nama',
            harga='$harga',
            stok='$stok'
            WHERE produk_id=$id";

    $query = mysqli_query($db, $sql);
    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data produk berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data produk gagal diperbarui!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>