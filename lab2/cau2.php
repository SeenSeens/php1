<?php
class TachHoVaTen {
    public $__hovaten;
    public $__ho;
    public $__tendem;
    public $__ten;
    public function TachHoTen() {
        $fullname = preg_split('/\s+/', $this->__hovaten);

        $this->__ho = $fullname[array_key_first($fullname)];
        $this->__ten = $fullname[array_key_last($fullname)];

        // Loại bỏ index đầu và index cuối của mảng
        unset($fullname[array_key_first($fullname)]);
        unset($fullname[array_key_last($fullname)]);;

        // Thiết lập lại index của mảng và lấy ra tên đệm
        $this->__tendem = implode(' ', array_values($fullname));
    }
}
$tachhovaten = new TachHoVaTen();
if(isset($_POST['tachhovaten'])) {
    $tachhovaten->__hovaten = trim($_POST['hovaten']);
    $tachhovaten->TachHoTen();
}
?>
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
