<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul Web Site -->
    <title>Latihan WebSite Beasiswa</title>
    <!-- Bootstrap -->
    <!--Mengambil style/css dari boostrep -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!--Mengambil fungsi jquery agar pemprosesan jquery berjalan -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Javascrip untuk menampilkan chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        body {
            min-height: 100vh;
            background: white;
        }

        .container {
            margin: auto;
            width: 80%;
        }

        .form-daftar {
            padding: 50px;
            background: white;
        }

        .form-daftar .form-group {
            display: flex;
            justify-content: space-between;
            margin: 10px;
        }

        .form-daftar .form-group label {
            max-width: 50%;
        }

        .form-daftar .form-group input,
        .form-daftar .form-group select {
            width: 50%;
            outline: none;
            /* border: none; */
            height: 30px;
            padding: 5px;
            box-sizing: border-box;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 50px;
        }

        .btn-group button,
        .btn-group a {
            font-size: 1.2em;
            padding: 5px 20px;
            background: white;
            text-decoration: none;
            text-align: center;
            border: 2px solid black;
            color: black;
        }

        .btn-group button:disabled {
            opacity: .7;
        }

        input:focus,
        select:focus {
            border: 2px solid blue;
        }
        h1 {
            text-align: center;
        }
        h2 {
            text-align: center;
        }

        h3{
            text-align: center;
            margin-top: 20px;
            padding: 20px;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        table{
            border-collapse: collapse;
            border:2px solid black;
        }
        th,td{
            border:2px solid black;
        }
        table.d{
            table-layout: fixed;
            width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md" style="background-color: #CDF0EA;">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="<?= URL ?>">
                <img width="150px" src="<?= URL ?>/gambar/itpng.png" alt="">
            </a>
            <!-- button dropdown -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-lg-end d-lg-flex" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #000000;" href="<?= URL ?>"></a>
                    </li>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="color: #000000;" href="<?= URL ?>pilihanbeasiswa.php">Pilihan Beasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #000000;" href="<?= URL ?>daftar.php">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #000000;" href="<?= URL ?>listhasil.php">Hasil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #000000;" href="<?= URL ?>grafik.php">Grafik</a>
                        </li>
                    </ul>
            </div>
        </div>
    </nav>
    <br>

    <div class="container-fluid">
        <!-- content here -->