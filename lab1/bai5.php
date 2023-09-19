<?php require_once "./php/bai5.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-auto m-auto">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="5" class="text-center text-uppercase fs-3">Tìm thứ trong tuần</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="form-label">Ngày / tháng / năm</label>
                                </td>
                                <td width="100">
                                    <input type="number" class="form-control" name="ngay" value="<?= isset($timthutrongtuan->__ngay) ? $timthutrongtuan->__ngay : ''; ?>">
                                </td>
                                <td width="100">
                                    <input type="number" class="form-control" name="thang" value="<?= isset($timthutrongtuan->__thang) ? $timthutrongtuan->__thang : ''; ?>">
                                </td>
                                <td width="100">
                                    <input type="number" class="form-control" name="nam" value="<?= isset($timthutrongtuan->__nam) ? $timthutrongtuan->__nam : ''; ?>">
                                </td>
                                <td>
                                    <input type="submit" name="timthutrongtuan" value="Tìm thứ trong tuần" class="btn btn-toolbar">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <input type="text" class="form-control" value="<?php echo isset($timthutrongtuan->__thu) ? 'Ngày ' . $timthutrongtuan->__ngay . ' tháng ' . $timthutrongtuan->__thang . ' năm ' . $timthutrongtuan->__nam . ' là ngày ' .  $timthutrongtuan->__thu : ''; ?>" readonly>
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
