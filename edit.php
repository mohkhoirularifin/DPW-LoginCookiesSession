<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}

    require 'functions.php';

    // menggunakan method get untuk mengambil id yang telah terseleksi oleh user dan dimasukkan
    // ke dalam variabel baru yaitu $id
    $id = $_GET[id];
    // var_dump($id);

    // query berdasarkan id
    $mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];
    //var_dump($mhs[0]["Nama"]);

    // cek apakah button sudah ditekan atau belum
    if(isset($_POST['submit']))
    {

        // cek sukses data dirubh menggunakan function edit pada functions.php
        if(edit($_POST) > 0)
        {
            echo "
                <script>
                    alert('data berhasil diperbarui');
                    document.location.href='index.php';
                </script>

                ";
        } else {
            echo "
            <script>
                alert('data gagal diperbarui');
                document.location.href='edit.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }

?>


<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
        
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/13/index.php">Daftar Mahasiswa</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Update Data</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </nav>
        
        <h1>Update Data Mahasiswa</h1>
        <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $mhs[id] ?>">
                    <input type="hidden" name="GambarLama" value="<?= $mhs[Gambar]; ?>">
                    <label for="Nama">Nama:</label>
                    <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Input field"required value="<?= $mhs[Nama]; ?>">
                    <label for="Nim">NIM:</label>
                    <input type="text" class="form-control" name="Nim" id="Nim" placeholder="Input field"required value="<?= $mhs[Nim]; ?>">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Input field"required value="<?= $mhs[Email]; ?>">
                    <label for="Jurusan">Jurusan</label>
                    <input type="text" class="form-control" name="Jurusan" id="Jurusan" placeholder="Input field"required value="<?= $mhs[Jurusan]; ?>">
                    <label for="Gambar">Gambar</label>
                    <img src="image/<?= $mhs[Gambar];?>" alt="" height="100" width="100"><br>
                    <input type="text" class="form-control" name="Gambar" id="Gambar" placeholder="Input field"required value="<?= $mhs[Gambar]; ?>">

                </div>
                <button type="submit" name="submit"> Update </button>
        </form>
        <!-- <form action="" method="post">
            <li>
                <!-- <input type="hidden" name="id" value="<?= $mhs[id] ?>"> -->
            <!-- </li>
            
            <ul>
                <li> -->
                    <!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif juga -->
                    <!-- <label for="Nama">Nama:</label> -->
                    <!-- untuk mengisian name besar kecilnya harus sesuai dengan fieldnya -->
                    <!-- <input type="text" name="Nama" id="Nama" value="<?= $mhs[Nama]; ?>" > -->
                <!-- </li>
                <li>
                    <label for="Nim">NIM :</label>
                    <input type="text" name="Nim" id="Nim" required value="<?= $mhs[Nim]; ?>">
                </li>
                <li>
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email" required value="<?= $mhs[Email]; ?>">
                </li>
                <li>
                    <label for="Jurusan">Jurusan</label>
                    <input type="text" name="Jurusan" id="Jurusan" required value="<?= $mhs[Jurusan]; ?>" >
                </li>
                <li>
                    <label for="Gambar">Gambar</label>
                    <input type="text" name="Gambar" id="Gambar" required value="<?= $mhs[Gambar]; ?>" >
                </li>
                <li>
                    <button type="submit" name="submit"> Update </button>
                </li>
            </ul>

        </form> -->
    </body>
</html>