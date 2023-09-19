<?php require_once "./php/cau2.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 2</title>
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
                            <label class="form-label text-uppercase">Tách họ và tên</label>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label class="form-label">Họ và tên</label>
                        </td>
                        <td>
                            <input type="text" name="hovaten" class="form-control" value="<?= isset($tachhovaten->__hovaten) ? $tachhovaten->__hovaten : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label">Họ:</label>
                        </td>
                        <td>
                            <input type="text" name="ho" class="form-control" value="<?= isset($tachhovaten->__ho) ? $tachhovaten->__ho : ''; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label">Tên đệm:</label>
                        </td>
                        <td>
                            <input type="text" name="tendem" class="form-control" value="<?= isset($tachhovaten->__tendem) ? $tachhovaten->__tendem : ''; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label">Tên:</label>
                        </td>
                        <td>
                            <input type="text" name="ten" class="form-control" value="<?= isset($tachhovaten->__ten) ? $tachhovaten->__ten : ''; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" class="btn btn-primary" name="tachhovaten">Tách Họ Và Tên</button>
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
