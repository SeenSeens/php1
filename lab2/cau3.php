<?php require_once "./php/cau3.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu 3</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-auto m-auto">
            <form action="" method="post">
                <table class="table table-success">
                    <thead>
                    <tr>
                        <th colspan="5" class="text-center text-uppercase fs-3">Ngày sinh</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label class="form-label">Ngày / tháng / năm</label>
                        </td>
                        <td width="100">
                            <input type="number" class="form-control" name="ngay" value="<?= !empty($ngaysinh->__ngay) ? $ngaysinh->__ngay : ''; ?>">
                        </td>
                        <td width="100">
                            <input type="number" class="form-control" name="thang" value="<?= !empty($ngaysinh->__thang) ? $ngaysinh->__thang : ''; ?>">
                        </td>
                        <td width="100">
                            <input type="number" class="form-control" name="nam" value="<?= !empty($ngaysinh->__nam) ? $ngaysinh->__nam : ''; ?>">
                        </td>
                        <td>
                            <input type="submit" name="thongbao" value="Thông báo" class="btn btn-outline-info">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <texterea class="form-control">
                                <?= !empty($ngaysinh->__tuoi->y) ? 'Năm nay bạn ' . $ngaysinh->__tuoi->y : null;  ?>
                                <?= !empty($ngaysinh->__sosanh) ? "<br>". $ngaysinh->__sosanh : null; ?>
                                <?= !empty($ngaysinh->__error) ? $ngaysinh->__error : ''; ?>
                            </texterea>
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
