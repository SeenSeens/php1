<?php
session_start();
class TourDuLich {
    public array $__tenTour = [
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
    public array $__giaTour = [
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
    public $__selectedTourId;
    public $__selectedRegion;
    /*private $__ngayKhoiHanh;
    private $__soLuongDangKy;
    private $__tenKhachHang;
    private $__diaChiLienHe;
    private $__soDienThoai;*/
    public array $__data = [];
    function ShowTourName(): void {
        foreach ($this->__tenTour as $region => $tours) {
            echo '<optgroup label="' . $region . '">';
            foreach ($tours as $tourKey => $tourName) {
                echo '<option value="' . $tourKey . '" id="tourKey">' . $tourName . '</option>';
            }
            echo '</optgroup>';
        }
    }

    /**
     * Lưu dữ liệu vào session
     */
    function SaveSession() {
        $_SESSION['tour'] = $this->__data; // Lưu mảng __data vào session với key 'tour'
    }
}

$tours = new TourDuLich();
function XuLy(){
    global $tours;
    if (isset($_POST['dangky'])) :
        $tours->__selectedTourId = trim(htmlspecialchars($_POST['tour']));
        $ngayKhoiHanh = trim(htmlspecialchars($_POST['ngaykhoihanh']));
        foreach ($tours->__tenTour as $region => $tours) :
            if (array_key_exists($tours->__selectedTourId, $tours)) :
                $tours->__selectedRegion = $region;
                break;
            endif;
        endforeach;
        // Thêm dữ liệu vào mảng __data
        array_push($tours->__data,
            trim(htmlspecialchars($_POST['tenkhachhang'])),
            trim(htmlspecialchars($_POST['diachi'])),
            trim(htmlspecialchars($_POST['sodienthoai'])),
            $tours->__tenTour[$tours->__selectedRegion][$tours->__selectedTourId],
            $tours->__giaTour[$tours->__selectedRegion][$tours->__selectedTourId],
            trim(intval($_POST['soluongdangky']))
        );
        echo '<pre>';
        var_dump($tours->__data);
    endif;

}
XuLy();
if (isset($_SESSION['tour'])) {
    $tourData = $_SESSION['tour'];
    foreach ($tourData as $booking) {

    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="" method="post" autocomplete="on" class="row row-cols-2 g-2">
                <div class="col-12 text-center bg-primary-subtle text-white fw-bold fs-3">
                    Đăng ký tour du lịch
                </div>
                <div class="col">
                    Tên tour
                </div>
                <div class="col">
                    <select name="tour" id="tour" class="form-control">
                        <?php $tours->ShowTourName(); ?>
                    </select>
                </div>
                <div class="col">
                    Ngày khởi hành
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="ngaykhoihanh">
                </div>
                <div class="col">
                    Số lượng đăng ký
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="soluongdangky">
                </div>
                <div class="col">
                    Tên khách hàng
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="tenkhachhang">
                </div>
                <div class="col">
                    Liên hệ theo địa chỉ
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="diachi">
                </div>
                <div class="col">
                    Số điện thoại
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="sodienthoai">
                </div>
                <div class="col-12">
                    Hiển thị hình
                </div>
                <div class="col-12">
                    <img src="" class="img-fluid">
                </div>
                <div class="col-12 text-center">
                    <input type="submit" value="Đăng Ký Tour" name="dangky" class="btn btn-outline-info">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>