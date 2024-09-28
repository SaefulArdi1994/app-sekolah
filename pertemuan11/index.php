<?php 

require 'function.php';
// <!-- Tampung ke variable karyawan -->
$karyawan = query("SELECT * FROM karyawan");

// Ketika tombol cari di klik
if (isset($_POST['cari'])) {
    $karyawan = cari($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
</head>
<body>
    <h3>Daftar Karyawan</h3>

    <a href="tambah.php">Tambah Data Karyawan</a>
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="30" placeholder="Masukkan keyword pencarian" autocomplete="off" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($karyawan)) : ?>

            <tr>
                <td colspan="5" align="center">
                    <p>Data karyawan tidak ditemukan!</p>
                </td>
            </tr>
        
        <?php endif ; ?>

        <?php $i = 1;
        foreach($karyawan as $kry) : ?>
        <tr>
            <td><?= $i++?></td>
            <td><img src="../img/<?= $kry['gambar'] ?>" width="100" ></td>
            <td> <?= $kry['nik'] ?> </td>
            <td> <?= $kry['nama'] ?> </td>
            <td>
                <a href="detail.php?id=<?= $kry['id']?>">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>