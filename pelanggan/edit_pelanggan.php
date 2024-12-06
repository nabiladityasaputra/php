<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Mengambil ID dari parameter URL
$id = $_GET['id'];

// Mengambil data dari database berdasarkan ID
$query = $db->query("SELECT * FROM pelanggan WHERE pelanggan_id = '$id'");
$pelanggan = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce</title>
</head>
<body>
    <h3>Edit Data Pelanggan</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="pelanggan_id" value="<?php echo $pelanggan['pelanggan_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama"
                    value="<?php echo $pelanggan['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email"
                    value="<?php echo $pelanggan['email']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea name="alamat"><?php echo $pelanggan['alamat']; ?></textarea>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>