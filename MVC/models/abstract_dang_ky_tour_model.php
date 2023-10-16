<?php
abstract class AbstractDangKyTourModel   {
    protected array $__tenTour = [
        "Miền Bắc" => [
            "hanoi-halong-sapa" => "Hà Nội - Hạ Long - Sapa",
            "hanoi-haiphong" => "Hà Nội - Hải Phòng",
            "hanoi-dienbien" => "Hà Nội - Điện Biên"
        ],
        "Miền Trung" => [
            "hue-bachma-danang" => "Huế - Bạch Mã - Đà Nẵng",
            "nhatrang-dalat" => "Nha Trang - Đà Lạt",
            "buonmethuot-gialai-kontum" => "Buôn Mê Thuột - Gia Lai - Kontum"
        ],
        "Miền Nam" => [
            "tphcm-phuquoc" => "TP.HCM - Phú Quốc",
            "tphcm-cantho-camau" => "TP.HCM - Cần Thơ - Cà Mau",
            "tphcm-mytho" => "TP.HCM - Mỹ Thơ"
        ]
    ];
    protected array $__giaTour = [
        "hanoi-halong-sapa" => 6000000,
        "hanoi-haiphong" => 5500000,
        "hanoi-dienbien" => 5500000,
        "hue-bachma-danang" => 5000000,
        "nhatrang-dalat" => 3000000,
        "buonmethuot-gialai-kontum" => 3500000,
        "tphcm-phuquoc" => 4000000,
        "tphcm-cantho-camau" => 4500000,
        "tphcm-mytho" => 3000000
    ];
    protected array $__tenPhuongTien = [
        "maybay" => "Máy bay",
        "tauhoa" => "Tàu hỏa",
        "xehoi" => "Xe hơi",
        "tauthuy" => "Tàu thủy",
        "xemay" => "Xe máy"
    ];
    protected array $__giaPhuongTien = [
        "maybay" => 1,
        "tauhoa" => 0.95,
        "xehoi" => 0.9,
        "tauthuy" => 0.9,
        "xemay" => 0.8
    ];
    protected $__ngayKhoiHanh;
    protected $__soLuong;
    protected $__tenKhachHang;
    protected $__lienHeDiaChi;
    protected $__soDienThoai;
    protected array $__yeuCau = [];

    public function setNgayKhoiHanh($_ngayKhoiHanh): void {
        $this->__ngayKhoiHanh = $_ngayKhoiHanh;
    }
    public function getNgayKhoiHanh() {
        return $this->__ngayKhoiHanh;
    }
    public function setSoLuong($_soLuong): void {
        $this->__soLuong = $_soLuong;
    }
    public function getSoLuong() {
        return $this->__soLuong;
    }
    public function setTenKhachHang($_tenKhachHang): void {
        $this->__tenKhachHang = $_tenKhachHang;
    }
    public function getTenKhachHang() {
        return $this->__tenKhachHang;
    }
    public function setLienHeDiaChi($_lienHeDiaChi): void {
        $this->__lienHeDiaChi = $_lienHeDiaChi;
    }
    public function getLienHeDiaChi() {
        return $this->__lienHeDiaChi;
    }
    public function setSoDienThoai($_soDienThoai): void {
        $this->__soDienThoai = $_soDienThoai;
    }
    public function getSoDienThoai() {
        return $this->__soDienThoai;
    }
    public function setYeuCau(array $_yeuCau): void {
        $this->__yeuCau = $_yeuCau;
    }
    public function getYeuCau(): array {
        return $this->__yeuCau;
    }
    abstract function ShowTourName();
    abstract function ShowPhuongTienDiChuyen();
    abstract function GiaTourTrenKhach();
    abstract function TongTien();
    abstract function HienThiThongTinDatTour();
    abstract function DanhSachCacYeuCau();
}