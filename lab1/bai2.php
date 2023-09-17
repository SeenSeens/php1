<?php
$noidung = "";
$maunen = "";
$mauchu = "";
// Khung input
function checkEmpty() {
    if( !empty($_POST['noidung']) && !empty($_POST['maunen']) && !empty($_POST['mauchu'])) :
        echo "Chua nhập dữ liệu";
    endif;
    return true;
}
// Check type color
function checkTypeColor() {

}
if(isset($_POST['xemketqua'])) :
    if( checkEmpty()) :
        $noidung = $_POST['noidung'];
        $maunen = $_POST['maunen'];
        $mauchu = $_POST['mauchu'];
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
    <title>Bài 2</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-auto m-auto">
            <div class="card">
                <div class="card-header text-uppercase text-center">
                    Định dạng màu chữ - màu nền
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label for="">Nội dung</label>
                        <input type="text" class="form-control" name="noidung">
                        <label for="">Màu nền</label>
                        <input type="text" name="maunen" class="form-control" placeholder="Nhập màu nền">
                        <label for="">Màu chữ</label>
                        <input type="text" name="mauchu" class="form-control">
                        <button type="submit" name="xemketqua" class="btn btn-info">Xem kết quả</button>
                    </form>
                </div>
                <div class="card-footer" <?= $maunen; ?>>
                    <span style="color: <?= $mauchu; ?>"> <?= $noidung; ?>  </span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


