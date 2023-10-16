<?php
require_once "../models/Cau3.5Model.php";
class DangKyTourController {
    private $model;
    public function __construct() {
        $this->model = new DangKyTourModel();
    }
    function SoLuongKhach() {
        switch ($this->getSoLuong()) {
            case $this->getSoLuong() < 10 :
                return 1;
            case $this->getSoLuong() >= 10 && $this->getSoLuong() <= 19 :
                return 0.95;
            case $this->getSoLuong() >= 20 && $this->getSoLuong() <= 49 :
                return 0.9;
            case $this->getSoLuong() >= 50 :
                return 0.8;
            default:
                // Hành động mặc định khi không rơi vào bất kỳ trường hợp nào
                echo "Không xác định";
        }
    }

    function HienThiThongTinDatTour() {
        if(
            !empty($this->__selectedTourId) ||
            !empty($this->__ngayKhoiHanh) ||
            !empty($this->__selectedPhuongTien) ||
            !empty($this->__soLuong) ||
            !empty($this->__tenKhachHang) ||
            !empty($this->__soDienThoai) ||
            !empty($this->__yeuCau[$this->DanhSachCacYeuCau()])
        ) :
            foreach ($this->__tenTour as $region => $tours) :
                if (array_key_exists($this->__selectedTourId, $tours)) :
                    $this->__selectedRegion = $region;
                    break;
                endif;
            endforeach;
            ?>
            <p>Khách hàng đã đặt Tour: <?= $this->__tenTour[$this->__selectedRegion][$this->__selectedTourId]; ?></p>
            <p>Ngày khởi hành : <?= $this->__ngayKhoiHanh; ?></p>
            <p>Phương tiện: <?= $this->__tenPhuongTien[$this->__selectedPhuongTien]; ?> </p>

            <p>Số lượng đăng ký: <?= $this->__soLuong; ?> Khách</p>
            <p>Giá tour trên khách: <?= $this->GiaTourTrenKhach(); ?> </p>
            <p>Tổng giá tiền cho <?= $this->__soLuong; ?> khách: <?= $this->TongTien(); ?></p>

            <p>Thông tin khách hàng:</p>
            <p>Họ tên: <?= $this->__tenKhachHang; ?> - Địa chỉ: <?= $this->__lienHeDiaChi; ?> </p>
            <p>Số điện thoại: <?= $this->__soDienThoai; ?></p>

            <p>Các yêu cầu kèm theo</p>
            <?= $this->DanhSachCacYeuCau(); ?>
        <?php
        endif;
    }
    function XuLy(): void {
        $this->setSelectedTourId( !empty($_POST['tour']) ? $_POST['tour'] : '' );
        $this->setNgayKhoiHanh( !empty($_POST['ngaykhoihanh']) ? $_POST['ngaykhoihanh'] : '' );
        $this->setSelectedPhuongTien( !empty($_POST['phuongtien']) ? $_POST['phuongtien'] : '' );
        $this->setSoLuong( !empty($_POST['soluongdangky']) ? intval($_POST['soluongdangky']) : 0 );
        $this->setTenKhachHang( !empty($_POST['tenkhachhang']) ? $_POST['tenkhachhang'] : '' );
        $this->setLienHeDiaChi( !empty($_POST['lienhediachi']) ? $_POST['lienhediachi'] : '' );
        $this->setSoDienThoai( !empty($_POST['sodienthoai']) ? $_POST['sodienthoai'] : '' );
        $this->setYeuCau( [ !empty($_POST['yeucau']) ? $_POST['yeucau'] : '' ] );
    }
}
$controller = new DangKyTourController();
$controller->XuLy();
require_once "../views/cau3.5.php";