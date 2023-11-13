<?php
class De1 {
    public array $__data = [];
    private const FILENAME = "de1.txt";
    public array $__Phong = [
        "standard" => [
            "name" => "Standard",
            "price" => 2500000,
            "image" => "https://decoxdesign.com/upload/images/hotel-caitilin-1952m2-phong-ngu-01-decox-design.jpg"
        ],
        "superior" => [
            "name" => "Superior",
            "price" => 3200000,
            "image" => "https://tubepfurniture.com/wp-content/uploads/2020/09/phong-mau-khach-san-go-cong-nghiep-01.jpg"
        ],
        "deluxe" => [
            "name" => "Deluxe",
            "price" => 4600000,
            "image" => "https://noithattrevietnam.com/uploaded/2019/12/1-thiet-ke-phong-ngu-khach-san%20%281%29.jpg"
        ],
        "suite" => [
            "name" => "Suite",
            "price" => 7000000,
            "image" => "https://chefjob.vn/wp-content/uploads/2020/07/tieng-anh-loai-phong-khach-san.jpg"
        ],
    ];
    public $__selectedIdLoaiPhong;
    public $__ngayNhanPhong;
    public $__ngayTraPhong;
    public int $__soLuongPhong;
    function LoadLoaiPhong() {
        foreach ($this->__Phong as $key => $value) :
            echo '<option value="'. $key .'">' . $value['name'] . '</option>';
        endforeach;
    }
    function LoadPriceLoaiPhong() {
        if(!empty($this->__selectedIdLoaiPhong))
            return $this->__Phong[$this->__selectedIdLoaiPhong]['price'];
    }
    function LoadImageLoaiPhong() {
        if(!empty($this->__selectedIdLoaiPhong))
            return '<img src="'. $this->__Phong[$this->__selectedIdLoaiPhong]['image'] .'" alt="" class="img-thumbnail" id="roomImage">';
    }
    function SoNgayO() {
        $ngayNhan = new DateTime($this->__ngayNhanPhong);
        $ngayTra = new DateTime($this->__ngayTraPhong);
        return $ngayNhan->diff($ngayTra)->days;
    }
    function TinhTongTien() {
        return $this->__soLuongPhong * $this->SoNgayO() * $this->LoadPriceLoaiPhong();
    }
    function LoadDataFile() {
        if(file_exists(self::FILENAME)) :
            // Đọc file
            $fileContent  = file_get_contents(self::FILENAME); // Đọc toàn bộ nội dung của file de1.txt vào một chuỗi
            if(!empty($fileContent)) :
                $dataLines = explode("\n", $fileContent ); // Tách chuỗi dữ liệu thành các dòng riêng lẻ
                foreach ($dataLines as $line) :
                    $dataParts = explode('|', $line);
                    if(isset($dataParts) && count($dataParts) == 8) {
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
            if ($key === count($dataParts) - 1) { // Kiểm tra cột hình ảnh
                echo "<td class='col-2'><img src='$value' alt='Hình ảnh' class='img-thumbnail'></td>";
            } else {
                echo "<td class='col'>$value</td>";
            }
        endforeach;
    }
    function WriteFile() {
        $current = file_get_contents(self::FILENAME);
        // Thêm dữ liệu vào file dựa trên biến
        $current .= implode(' | ', $this->__data) . "\n";
        file_put_contents(self::FILENAME, $current);
    }


}

function HandleSubmitForm () {
    global $de1;
    if(isset($_POST['datphong'])) {
        $de1->__selectedIdLoaiPhong = trim(htmlspecialchars($_POST['loaiphong']));
        $de1->__ngayNhanPhong = trim(htmlspecialchars($_POST['ngaynhanphong']));
        $de1->__ngayTraPhong =  trim(htmlspecialchars($_POST['ngaytraphong']));
        $de1->__soLuongPhong = trim(intval($_POST['soluongphong']));
        // Đưa các thông tin trên vào mảng
        array_push($de1->__data,
            trim(htmlspecialchars($_POST['hovaten'])),
            trim(htmlspecialchars($_POST['diachi'])),
            $de1->__Phong[$de1->__selectedIdLoaiPhong]['name'],
            $de1->__soLuongPhong, $de1->SoNgayO(),
            $de1->__Phong[$de1->__selectedIdLoaiPhong]['price'],
            $de1->TinhTongTien(),
            $de1->__Phong[$de1->__selectedIdLoaiPhong]['image']
        );
        $de1->WriteFile();
    }
}
$de1 = new De1();
HandleSubmitForm();
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
<body ng-app="myApp">
<main class="container" ng-controller="myCtrl">
 <section class="row justify-content-center">
     <div class="col-6">
         <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="on" enctype="multipart/form-data" class="row row-cols-2 justify-content-center g-3">
             <div class="col-12">
                 <div class="text-uppercase text-center bg-primary p-3 text-white">Đặt phòng khách sạn</div>
             </div>
             <div class="col">
                 <label>Họ và tên</label>
             </div>
             <div class="col">
                 <input type="text" class="form-control" name="hovaten" required>
             </div>
             <div class="col">
                 <label>Địa chỉ</label>
             </div>
             <div class="col">
                 <input type="text" class="form-control" name="diachi" required>
             </div>
             <div class="col">
                 <label>Loại phòng</label>
             </div>
             <div class="col">
                 <select name="loaiphong" class="form-control" required>
                     <?php $de1->LoadLoaiPhong(); ?>
                 </select>
             </div>
             <div class="col">
                 <label>Ngày nhận phòng</label>
             </div>
             <div class="col">
                 <input type="date" class="form-control" name="ngaynhanphong" required>
             </div>
             <div class="col">
                 <label>Ngày trả phòng</label>
             </div>
             <div class="col">
                 <input type="date" class="form-control" name="ngaytraphong" required>
             </div>
             <div class="col">
                 <label>Số lượng phòng</label>
             </div>
             <div class="col">
                 <input type="text" class="form-control" name="soluongphong" required>
             </div>
             <div class="col">
                 <label>Số ngày ở</label>
             </div>
             <div class="col">
                 <input type="text" class="form-control" name="songayo" value="<?= $de1->SoNgayO(); ?>" disabled>
             </div>
             <div class="col">
                 <label>Giá</label>
             </div>
             <div class="col">
                 <input type="text" class="form-control" name="gia" disabled>
             </div>
             <div class="col">
                 <label>Tổng tiền</label>
             </div>
             <div class="col">
                 <input type="text" class="form-control" name="tongtien" disabled>
             </div>
             <div class="col-12">
                 <label>Hình ảnh phòng</label>
             </div>
             <div class="col-12">
                 <?= $de1->LoadImageLoaiPhong() ?>
             </div>
             <div class="col-12">
                 <button type="submit" class="btn btn-primary" name="datphong">Đặt phòng</button>
             </div>
         </form>
     </div>
 </section>
 <section class="row justify-content-center mt-5">
     <div class="col-12">
         <table class="table table-responsive">
             <thead>
                <th ng-repeat="col in TableColumnsThead">{{col}}</th>
             </thead>
             <tbody>
                <?php $de1->LoadDataFile(); ?>
             </tbody>
         </table>
     </div>
 </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script>
    const app = angular.module('myApp', []);
    app.controller('myCtrl', function ($scope) {
        $scope.TableColumnsThead = ['Tên khách hàng', 'Địa chỉ', 'Loại phòng', 'Số lượng', 'Số ngày ở','Đơn giá', 'Tổng tiền', 'Hình ảnh'];
    })
</script>
</body>
</html>