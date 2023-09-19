<?php require_once "./php/cau5.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 5</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-auto m-auto">
            <form action="" method="post" id="formTNN">
                <div class="card border-info">
                    <div class="card-header text-uppercase text-center fs-3">Tìm năm nhuận</div>
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-auto fs-5"> Năm </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" name="nam" id="nam">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <?= implode(" ", $timnamnhuan->__ArrayYear); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-secondary" name="timnamnhuan" id="timnamnhuan">Tìm năm nhuận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./js/cau5.js"></script>
</body>
</html>
