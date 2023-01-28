<?php
include 'controller/model.php';
?>

<!doctype html>
<html lang="en">

<head>
    <title>ADMIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/lib/datatable/css/datatables.min.css">

    <link rel="stylesheet" href="assets/lib/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/lib/select2/css/select2-bootstrap-5-theme.min.css">

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js' integrity='sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==' crossorigin='anonymous'></script>

    <script src="assets/lib/datatable/js/datatables.min.js"></script>
    <script src="assets/lib/datatable/js/pdfmake.min.js"></script>
    <script src="assets/lib/datatable/js/vfs_fonts.js"></script>

    <script src="assets/lib/select2/js/select2.full.min.js"></script>

    <link rel="stylesheet" href="assets/FA5PRO/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .sdbar {
            display: block;
            background-color: #455A64;
            width: 290px;
            min-height: 100vh;

        }

        .sdbar .sidebar-brand h3 {
            color: mintcream;
            text-align: center;
        }

        .sdbar .menu a {
            text-decoration: none;
            color: #C5CAE9;
            font-size: 20px;
            margin-left: 20px;
            display: list-item;
            list-style: none;
            transition: 0.3s;
        }

        .sdbar .menu a:hover {
            margin-left: 30px;
        }

        .sdbar .menu span {
            margin-left: 20px;
            color: #C5CAE9;
        }
    </style>
</head>

<body>

    <div class="d-flex">

        <div class="sdbar">
            <div class="sidebar-brand">
                <br>
                <h3>BINA ADMIN</h3>
                <hr class="text-white mt-2 mb-5">
            </div>

            <div class="menu">
                <a href="index.php" class="mb-4"><i class="fas fa-house ms-3"></i><span style="margin-left: 14px;"> Home</span></a>
                <a href="index.php?p=read" class="mb-4"><i class="fas fa-file ms-3"></i><span> Data Menu</span></a>
                <a href="" class="mb-4"><i class="fas fa-plus ms-3"></i><span style="margin-left: 16px;"> Tambah Menu</span></a>
            </div>
        </div>
        <div class="content w-100">
            <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Admin</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nama User</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Edit Profil</a>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">

                <?php
                $pages_dir  =  'pages';
                if (!empty($_GET['p'])) {
                    $pages  =  scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);
                    $p  =  $_GET['p'];
                    if (in_array($p . '.php', $pages)) {
                        include($pages_dir . '/' . $p . '.php');
                    } else {
                        echo "Halaman tidak ditemukan!";
                    }
                } else {
                    include($pages_dir . '/home.php');
                } ?>
            </div>
        </div>


    </div>





    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>


</body>

</html>