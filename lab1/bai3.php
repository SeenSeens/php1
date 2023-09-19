<?php require_once "./php/bai3.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 3</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-auto m-auto">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center text-uppercase fs-3">Thanh toán tiền điện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label>Tên chủ hộ</label></td>
                                <td><input type="text" name="tenchuho" class="form-control" value="<?= $tinhtiendien->getTenChuHo(); ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Chỉ số cũ</label></td>
                                <td><input type="number" name="chisocu" class="form-control" value="<?= $tinhtiendien->getChiSoCu(); ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Chỉ số mới</label></td>
                                <td><input type="number" name="chisomoi" class="form-control" value="<?= $tinhtiendien->getChiSoMoi(); ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Đơn giá</label></td>
                                <td><input type="number" name="dongia" class="form-control" value="<?= $tinhtiendien->getDonGia(); ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Số tiền thanh toán</label></td>
                                <td><input type="number" class="form-control" value="<?= $tinhtiendien->tinhtien(); ?>" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" value="Tính" class="btn btn-secondary" name="tinhtiendien">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>