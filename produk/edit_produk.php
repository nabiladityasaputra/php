<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Mengambil ID dari parameter URL
$id = $_GET['id'];

// Mengambil data dari database berdasarkan ID
$query = $db->query("SELECT * FROM produk WHERE produk_id = '$id'");
$produk = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa | SMK Negeri 4 Tanjungpinang</title>
</head>
<body>
    <h3>Edit Data Produk</h3>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="produk_id" value="<?php echo $produk['produk_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="namaProduk"
                    value="<?php echo $produk['namaProduk']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga"
                    value="<?php echo $produk['harga']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>
                    <input type="text" name="stok"
                    value="<?php echo $produk['stok']; ?>" required>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>