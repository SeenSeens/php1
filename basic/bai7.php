<?php
function checkEmpty() {
    if( !empty($_POST['diemLy']) && !empty($_POST['diemHoa']) &&!empty($_POST['diemVan']) && !empty($_POST['diemToan']) && !empty($_POST['diemLichSu']) && !empty($_POST['diemTiengAnh']) ) :
        return true;
    else :
        return false;
    endif;

}

function diemTB($diemArr) {
    $tongdiem = array_sum($diemArr);
    $count = count($diemArr);
    return $diemTrungBinh = $tongdiem / $count;
}

function xepLoai($diemTrungBinh){
    $xeploai = '';
    switch ($diemTrungBinh) {
        case $diemTrungBinh < 5:
            $xeploai = "Yếu";
            break;
        case $diemTrungBinh < 6.5:
            $xeploai = "Trung bình";
            break;
        case $diemTrungBinh < 7.5:
            $xeploai = "Khá";
            break;
        case $diemTrungBinh < 9:
            $xeploai = "Giỏi";
            break;
        default:
            $xeploai = "Xuất sắc";
    }
    return $xeploai;
}

$diemTrungBinh = $xeploai = '';
if( $_SERVER["REQUEST_METHOD"] == "POST" ) :
    if( isset($_POST['tinhDiem'])) :
        if( checkEmpty() ) :
            $diemly = floatval( $_POST['diemLy'] );
            $diemhoa = floatval( $_POST['diemHoa'] );
            $diemvan = floatval( $_POST['diemVan'] );
            $diemtoan = floatval( $_POST['diemToan'] );
            $diemlichsu = floatval( $_POST['diemLichSu'] );
            $diemtienganh = floatval( $_POST['diemTiengAnh'] );
            // Lưu các thông tin điẻm vào 1 array
            $diemArr = [
                'Ly' => $diemly,
                'Hoa' => $diemhoa,
                'Van' => $diemvan,
                'Toan' => $diemtoan,
                'LichSu' => $diemlichsu,
                'TiengAnh' => $diemtienganh
            ];
            $diemTrungBinh = diemTB($diemArr);
            $xeploai = xepLoai($diemTrungBinh);
        endif;
    endif;
endif;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 7</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-auto m-auto text-center">
            <form action="" method="POST">
                <label class="form-label">Điểm Lý</label>
                <input class="form-control" type="number" name="diemLy" placeholder="Nhập điểm lý" min="0" max="10" required>
                <label class="form-label">Điểm Hóa</label>
                <input class="form-control" type="number" name="diemHoa" placeholder="Nhập điểm hóa" min="0" max="10" required>
                <label class="form-label">Điểm Văn</label>
                <input class="form-control" type="number" name="diemVan" placeholder="Nhập điểm văn" min="0" max="10" required>
                <label class="form-label">Điểm Toán</label>
                <input class="form-control" type="number" name="diemToan" placeholder="Nhập điểm toán" min="0" max="10" required>
                <label class="form-label">Điểm Lịch sử</label>
                <input class="form-control" type="number" name="diemLichSu" placeholder="Nhập điểm lịch sử" min="0" max="10" required>
                <label class="form-label">Điểm Tiếng Anh</label>
                <input class="form-control" type="number" name="diemTiengAnh" placeholder="Nhập điểm tiếng Anh" min="0" max="10" required>
                <input type="submit" name="tinhDiem" value="Kiểm tra" class="btn btn-success mt-3">
            </form>
            <span>
				<?php
                if( !empty($diemTrungBinh) && !empty($xeploai)) :
                    echo "Điểm trung bình: " . number_format($diemTrungBinh, 2) . "&emsp;";
                    echo "Xếp loại: " . $xeploai;
                else :
                    echo "Vui lòng nhập đủ thông tin điểm.";
                endif;
                ?>
			</span>
        </div>
    </div>
</div>
</body>
</html>