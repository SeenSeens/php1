<?php
if( isset( $_POST['tinh'] ) ) :
    if( !empty($_POST['so'])) :
        $num = intval( $_POST['so'] );
        $result = "";
        $kq = 0;
        for($i = 0; $i <= $num; $i++) {
            $value = rtrim($i, "-"); // Hàm rtim loại bỏ khoảng trắng hoặc các ký tự được xác định trước khác ở phía bên phải của chuỗi.
            $result .= $value . "-"; // Thêm dấu "-" sau mỗi giá trị
            $kq += $i;
        }
        $result = rtrim($result, "-"); // Loại bỏ dấu "-" cuối cùng
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
    <title>Bài 8</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-auto m-auto text-center">
            <h3>Tính tổng dãy số</h3>
            <form action="" method="POST">
                <label class="form-label">Nhập số</label>
                <input class="form-control" type="number" name="so" placeholder="Nhập số">
                <input type="submit" name="tinh" value="Show!" class="btn btn-info mt-3">
            </form>
            <span>
				<?php
                if (isset($result)) {
                    echo "Dãy số <br>" . $result . '<br> Kết quả <br>' . $kq;
                }
                ?>
			</span>
        </div>
    </div>
</div>

</body>
</html>

