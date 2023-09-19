<?php global $danhlamthangcanh;
require_once "./php/cau7.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 7</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center text-uppercase">Danh lam thắng cảnh</h3>
        <div class="row row-cols-2 justify-content-center">
            <div class="col">
                <h4>Danh sách địa danh</h4>
                <div>
                    <?php
                    SapXepAZ();
                    SapXepZA();
                    $danhlamthangcanh->ShowDiaDanh();
                    ?>
                </div>
                <div class="m-auto p-3">
                    <a href="?sapxep=az" class="btn btn-light">Sắp xếp A-Z</a>
                    <a href="?sapxep=za" class="btn btn-light">Sắp xếp Z-A</a>
                </div>
            </div>
            <div class="col text-center">
                <?php $danhlamthangcanh->ChiTietDiaDanh(); ?>
            </div>
        </div>
    </div>
</body>
</html>