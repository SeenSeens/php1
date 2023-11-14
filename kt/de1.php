<!-- https://stringee.com/vi/blog/post/ham-date-trong-php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
$mangphong = array('Standart' => 3200000, 'Superior' => 2500000, 'Deluxe' => 4600000, 'Suite' => 7000000);
$hovaten = '';
$diachi = '';
$loaiphong = '';
$ngaynhanphong = '';
$ngaytraphong = '';
$soLuongphong = 0;
$songayo = 0;
$gia = 0;
$myfuncloaiphong = 0;
$tongtien = 0;
$myfuncimg = '';
if (isset($_POST['submit'])) {
    if (isset($_POST['loaiphong'])) {
        $loaiphong = $_POST['loaiphong'];
    }
    $hovaten = $_POST['hovaten'];
    $diachi = $_POST['diachi'];
    $ngaynhanphong = $_POST['ngaynhanphong'];
    $ngaytraphong = $_POST['ngaytraphong'];
    $soLuongphong = $_POST['soLuongphong'];
    if (isset($_POST['songayo'])) {
        $songayo = $_POST['songayo'];
    }
    if (isset($_POST['gia'])) {
        $gia = $_POST['gia'];
    }
    if (isset($_POST['tongtien'])) {
        $tongtien = $_POST['tongtien'];
    }

    // ------------------------------------------
    $ngayNhanPhong = new DateTime($ngaynhanphong);
    $ngayTraPhong = new DateTime($ngaytraphong);

    // Tính số ngày ở
    $songayo = $ngayTraPhong->diff($ngayNhanPhong)->days;
    // ------------------------------------------

    // $gia = loaiphong($loaiphong);
    $myfuncloaiphong = loaiphong($loaiphong);
    $tongtien = tongtien($soLuongphong, $songayo, $myfuncloaiphong);
    $myfuncimg = images($loaiphong);

    $dl = $hovaten . ";" . $diachi . ";" . $ngaynhanphong . ";" . $ngaytraphong . $soLuongphong . ";" . $songayo . ";" . $myfuncloaiphong . ";" . $tongtien . ";" . $myfuncimg . "\n";
    $myfile = fopen('de1.txt', 'a+');
    fwrite($myfile, $dl);
    fclose($myfile);
}
function loaiphong($loaiphong)
{
    $tienloaiphong = 0;
    switch ($loaiphong) {
        case 'Standart':
            $tienloaiphong = 2500000;
            break;
        case 'Superior':
            $tienloaiphong = 3200000;
            break;
        case 'Deluxe':
            $tienloaiphong = 4600000;
            break;
        case 'Suite':
            $tienloaiphong = 7000000;
            break;
    }
    return $tienloaiphong;
}
// tổng tiền
function tongtien($soLuongphong, $songayo, $gia)
{
    $tongtien = (float) $soLuongphong * $songayo * $gia;
    return $tongtien;
}
// hinh anh
function images($loaiphong)
{
    $imgs = '';
    switch ($loaiphong) {
        case 'Standart':
            $imgs = 'https://decoxdesign.com/upload/images/hotel-caitilin-1952m2-phong-ngu-01-decox-design.jpg';
            break;
        case 'Superior':
            $imgs = 'https://tubepfurniture.com/wp-content/uploads/2020/09/phong-mau-khach-san-go-cong-nghiep-01.jpg';
            break;
        case 'Deluxe':
            $imgs = 'https://noithattrevietnam.com/uploaded/2019/12/1-thiet-ke-phong-ngu-khach-san%20%281%29.jpg';
            break;
        case 'Suite':
            $imgs = 'https://chefjob.vn/wp-content/uploads/2020/07/tieng-anh-loai-phong-khach-san.jpg';
            break;
    }
    return $imgs;
}
?>
<?php
    $myFile = fopen('de1.txt','a+');
    $line = [];
    $sodong = 0;
    while (!feof($myFile)) {
        $line[ $sodong++ ] = fgets($myFile) . "\n";
    }
    fclose($myFile);
    ?>
    <div class="container mx-auto">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" style="height: 648px;" method="post">
            <table class="w-50 mx-auto" style="border: none;">
                <caption class="text-uppercase text-center fw-bold bg-dark text-white caption-top mb-3">đặt phòng khách sạn
                </caption>
                <tr>
                    <th>Họ và Tên</th>
                    <td class="p-0">
                        <input type="text" class="w-100 rounded-3" style="height: 40px; outline: none;" name="hovaten"
                            placeholder="Họ và tên" <?php echo $hovaten; ?>>
                    </td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td class="p-0">
                        <input type="text" class="w-100 rounded-3" style="height: 40px; outline: none;" name="diachi"
                            placeholder="Địa chỉ" <?php echo $diachi; ?>>
                    </td>
                </tr>
                <tr>
                    <th>Loại phòng</th>
                    <td class="p-0">
                        <select name="loaiphong">
                            <?php
                                foreach ($mangphong as $key => $value) {
                                    ?>
                                                            <option value="<?php echo $key; ?>" <?php if ($loaiphong == $key) {
                                        echo 'selected';
                                    }
                                    ?>><?php echo $key; ?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Ngày nhận phòng</th>
                    <td class="p-0">
                        <input type="date" class="w-100 rounded-3" style="height: 40px; outline: none;" name="ngaynhanphong"
                            placeholder="Ngày nhận phòng" value="<?php echo $ngaynhanphong; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Ngày trả phòng</th>
                    <td class="p-0">
                        <input type="date" class="w-100 rounded-3" style="height: 40px; outline: none;" name="ngaytraphong"
                            placeholder="Ngày trả phòng" value="<?php echo $ngaytraphong; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Số lượng phòng</th>
                    <td class="p-0">
                        <input type="text" class="w-100 rounded-3" style="height: 40px; outline: none;" name="soLuongphong"
                            placeholder="Số lượng phòng" value="<?php echo $soLuongphong; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Số ngày ở</th>
                    <td class="p-0">
                        <input type="text" class="w-100 rounded-3" style="height: 40px; outline: none;" name="songayo"
                            placeholder="Số ngày ở" value="<?php echo $songayo; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Giá</th>
                    <td class="p-0">
                        <input type="text" class="w-100 rounded-3" style="height: 40px; outline: none;" name="gia" placeholder="Giá"
                        value="<?php echo $myfuncloaiphong; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Tổng tiền</th>
                    <td class="p-0">
                        <input type="text" class="w-100 rounded-3" style="height: 40px; outline: none;" name="tongtien"
                            placeholder="Tổng tiền" value="<?php echo $tongtien; ?>">
                    </td>
                </tr>
            </table>
            <div class="w-50 mx-auto my-3" style="height: 150px;">
                <img src="<?php echo $myfuncimg; ?>" class="card-img-top h-100" alt="">
                <input type="submit" name="submit" class="text-capitalize text-white bg-dark w-100 my-3 rounded-3" style="height: 50px;" value="đặt phòng">
            </div>
        </form>
        <div class="w-50 mx-auto my-3" style="height: 500px;">
            <table class="w-100 table">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Loại phòng</th>
                        <th>Số lượng</th>
                        <th>Số ngày ở</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>
                        <th>Hình ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($line as $i) :
                            $fileUrl = explode(";", $i);
                            if (isset($fileUrl) && trim($fileUrl[0]) != '') :
                        ?>
                                <tr>
                                    <td><?php echo $fileUrl[0] ?></td>
                                    <td><?php echo $fileUrl[1] ?></td>
                                    <td><?php echo $fileUrl[2] ?></td>
                                    <td><?php echo $fileUrl[3] ?></td>
                                    <td><?php echo $fileUrl[4] ?></td>
                                    <td><?php echo $fileUrl[5] ?></td>
                                    <td><?php echo $fileUrl[6] ?></td>
                                    <td>
                                        <img src="<?php echo $fileUrl[7] ?>" class="img-thumbnail">
                                    </td>
                                </tr>
                        <?php
                            endif;
                        endforeach;
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>