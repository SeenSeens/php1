<?php
// date_default_timezone_set('Asia/Ho_Chi_Minh');

class TimThuTrongTuan {
    public $__ngay;
    public $__thang;
    public $__nam;
    public $__thu;

    // Kiểm tra hợp lệ của ngày, tháng, năm nhập vào
    public function CheckDate() {
        if(checkdate($this->__thang, $this->__ngay, $this->__nam)) return true;
        return false;
    }

    public function TimThu() {
        if ($this->CheckDate()) {
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
    $timthutrongtuan->__ngay = intval( trim($_POST['ngay']) );
    $timthutrongtuan->__thang = intval( trim($_POST['thang']) );
    $timthutrongtuan->__nam = intval( trim($_POST['nam']) );

    $timthutrongtuan->TimThu();
}
?>