<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce</title>
</head>
<body>
    <h3>Tambah Data Produk</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="namaProduk" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
        </table>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </form>
</body>
</html>