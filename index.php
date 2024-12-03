<?php 
include("koneksi.php"); 
// query untuk menampilkan data 
$sql = 'SELECT * FROM data_barang'; 
$result = mysqli_query($conn, $sql); 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<link href="style.css" rel="stylesheet" type="text/css" /> 
<title>Data Barang</title> 
</head> 
<body> 
<div class="container"> 
<h1>Data Barang</h1> 
<div class="main"> 
<table> 
<tr> 
    <th>Gambar</th> 
    <th>Nama Barang</th> 
    <th>Kategori</th> 
    <th>Harga Jual</th> 
    <th>Harga Beli</th> 
    <th>Stok</th> 
    <th>Aksi</th> 
</tr> 
<?php if($result): ?> 
<?php while($row = mysqli_fetch_array($result)): ?> 
<tr> 
    <td><img src="gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>" style="width: 50px; height: auto;"></td> 
    <td><?= $row['nama'];?></td> 
    <td><?= $row['kategori'];?></td> 
    <td><?= $row['harga_jual'];?></td> 
    <td><?= $row['harga_beli'];?></td> 
    <td><?= $row['stok'];?></td> 
    <td>
        <a href="ubah.php?id=<?= $row['id_barang']; ?>">Edit</a> | 
        <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a> |
        <!-- Form untuk tambah stok -->
        <!-- <form method="post" action="tambah_stok.php" style="display:inline;">
            <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>" />
            <input type="number" name="tambah_stok" placeholder="Jumlah Stok" required />
            <input type="submit" name="submit" value="Tambah Stok" />
        </form> -->
    </td> 
</tr> 
<?php endwhile; else: ?> 
<tr> 
    <td colspan="7">Belum ada data</td> 
</tr> 
<?php endif; ?> 
</table> 
</div> 

<!-- Button untuk tambah barang baru -->
<div class="tambah-barang">
    <a href="tambah.php"><button>Tambah Barang</button></a>
</div>

</div> 
</body> 
</html>