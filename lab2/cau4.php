<?php require_once "./php/cau4.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 4</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">
                                    <label class="form-label">Tìm từ trong chuỗi</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="form-label">Chuỗi</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="chuoi" value="<?= isset($chuoi) ? $chuoi : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label">Từ cần tìm</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="tucantim" value="<?= isset($tucantim) ? $tucantim : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <button type="submit" class="btn btn-primary" name="timkiem">Tìm kiếm</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" class="form-control" value="<?= isset($ketQua) ? $ketQua : ''; ?>" readonly>
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
