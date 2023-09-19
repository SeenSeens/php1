<?php
class DanhLamThangCanh {
    public array $__MangDiaDanh = [
        [
            'ma' => 'nt',
            'ten' => 'Biển Nha Trang',
            'hinh' => 'nha_trang.jpg'
        ],
        [
            'ma' => 'dl',
            'ten' => 'Thành Phố Đà lạt',
            'hinh' => 'da_lat.jpg'
        ],
        [
            'ma' => 'vt',
            'ten' => 'Biển Vũng Tàu',
            'hinh' => 'vung_tau.jpg'
        ],
        [
            'ma' => 'hl',
            'ten' => 'Vịnh Hạ Long',
            'hinh' => 'ha_long.jpg'
        ],
        [
            'ma' => 'pt',
            'ten' => 'Biển Phan Thiết',
            'hinh' => 'phan_thiet.jpg'
        ],
        [
            'ma' => 'ht',
            'ten' => 'Biển Hà Tiên',
            'hinh' => 'ha_tien.jpg'
        ],
        [
            'ma' => 'pq',
            'ten' => 'Đảo Phú Quốc',
            'hinh' => 'phu_quoc.jpg'
        ]
    ];
    function ShowDiaDanh() {
        foreach ($this->__MangDiaDanh as $diadanh) {
            $ten = $diadanh["ten"];
            $ma = $diadanh["ma"];
            echo "<a href='#$ma'><b>$ten</b></a><br>";
        }
    }
    function ChiTietDiaDanh() {
        foreach ($this->__MangDiaDanh as $diadanh) {
            $ma = $diadanh["ma"];
            $ten = $diadanh["ten"];
            $hinh = $diadanh["hinh"];
            echo "<div id='$ma'>";
            echo "<h5 class=''>$ten</h5>";
            echo "<img src='./images/$hinh' class='img-fluid' alt='$ten'>";
            echo "<a href='#' class='nav-link'>Quy về đầu trang</a>";
            echo "</div>";
        }
    }
    function SapXepAZ() {
        usort($this->__MangDiaDanh, function ($a, $b) {
            return strcmp($a['ma'], $b['ma']);
        });
    }
    function SapXepZA() {
        usort($this->__MangDiaDanh, function ($a, $b) {
            return strcmp($b['ma'], $a['ma']); // Đảo chỗ $a và $b để sắp xếp từ Z-A
        });
    }


}
$danhlamthangcanh = new DanhLamThangCanh();
function SapXepAZ() {
    global $danhlamthangcanh;
    if (isset($_GET['sapxep']) && $_GET['sapxep'] == 'az') {
        $danhlamthangcanh->SapXepAZ();
    }
}
function SapXepZA() {
    global $danhlamthangcanh;
    if (isset($_GET['sapxep']) && $_GET['sapxep'] == 'za') {
        $danhlamthangcanh->SapXepZA();
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
    <title>Câu 7</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center text-uppercase">Danh lam thắng cảnh</h3>
        <div class="row row-cols-2 justify-content-center">
            <div class="col">
                <h4>Danh sách địa danh</h4>
                <div>
                    <?php
                    SapXepAZ();
                    SapXepZA();
                    $danhlamthangcanh->ShowDiaDanh();
                    ?>
                </div>
                <div class="m-auto p-3">
                    <a href="?sapxep=az" class="btn btn-light">Sắp xếp A-Z</a>
                    <a href="?sapxep=za" class="btn btn-light">Sắp xếp Z-A</a>
                </div>
            </div>
            <div class="col text-center">
                <?php $danhlamthangcanh->ChiTietDiaDanh(); ?>
            </div>
        </div>
    </div>
</body>
</html>