<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

class NgaySinh {
    public $__ngay;
    public $__thang;
    public $__nam;
    public $__sinhnhat;
    public $__tuoi;
    public $__sosanh;

    public function TinhTuoi() {
        $this->__sinhnhat = date_create("$this->__nam-$this->__thang-$this->__ngay"); // Tạo ngày sinh từ ngày, tháng, năm nhập vào
        $namhientai = new DateTime(); // Lấy ngày hiện tại
        $this->__tuoi = $namhientai->diff($this->__sinhnhat); // Tính tuổi
        $this->__sinhnhat->setDate(date('Y'), $this->__thang, $this->__ngay); // Thiết lập ngày sinh về cùng năm hiện tại để tính sự chênh lệch ngày
        $this->__sosanh = date_diff($this->__sinhnhat, $namhientai); // Tính sự chênh lệch ngày giữa ngày sinh nhật trong năm nay và ngày hiện tại
        $this->__sosanh = $this->__sosanh->format("%R%a ngày"); // In ra sự chênh lệch ngày dưới dạng số ngày
    }
}

$ngaysinh = new NgaySinh();

if(isset($_POST['thongbao'])) {
    $ngaysinh->__ngay = intval(trim($_POST['ngay']));
    $ngaysinh->__thang = intval(trim($_POST['thang']));
    $ngaysinh->__nam = intval(trim($_POST['nam']));

    $ngaysinh->TinhTuoi();
}

// Hiện ra thông báo
function thongbaotuoi($ngaysinh) {
    if (!empty($ngaysinh->__tuoi->y)) return 'Năm nay bạn ' . $ngaysinh->__tuoi->y . ' tuổi';
}
function sosanhngay() {
    if (!empty($ngaysinh->__sosanh) && $ngaysinh->__sosanh->format('%R%a') == 0) return 'Chúc mừng sinh nhật';
    if (!empty($ngaysinh->__sosanh) && $ngaysinh->__sosanh->format('%R%a') < 0) return 'Sinh nhật của bạn đã qua ' . abs($ngaysinh->__sosanh->format('%a')) . ' ngày';
    if (!empty($ngaysinh->__sosanh) && $ngaysinh->__sosanh->format('%R%a') > 0) return 'Sinh nhật của bạn còn ' . $ngaysinh->__sosanh->format('%a') . ' ngày nữa';
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
                            <input type="number" class="form-control" name="ngay" value="">
                        </td>
                        <td width="100">
                            <input type="number" class="form-control" name="thang" value="">
                        </td>
                        <td width="100">
                            <input type="number" class="form-control" name="nam" value="">
                        </td>
                        <td>
                            <input type="submit" name="thongbao" value="Thông báo" class="btn btn-outline-info">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <input type="text" class="form-control" value="<?= thongbaotuoi($ngaysinh) . '<br>' . sosanhngay(); ?>" readonly>
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
