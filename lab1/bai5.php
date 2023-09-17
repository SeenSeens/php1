<?php
// date_default_timezone_set('Asia/Ho_Chi_Minh');

class TimThuTrongTuan {
    public $__ngay;
    public $__thang;
    public $__nam;
    public $__thu;

    // Kiểm tra hợp lệ của ngày, tháng, năm nhập vào
    public function CheckValidation() {
        if ($this->__ngay > 0 && $this->__ngay <= 31 && $this->__thang >= 1 && $this->__thang <= 12 && $this->__nam >= 1900 && $this->__nam <= 2099) {
            return true;
        } else {
            return false;
        }
    }

    public function TimThu() {
        if ($this->CheckValidation()) {
            $this->__thu = date('l', mktime(0, 0, 0, $this->__thang, $this->__ngay, $this->__nam));
            $thu = [
                'Monday' => 'Thứ Hai',
                'Tuesday' => 'Thứ Ba',
                'Wednesday' => 'Thứ Tư',
                'Thursday' => 'Thứ Năm',
                'Friday' => 'Thứ Sáu',
                'Saturday' => 'Thứ Bảy',
                'Sunday' => 'Chủ Nhật'
            ];
        $this->__thu = $thu[$this->__thu];
        } else {
            $this->__thu = "không hợp lệ.";
        }
        
    }
}

$timthutrongtuan = new TimThuTrongTuan();

if (isset($_POST['timthutrongtuan']) && isset($_POST['ngay']) && isset($_POST['thang']) && isset($_POST['nam'])) {
    $timthutrongtuan->__ngay = intval($_POST['ngay']);
    $timthutrongtuan->__thang = intval($_POST['thang']);
    $timthutrongtuan->__nam = intval($_POST['nam']);

    $timthutrongtuan->TimThu();
}
?>
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
                                <td>
                                    <input type="number" class="form-control" name="ngay" value="<?= isset($timthutrongtuan->__ngay) ? $timthutrongtuan->__ngay : ''; ?>">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="thang" value="<?= isset($timthutrongtuan->__thang) ? $timthutrongtuan->__thang : ''; ?>">
                                </td>
                                <td>
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
