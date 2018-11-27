<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}

require 'functions.php';
$mahasiswa=query("SELECT * FROM mahasiswa");

// tombol cari ditekan
// cari pada line 7 adalah name dari button
if(isset($_POST["cari"]))
{
    // cari line10 adalah function cari dan keyword adalah name dari inputan text
    $mahasiswa=cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-default" role="navigation">
           
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Daftar Mahasiswa</a></li>
                <li><a href="http://localhost/14/registrasi.php">Registrasi</a></li>
            </ul>
            <!-- <form class="navbar-form navbar-right" role="search"> -->
            <form class="navbar-form navbar-right" action="" method="post">
                <div class="form-group">
                <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
                </div>
                <button type="submit" name="cari"> Cari</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <h1>Daftar Mahasiswa</h1>

    <a href="logout.php">Logout</a> 
    <br>

    <a href="tambah_data.php">Tambah Data Mahasiswa</a>
    <form action="" method="post">
    <!-- autofocus atribut pada html 5 yang digunakan untuk memberikan tanda pertama kali ke inputan pada saat page direload -->
    <!-- placeholder atribut yang digunakan untuk menampilkan tulisan pada texbox -->
    <!-- autocomplete digunakan agar history pencarian dari user lain tidak ada -->
    <!-- <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
    <button type="submit" name="cari"> Cari</button> -->
    </form>
    <br>
    
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No. </th>
                <th>Nama </th>
                <th>Nim </th>
                <th>Email </th>
                <th>Jurusan </th>
                <th>Gambar </th>
                <th>Aksi </th>
            </tr>
            <?php $i=1 ?>
            <!-- kita buat contoh data static -->
            <?php foreach ($mahasiswa as $row):?>
        </thead>
        <tbody>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["Nama"]; ?></td>
                <td><?= $row["Nim"]; ?></td>
                <td><?= $row["Email"]; ?></td>
                <td><?= $row["Jurusan"]; ?></td>
                <td> <img src="image/<?php echo $row["Gambar"]; ?>" alt="" height="100" width="100" srcset=""></td>
                <td>
                    <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach;?>
        </tbody>
    </table>
    
    <!-- <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Nama </th>
            <th>Nim </th>
            <th>Email </th>
            <th>Jurusan </th>
            <th>Gambar </th>
            <th>Aksi </th>
        </tr>
<?php $i=1 ?> -->
<!-- kita buat contoh data static -->
<!-- <?php foreach ($mahasiswa as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td> <img src="image/<?php echo $row["Gambar"]; ?>" alt="" height="100" width="100" srcset=""></td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
            </td>
        </tr>
<?php $i++ ?>
<?php endforeach;?>
    </table>
</body> -->
</html>