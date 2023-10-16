<?php require_once "./php/cau1.php"?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 1</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto">
                <form action="" method="post">
                    <table class="table table-bordered table-light">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">
                                    <label class="text-uppercase">So sánh chuỗi</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="form-label">Chuỗi thứ nhất</label>
                                </td>
                                <td>
                                    <input type="text" name="chuoithunhat" class="form-control" value="<?= isset($soanhchuoi->__chuoithunhat) ? $soanhchuoi->__chuoithunhat : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label">Chuỗi thứ hai</label>
                                </td>
                                <td>
                                    <input type="text" name="chuoithuhai" class="form-control" value="<?= isset($soanhchuoi->__chuoithuhai) ? $soanhchuoi->__chuoithuhai : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <button type="submit" class="btn btn-outline-warning" name="sosanh">So sánh</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="text" class="form-control" value="<?= isset($soanhchuoi->__sosanh) ? $soanhchuoi->__sosanh : ''; ?>" readonly>
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