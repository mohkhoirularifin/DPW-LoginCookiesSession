<?php
    require 'functions.php';

    if (isset($_POST['register'])) 
    {
        if (registrasi($_POST) > 0) 
        {
            echo "
                <style>
                    alert('User berhasil ditambahkan');
                </style>
                ";
        } else 
        {
            echo mysqly_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        label {
            display:block;
        }
    </style>
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
        <a class="navbar-brand" href="http://localhost/13/index.php">Daftr Mahasiswa</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Registrasi</a></li>
            
        </ul>
        <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div><!-- /.navbar-collapse -->
</nav>

    <h1 class="text-center">Registrasi</h1>
        <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Input field"required>
                <label for="password">Password :</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Input field"required>
                <label for="password2">Konfirmasi Password: </label>
                <input type="password" class="form-control" name="password2" id="password" placeholder="Input field"required>
                </div>
                <button type="submit" name="register"> Registrasi </button>
        </form>

    <!-- <form action="" method="POST">
        <ul>
            <li>
                <label for="username"> Username: </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password"> Password: </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2"> Konfirmasi Password: </label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register"> Registrasi </button>
            </li>
        </ul>

    </form> -->

</body>
</html>