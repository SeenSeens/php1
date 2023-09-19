<?php
session_start();
class GioHoa {
    public $__Hoa;
    public $__ArrayHoa = [];
    public $__Notify;
    public function ThemVaoGio($hoa) {
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        if ( in_array($hoa, $this->__ArrayHoa) ) {
            return false; // Sản phẩm đã tồn tại trong giỏ hàng
        } else {
            $this->__ArrayHoa[] = $hoa; // Thêm sản phẩm vào giỏ hàng
            return true; // Sản phẩm được thêm thành công
        }
    }
    public function LayGioHoa() {
        return $this->__ArrayHoa;
    }
}
$giohoa = new GioHoa();

if (isset($_SESSION['gio_hoa'])) {
    $giohoa->__ArrayHoa = $_SESSION['gio_hoa'];
}

if(isset($_POST['themvaogio'])) :
    $giohoa->__Hoa = trim($_POST['hoa']);
    $them_thanh_cong = $giohoa->ThemVaoGio( $giohoa->__Hoa );
    if ($them_thanh_cong) {
        $_SESSION['gio_hoa'] = $giohoa->LayGioHoa();
    } else {
        $giohoa->__Notify = "Sản phẩm đã tồn tại trong giỏ hàng.";
    }
endif;
?>