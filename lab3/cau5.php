<?php
abstract class dang_ky_tour_dl {
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
    protected array $__data = [];
    protected array $__cookies;
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

class cau5 extends dang_ky_tour_dl {
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
            echo '<option value="' . $key . '">' . $value. '</option>';
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
            $this->LayRegion();
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
    function LayRegion() {
        foreach ($this->__tenTour as $region => $tours) :
            if (array_key_exists($this->__selectedTourId, $tours)) :
                $this->__selectedRegion = $region;
                break;
            endif;
        endforeach;
    }
    function LuuDuLieuVaoMang() {
        $this->LayRegion();
        array_push($this->__data, $this->getTenKhachHang(), $this->getLienHeDiaChi(), $this->getSoDienThoai(), $this->__tenTour[$this->__selectedRegion][$this->getSelectedTourId()], $this->getSoLuong(), $this->TongTien());
    }
    function DuaDuLieuMangVaoCookie() {
        $this->LuuDuLieuVaoMang();
        // Mã hóa cookie dưới dạng chuỗi
        $cookies_serialized = serialize($this->__data);
        // Đặt cookie
        setcookie("kh", $cookies_serialized, time() + (86400 * 30)); // 30 ngày
        // Truy xuất cookie
        $this->__cookies = isset($_COOKIE["kh"]) ? unserialize($_COOKIE["kh"]) : [];
        // In giá trị cookie
    }
    function HienThiCookieRaTable() {
        $cookies = $_COOKIE;
        var_dump($cookies);
        foreach ($cookies as $key => $value) {
            echo "<tr>";
            echo "<td>{$value}</td>";
            echo "</tr>";
        }
    }
    function XuLy(): void {
        if(isset($_POST['dangky'])) :
            $this->setSelectedTourId( !empty($_POST['tour']) ? $_POST['tour'] : '' );
            $this->setNgayKhoiHanh( !empty($_POST['ngaykhoihanh']) ? $_POST['ngaykhoihanh'] : '' );
            $this->setSelectedPhuongTien( !empty($_POST['phuongtien']) ? $_POST['phuongtien'] : '' );
            $this->setSoLuong( !empty($_POST['soluongdangky']) ? intval($_POST['soluongdangky']) : 0 );
            $this->setTenKhachHang( !empty($_POST['tenkhachhang']) ? $_POST['tenkhachhang'] : '' );
            $this->setLienHeDiaChi( !empty($_POST['lienhediachi']) ? $_POST['lienhediachi'] : '' );
            $this->setSoDienThoai( !empty($_POST['sodienthoai']) ? $_POST['sodienthoai'] : '' );
            $this->setYeuCau( [ !empty($_POST['yeucau']) ? $_POST['yeucau'] : '' ] );
            $this->DuaDuLieuMangVaoCookie();
        endif;
    }
}
$cau5 = new cau5();
$cau5->XuLy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 5</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <section class="row row-cols-2 justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center text-white text-uppercase bg-primary-subtle fs-5">Đăng ký tour du lịch</div>
                    <div class="card-body">
                        <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" class="row g-3" id="dang_ky_tour_dl">
                            <div class="col-6">
                                <label class="form-label">Tên tour:</label>
                            </div>
                            <div class="col-6">
                                <select name="tour" id="tour" class="form-control">
                                    <?php $cau5->ShowTourName(); ?>
                                </select>

                            </div>
                            <div class="col-6">
                                <label class="form-label">Ngày khởi hành:</label>
                            </div>
                            <div class="col-6">
                                <input type="date" name="ngaykhoihanh" id="ngaykhoihanh" class="form-control" value="<?= $cau5->getNgayKhoiHanh(); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Phương tiện di chuyển:</label>
                            </div>
                            <div class="col-6">
                                <select name="phuongtien" id="phuongtien" class="form-control">
                                    <?php $cau5->ShowPhuongTienDiChuyen(); ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Số lượng đăng ký</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="soluongdangky" name="soluongdangky" value="<?= !empty($cau5->getSoLuong()) ? $cau5->getSoLuong() : ''; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tên khách hàng</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="tenkhachhang" name="tenkhachhang" value="<?= !empty($cau5->getTenKhachHang()) ? $cau5->getTenKhachHang() : ''; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Liên hệ theo địa chỉ</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="lienhediachi" id="lienhediachi" value="<?= $cau5->getLienHeDiaChi() !== null ? $cau5->getLienHeDiaChi() : ''; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Số điện thoại</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="sodienthoai" id="sodienthoai" value="<?php if(isset($cau5->getSoDienThoai)) echo $cau5->getSoDienThoai(); ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Những yêu cầu kèm theo</label>
                                <textarea class="form-control" name="yeucau" id="yeucau">

                                </textarea>
                            </div>
                            <div class="col-12">

                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" name="dangky" id="dangky">Đăng ký tour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-center text-uppercase bg-primary-subtle text-white fs-5">
                        Thông tin đặt tour
                    </div>
                    <div class="card-body">
                        <?php $cau5->HienThiThongTinDatTour(); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="row row-cols-1 mt-3 g-3">
            <div class="col text-center">
                <label class="text-center">Table đầu tiên là session</label>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tour</th>
                            <th>Giá</th>
                            <th>Số khách</th>
                            <th>Thành tiền</th>
                            <th>Hình</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="col text-center">
                <label class="text-center">Table thứ hai là cookie</label>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tour</th>
                        <th>Giá</th>
                        <th>Số khách</th>
                        <th>Thành tiền</th>
                        <th>Hình</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?= $cau5->HienThiCookieRaTable(); ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script>
        document.getElementById('dang_ky_tour_dl').addEventListener("submit", (event) => {
            const inputSoLuongDangKy = document.getElementById("soluongdangky").value;
            const inputTenKhachHang = document.getElementById("tenkhachhang").value
            const inputLienHeDiaChi = document.getElementById("lienhediachi").value
            const inputSoDienThoai = document.getElementById("sodienthoai").value;
            // const inputYeuCau = document.getElementById("yeucau").value;

            if(inputSoLuongDangKy.trim() === "") {
                alert("Bạn chưa nhập số lượng đăng ký");
                event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
                return;
            }
            if(inputTenKhachHang.trim() === "") {
                alert("Bạn chưa nhập tên khách hàng");
                event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
                return;
            }
            if(inputLienHeDiaChi.trim() === "") {
                alert("Bạn chưa nhập địa chỉ liên hệ");
                event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
                return;
            }
            if(inputSoDienThoai.trim() === "") {
                alert("Bạn chưa nhập số điện thoại");
                event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
                return;
            }
            if(inputYeuCau.trim() === "") {
                alert("Bạn chưa nhập yêu cầu");
                event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
                return;
            }
        });
    </script>
</body>
</html>