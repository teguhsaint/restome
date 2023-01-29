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
            margin-left: -290px;
            transition: all 0.3s;
        }

        .sdbar.show {
            margin-left: 0;
        }

        .sdbar .sidebar-brand h4 {
            color: mintcream;
            text-align: center;
            letter-spacing: 2px;
            padding: 5px 0px;
        }


        .sdbar .menu a {
            padding: 15px 0px;

            text-decoration: none;
            color: #ffffff96;
            font-size: 16px;
            margin-left: 20px;

            display: list-item;
            list-style: none;
            transition: 0.3s;
        }

        .sdbar .menu a:hover {
            margin-left: 30px;
            color: #ffffff;
        }

        .sdbar .menu a:hover span {
            color: #ffffff;
        }


        .sdbar .menu span {
            margin-left: 20px;
            color: #ffffff96;
        }





        @media screen and (max-width:768px) {

            .sdbar.show {
                width: 350px;

                margin-left: -350px;
            }

            .sdbar {
                width: 350px;
                margin-left: 0px;
                position: absolute;
                z-index: 2;
            }

            .menuku {
                display: block;
            }

        }

        /* 
        @media screen and (max-width:425px) {
            .sdbar.show {
                width: 500px;
            }
        }

        @media screen and (max-width:375px) {
            .sdbar.show {
                width: 500px;
            }
        }

        @media screen and (max-width:320px) {
            .sdbar.show {
                width: 600px;
            }
        } */

        .btn-menu {
            position: absolute;
            right: 10px;
            top: 15px;
            color: white !important;
        }
    </style>

</head>

<body class="bg-light">

    <div class="d-flex">

        <div class="sdbar show">
            <div class="sidebar-brand py-3 align-items-center">
                <h4>BINA ADMIN</h4>
                <button onclick="tampil_menu()" class="btn d-lg-none border-0 btn-menu">
                    <!-- <a class="navbar-brand text-dark" href="#"><i class="fas fa-bars"></i></a> -->
                    <div class="menu-icon">
                        <i class="fas fa-times fs-4"></i>
                    </div>
                </button>
            </div>

            <div class="menu">
                <a href="index.php"><i class="fas fa-house ms-3"></i><span style="margin-left: 14px;"> Home</span></a>
                <a href="index.php?p=read"><i class="fas fa-file ms-3"></i><span> Data Menu</span></a>
                <a href=""><i class="fas fa-plus ms-3"></i><span style="margin-left: 16px;"> Tambah Menu</span></a>
            </div>
        </div>
        <div class="content w-100">
            <nav class="navbar navbar-dark bg-white shadow py-3">
                <div class="container">
                    <button onclick="tampil_menu()" class="menuku bg-transparent border-0">
                        <!-- <a class="navbar-brand text-dark" href="#"><i class="fas fa-bars"></i></a> -->
                        <div class="menu-icon">
                            <i class="fas fa-bars text-muted" style="font-size: 20px;"></i>
                        </div>
                    </button>
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




    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Sukses</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                try {
                ?>
                    Data <?= $nama_menu ?> Berhasil Di Update

                <?php
                } catch (\Throwable $th) {
                    //throw $th;
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script>
        function tampil_menu() {
            $('.sdbar').toggleClass('show')
        }
    </script>

</body>

</html>