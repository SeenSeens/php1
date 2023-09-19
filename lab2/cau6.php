<?php require_once "./php/cau6.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 6</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-auto m-auto">
            <form action="" method="post" id="formTNN">
                <div class="card border-info">
                    <div class="card-header text-uppercase text-center fs-3">Mua hoa</div>
                    <div class="card-body">
                        <!-- Hiển thị thông báo -->
                        <?php if (!empty($giohoa->__Notify)) : ?>
                            <div class="alert alert-danger"><?= $giohoa->__Notify ?></div>
                        <?php endif; ?>
                        <div class="row mb-1">
                            <div class="col-auto fs-5"> Loại hoa bạn chọn </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" name="hoa" id="hoa">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-info" name="themvaogio" id="themvaogio">Thêm vào giỏ hoa</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Hiển thị danh sách sản phẩm trong giỏ hàng -->
                                <?php
                                if (!empty($_SESSION['gio_hoa'])) :
                                    echo implode(" ", $_SESSION['gio_hoa']);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>