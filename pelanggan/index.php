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
<h2>Data Pelanggan</h2>
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
            <th>Nama Pelanggan</th>
            <th>Email</th>
            <th>Alamat</th>
            <th><a href="tambah_pelanggan.php">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM pelanggan");
        /* perulangan while akan terus berjalan (menampilkan data) 
        selama kondisi $query bernilai true (adanya data pada 
        table */
        while ($pelanggan = $query->fetch_assoc()){
            /* fungsi fetch_assoc digunakan untuk mengambil 
            data perulangan dalam bentuk array */
        ?>
        <!-- kode PHP ditutup untuk menyiapkan kode HTML
        yang akan di looping menggunakan while loop -->

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pelanggan['nama']?></td>
            <td><?php echo $pelanggan['email']?></td>
            <td><?php echo $pelanggan['alamat']?></td>
        
        <td align="center">
            <!-- URL ke halaman edit data dengan menggunakan 
            parameter id pada kolom table -->
            <a href="edit_pelanggan.php?id=<?php echo $pelanggan['pelanggan_id'] ?>">Edit</a>
            <!-- URL untuk menghapus data dengan menggunakan parameter id 
            pada kolom table dan alert konfirmasi hapus data -->
            <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="hapus_pelanggan.php?id=<?php echo $pelanggan['pelanggan_id'] ?>">Hapus</a>
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