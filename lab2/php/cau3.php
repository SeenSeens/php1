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