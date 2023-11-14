<?php
class KhachHang {
    private const FILENAME = "TruongDinhTuan_501220287.txt";
    public array $__data = [];
    private array $__ngheNghiep = [
        'sinhvien' => 'Sinh Viên',
        'hocsinh' => 'Học sinh',
        'giamdoc' => 'Giám đốc',
        'chuticnuoc' => 'Chủ tịch nước'
    ];
    private array $__dichVu = [
        'window' => [
            'name' => 'Cài đặt Window - 100.000 VNĐ',
            'price' => 100000
        ],
        'office' => [
            'name' => 'Cài đặt Office - 200.000 VNĐ',
            'price' => 200000
        ],
        'khac' => [
            'name' => 'Cài đặt khác - từ 300.000 đến 500.000 VNĐ',
            'price' => 450000
        ],
        'vesinhmay' => [
            'name' => 'Vệ sinh máy - 200.000 VNĐ',
            'price' => 200000
        ]
    ];
    private $__arrayIdDichVu = [];
    private $__ngheNghiepID;
    private $__idDichVu;
    function LoadNgheNghiep() {
        foreach ($this->__ngheNghiep as $key => $value) :
            echo '<option value="' . $key . '"' . ($this->__ngheNghiepID === $key ? ' selected' : '') . '>' . $value . '</option>';
        endforeach;
    }
    function LoadDichVu() {
        foreach ($this->__dichVu as $key => $value) {
            $isChecked = is_array($this->__arrayIdDichVu) && in_array($key, $this->__arrayIdDichVu);

            echo '<input type="checkbox" name="dichvu[]" value="'. $key .'"' . ($isChecked ? ' checked' : '') . '> ';
            echo '<label>' . $value['name'] . '</label><br>';
        }
    }

    function TinhTongTien() {
        if (empty($this->__arrayIdDichVu)) {
            return 0;
        }

        $tongTien = 0;
        foreach ($this->__arrayIdDichVu as $dichVu) {
            $prices = array_map(function ($selectedService) {
                return $this->__dichVu[$selectedService]['price'];
            }, $dichVu);

            $tongTien += array_sum($prices);
        }

        return $tongTien;
    }


    function DocFile() {
        if(file_exists(self::FILENAME)) :
            // Đọc file
            $fileContent  = file_get_contents(self::FILENAME); // Đọc toàn bộ nội dung của file de1.txt vào một chuỗi
            if(!empty($fileContent)) :
                $dataLines = explode("\n", $fileContent ); // Tách chuỗi dữ liệu thành các dòng riêng lẻ
                foreach ($dataLines as $line) :
                    $dataParts = explode(';', $line);
                    if(isset($dataParts) && count($dataParts) == 7) {
                        echo '<tr>';
                        $this->PrintTableColumns($dataParts);
                        echo '</tr>';
                    }
                endforeach;
            endif;
        endif;
    }
    private function PrintTableColumns($dataParts) {
        foreach ($dataParts as $key => $value) :
            echo "<td class='col'>$value</td>";
        endforeach;
    }
    function GhiFile() {
        $current = file_get_contents(self::FILENAME);
        // Chuyển đổi giá trị từ mảng dịch vụ thành chuỗi giá trị
        $values = array_map(function ($selectedService) {
            return $this->__dichVu[$selectedService]['name'];
        }, $this->__arrayIdDichVu[0]);

        // Nối giá trị vào chuỗi
        $current .= implode(' ; ', array_slice($this->__data, 0, 5)) . ' ; ' . implode(', ', $values) . ' ; ' . $this->TinhTongTien() . "\n";

        file_put_contents(self::FILENAME, $current);
    }


    function XuLy() {
        if(isset($_POST['dangky'])) :
            $hoTen = trim(htmlspecialchars($_POST['hoten']));
            $diaChi = trim(htmlspecialchars($_POST['diachi']));
            $soDienThoai = trim(htmlspecialchars($_POST['sodienthoai'], ENT_QUOTES));
            $email = trim(htmlspecialchars($_POST['email']));
            $this->__ngheNghiepID = trim(htmlspecialchars($_POST['nghenghiep']));
            $this->__idDichVu = isset($_POST['dichvu']) ? $_POST['dichvu'] : [];
            array_push($this->__arrayIdDichVu, $this->__idDichVu);
            array_push($this->__data, $hoTen, $diaChi, $this->__ngheNghiep[$this->__ngheNghiepID], $soDienThoai, $email, $this->__arrayIdDichVu, $this->TinhTongTien());
            $this->GhiFile();
        endif;
    }
}
$kh = new KhachHang();
$kh->XuLy();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<main class="container">
    <section class="row g-3 justify-content-center">
        <div class="col-8 text-center bg-primary px-5 py-2">
            <label class="text-uppercase text-white">Phiếu chăm sóc khách hàng</label>
        </div>
        <div class="col-12 text-center">
            <label>Ngày <?= date('d')?> tháng <?= date('m') ?> năm <?= date('Y') ?></label>
        </div>
        <div class="col-8">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="row row-cols-2 g-3" enctype="multipart/form-data">
                <div class="col">
                    <label>Họ tên</label>
                </div>
                <div class="col">
                    <input type="text" name="hoten" class="form-control" value="<?= $kh->__data[0] ?? '' ?>">
                </div>
                <div class="col">
                    <label>Địa chỉ</label>
                </div>
                <div class="col">
                    <input type="text" name="diachi" class="form-control" value="<?= $kh->__data[1] ?? '' ?>">
                </div>
                <div class="col">
                    <label>Số điện thoại</label>
                </div>
                <div class="col">
                    <input type="text" name="sodienthoai" class="form-control" value="<?= $kh->__data[3] ?? '' ?>">
                </div>
                <div class="col">
                    <label>Email</label>
                </div>
                <div class="col">
                    <input type="text" name="email" class="form-control" value="<?= $kh->__data[4] ?? '' ?>">
                </div>
                <div class="col">
                    <label>Nghề nghiệp</label>
                </div>
                <div class="col">
                    <select name="nghenghiep" class="form-control">

                        <?php $kh->LoadNgheNghiep(); ?>
                    </select>
                </div>
                <div class="col">
                    <label>Dịch vụ thực hiện</label>
                </div>
                <div class="col">
                    <?php $kh->LoadDichVu(); ?>
                </div>
                <div class="col">
                    <label>Tổng tiền</label>
                </div>
                <div class="col">
                    <input type="text" name="tongtien" class="form-control" value="<?= $kh->TinhTongTien() ?>" disabled>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary" name="dangky">Nút đăng ký</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Nghề nghiệp</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Dịch vụ thực hiện</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $kh->DocFile(); ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>