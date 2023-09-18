<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

class NgaySinh {
    public $__ngay;
    public $__thang;
    public $__nam;
    public $__sinhnhat;
    public $__tuoi;
    public $__sosanh;
    public $__error;


    public function CheckDate() {
        if(checkdate($this->__thang, $this->__ngay, $this->__nam)) return true;
        return false;
    }
    public function TinhTuoi() {
        if ($this->CheckDate()) {
            $this->__sinhnhat = date_create("$this->__nam-$this->__thang-$this->__ngay");
            $namhientai = new DateTime();
            $this->__tuoi = $namhientai->diff($this->__sinhnhat);
            // Reset thông báo lỗi
            $this->__error = "";
        } else {
            $this->__error = "Ngày, tháng, năm không hợp lệ.";
            $this->__tuoi = "";
            $this->__sosanh = "";
        }
    }
    public function SoSanhNgay() {
        if ($this->CheckDate()) {
            $this->__sinhnhat->setDate(date('Y'), $this->__thang, $this->__ngay);
            $namhientai = new DateTime();
            $this->__sosanh = date_diff($this->__sinhnhat, $namhientai);

            if ($this->__sosanh->format('%R%a') == 0) {
                $this->__sosanh = 'Chúc mừng sinh nhật';
            } elseif ($this->__sosanh->format('%R%a') > 0) {
                $this->__sosanh = 'Sinh nhật của bạn đã qua ' . abs($this->__sosanh->format('%a')) . ' ngày';
            } else {
                $this->__sosanh = 'Sinh nhật của bạn còn ' . abs($this->__sosanh->format('%a')) . ' ngày nữa';
            }

        }
    }
}

$ngaysinh = new NgaySinh();

if(isset($_POST['thongbao'])) {
    $ngaysinh->__ngay = intval(trim($_POST['ngay']));
    $ngaysinh->__thang = intval(trim($_POST['thang']));
    $ngaysinh->__nam = intval(trim($_POST['nam']));

    $ngaysinh->TinhTuoi();
    $ngaysinh->SoSanhNgay();
}

?>

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
