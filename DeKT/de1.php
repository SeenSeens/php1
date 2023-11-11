<?php
class De1 {
    private array $__loaiPhong = [
        "standard" => "Standard",
        "superior" => "Superior",
        "deluxe" => "Deluxe",
        "suite" => "Suite"
    ];
    private array $__giaLoaiPhong = [
        "standard" => 2500000,
        "superior" => 3200000,
        "deluxe" => 4600000,
        "suite" => 7000000
    ];
    private array $__hinhLoaiPhong = [
        "standard" => "https://decoxdesign.com/upload/images/hotel-caitilin-1952m2-phong-ngu-01-decox-design.jpg",
        "superior" => "https://tubepfurniture.com/wp-content/uploads/2020/09/phong-mau-khach-san-go-cong-nghiep-01.jpg",
        "deluxe" => "https://noithattrevietnam.com/uploaded/2019/12/1-thiet-ke-phong-ngu-khach-san%20%281%29.jpg",
        "suite" => "https://chefjob.vn/wp-content/uploads/2020/07/tieng-anh-loai-phong-khach-san.jpg"
    ];
    private $__selectedIdLoaiPhong;
    private $__ngayNhanPhong;
    private $__ngayTraPhong;
    private int $__soLuongPhong;
    function LoadLoaiPhong() {
        foreach ($this->__loaiPhong as $key => $value) :
            echo '<option value="'. $key .'">' . $value . '</option>';
        endforeach;
    }
    function LoadPriceLoaiPhong() {
        if(!empty($this->__selectedIdLoaiPhong))
            return $this->__giaLoaiPhong[$this->__selectedIdLoaiPhong];
    }
    function LoadImageLoaiPhong() {
        if(!empty($this->__selectedIdLoaiPhong))
            return '<img src="'. $this->__hinhLoaiPhong[$this->__selectedIdLoaiPhong] .'" alt="" class="img-thumbnail">';
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
        $filename = "de1.txt";
        if(file_exists($filename)) :
            // Đọc file
            $fileContent  = file_get_contents($filename); // Đọc toàn bộ nội dung của file de1.txt vào một chuỗi
            if(!empty($fileContent)) :
                $dataLines = explode("\n", $fileContent ); // Tách chuỗi dữ liệu thành các dòng riêng lẻ
                foreach ($dataLines as $line) :
                    $dataParts = explode('|', $line);
                    echo '<tr>';
                    foreach ($dataParts as $key => $value) :
                        if ($key === count($dataParts) - 1) { // Kiểm tra cột hình ảnh
                            echo "<td><img src='$value' alt='Hình ảnh' class='w-25 d-block'></td>";
                        } else {
                            echo "<td class='col'>$value</td>";
                        }
                    endforeach;
                    echo '</tr>';
                endforeach;
            endif;

            $parsedData = []; // Tạo một mảng rỗng để lưu trữ dữ liệu đã phân tích
            // Xử lý từng dòng dữ liệu
        endif;
    }

    function HandleSubmitForm () {
        if(isset($_POST['datphong'])) {
            $hoVaTen = isset($_POST['hovaten']) ? trim(htmlspecialchars($_POST['hovaten'])) : '';
            $diaChi = isset($_POST['diachi']) ? trim(htmlspecialchars($_POST['diachi'])) : '';
            $loaiPhong = isset($_POST['loaiphong']) ? trim(htmlspecialchars($_POST['loaiphong'])) : '';
            $this->__selectedIdLoaiPhong = $loaiPhong;
            $this->__ngayNhanPhong = isset($_POST['ngaynhanphong']) ? trim(htmlspecialchars($_POST['ngaynhanphong'])) : '';
            $this->__ngayTraPhong = isset($_POST['ngaytraphong']) ? trim(htmlspecialchars($_POST['ngaytraphong'])) : '';
            $this->__soLuongPhong = isset($_POST['soluongphong']) ? trim(htmlspecialchars($_POST['soluongphong'])) : 0;
            $soNgayO = isset($_POST['songayo']) ? trim(htmlspecialchars($_POST['songayo'])) : '';
            $Gia = isset($_POST['gia']) ? trim(htmlspecialchars($_POST['gia'])) : '';
            $tongTien = isset($_POST['tongtien']) ? trim(htmlspecialchars($_POST['tongtien'])) : '';
            $hinhAnhPhong = isset($_POST['hinhanhphong']) ? trim(htmlspecialchars($_POST['hinhanhphong'])) : '';
        }
    }
}
$de1 = new De1();
$de1->handleSubmitForm();
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
 <main class="container">
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
                     <input type="text" class="form-control" name="hovaten">
                 </div>
                 <div class="col">
                     <label>Địa chỉ</label>
                 </div>
                 <div class="col">
                     <input type="text" class="form-control" name="diachi">
                 </div>
                 <div class="col">
                     <label>Loại phòng</label>
                 </div>
                 <div class="col">
                     <select name="loaiphong" class="form-control">
                         <?php $de1->LoadLoaiPhong(); ?>
                     </select>
                 </div>
                 <div class="col">
                     <label>Ngày nhận phòng</label>
                 </div>
                 <div class="col">
                     <input type="date" class="form-control" name="ngaynhanphong">
                 </div>
                 <div class="col">
                     <label>Ngày trả phòng</label>
                 </div>
                 <div class="col">
                     <input type="date" class="form-control" name="ngaytraphong">
                 </div>
                 <div class="col">
                     <label>Số lượng phòng</label>
                 </div>
                 <div class="col">
                     <input type="text" class="form-control" name="soluongphong">
                 </div>
                 <div class="col">
                     <label>Số ngày ở</label>
                 </div>
                 <div class="col">
                     <input type="text" class="form-control" name="songayo" value="<?= $de1->SoNgayO(); ?>">
                 </div>
                 <div class="col">
                     <label>Giá</label>
                 </div>
                 <div class="col">
                     <input type="text" class="form-control" name="gia">
                 </div>
                 <div class="col">
                     <label>Tổng tiền</label>
                 </div>
                 <div class="col">
                     <input type="text" class="form-control" name="tongtien">
                 </div>
                 <div class="col-12">
                     <label>Hình ảnh phòng</label>
                 </div>
                 <div class="col-12">
                     <?= $de1->LoadImageLoaiPhong(); ?>
                 </div>
                 <div class="col-12">
                     <button type="submit" class="btn btn-primary" name="datphong">Đặt phòng</button>
                 </div>
             </form>
         </div>
     </section>
     <section class="row justify-content-center mt-5">
         <div class="col">
             <table class="table table-responsive">
                 <thead>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Loại phòng</th>
                    <th>Số lượng</th>
                    <th>Số ngày ở</th>
                    <th>Đơn giá</th>
                    <th>Tổng tiền</th>
                    <th>Hình ảnh</th>
                 </thead>
                 <tbody>
                    <?php $de1->LoadDataFile(); ?>
                 </tbody>
             </table>
         </div>
     </section>
 </main>
</body>
</html>