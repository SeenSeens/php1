<?php
require_once "./abstract_dang_ky_tour_model.php";
class DangKyTourModel extends AbstractDangKyTourModel {
    public $__selectedTourId;
    private $__selectedPhuongTien;
    private $__selectedRegion;
    public function setSelectedTourId($_selectedTourId): void{
        $this->__selectedTourId = $_selectedTourId;
    }
    public function getSelectedTourId() {
        return $this->__selectedTourId;
    }
    public function setSelectedPhuongTien($_selectedPhuongTien): void {
        $this->__selectedPhuongTien = $_selectedPhuongTien;
    }
    public function getSelectedPhuongTien() {
        return $this->__selectedPhuongTien;
    }
    function ShowTourName(): void {
        foreach ($this->__tenTour as $region => $tours) {
            echo '<optgroup label="' . $region . '">';
            foreach ($tours as $tourKey => $tourName) {
                echo '<option value="' . $tourKey . '" id="tourKey">' . $tourName . '</option>';
            }
            echo '</optgroup>';
        }
    }
    function ShowPhuongTienDiChuyen() {
        foreach ($this->__tenPhuongTien as $key => $value) :
            echo '<option value="' . $key . '" id="key" name="ádáđâsd">' . $value. '</option>';
        endforeach;
    }

    /**
     * Giá tour trên khách = Giá tour * Giá phương tiện
     * @return float|int
     */
    function GiaTourTrenKhach() {
        if( empty($this->__giaTour[$this->getSelectedTourId()]) || empty($this->__giaPhuongTien[$this->getSelectedPhuongTien()])) :
            return 0;
        else:
            return $this->__giaTour[$this->getSelectedTourId()] * $this->__giaPhuongTien[$this->getSelectedPhuongTien()];
        endif;

    }
    /**
     * Tổng tiền = Giá tour trên khách * Tổng số khách * Sô khách quy định
     * @return float|int
     */
    function TongTien() {
        return $this->GiaTourTrenKhach() *  $this->getSoLuong()  * $this->SoLuongKhach();
    }
    function DanhSachCacYeuCau() {
        echo implode("", $this->getYeuCau());
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
}