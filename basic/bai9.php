<?php
$result = null;
$num = null;
if(isset( $_POST['check'] )) {
    if( !empty( $_POST['so'] )) {
        $num = intval( $_POST['so'] );
        if( ktSNT( $num ) ) {
            $result = 'Đây là số nguyên tố ' . $num;
        } else {
            $result = 'Đây không phải là số nguyên tố';
        }

    }
}

// Hàm kiểm tra số nguyên tố
function ktSNT( $n ) {
    if( $n < 2 ) return false;
    for($i = 2; $i <= sqrt( $n ); $i++) {
        if( $n % $i ===0 ) return false;
    }
    return true;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 9</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-auto m-auto text-center">
            <h3>Kiểm tra số đó có phải số nguyên tố</h3>
            <form action="" method="POST">
                <label class="col-form-label">Nhập số</label>
                <input type="text" name="so" class="form-control-sm">
                <input type="submit" name="check" value="Check" class="btn btn-primary">
            </form>
            <?= $result; ?>
        </div>
    </div>
</div>

</body>
</html>
