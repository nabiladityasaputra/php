<?php
// menghubungkan file config dengan index 
include ("../koneksi.php");
session_start(); //mulai sesi
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce</title>
    <style>
        /* membuat styling pada table*/
        table,th,td{
     border: 5px solid;
     border-collapse: collapse;
     padding: 10px;
        }
    </style>
    <ul>
        <li><a href="http://localhost/ecommerce/pelanggan/index.php">Data Pelanggan</a></li>
        <li><a href="http://localhost/ecommerce/produk/index.php">Data Produk</a></li>
    </ul>  
</head>
<body>
<h2>Data Produk</h2>
<!-- Tampilkan Notifikasi Jika Ada -->
    <?php if (isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    <!-- Hapus notifikasi setelah ditampilkan -->
    <?php unset($_SESSION['notifikasi']); ?>
<?php endif; ?>
<table>
    <thead>
        <tr align="center">
            <th>#</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th><a href="tambah_produk.php">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM produk");
        /* perulangan while akan terus berjalan (menampilkan data) 
        selama kondisi $query bernilai true (adanya data pada 
        table */
        while ($produk = $query->fetch_assoc()){
            /* fungsi fetch_assoc digunakan untuk mengambil 
            data perulangan dalam bentuk array */
        ?>
        <!-- kode PHP ditutup untuk menyiapkan kode HTML
        yang akan di looping menggunakan while loop -->

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $produk['namaProduk']?></td>
            <td><?php echo $produk['harga']?></td>
            <td><?php echo $produk['stok']?></td>
        
        <td align="center">
            <a href="edit_produk.php?id=<?php echo $produk['produk_id'] ?>">Edit</a>
            <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="hapus_produk.php?id=<?php echo $produk['produk_id'] ?>">Hapus</a>
        </td>
    </tr>
<?php
    }
?>
</tbody>
</table>
<!-- Menghitung jumlah baris yang ada pada table -->
<p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>