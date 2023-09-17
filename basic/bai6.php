<?php
$so = null;
if( $_SERVER["REQUEST_METHOD"] == "POST") :
    if( isset($_POST['caculator']) && !empty($_POST['so']) ) :
        $so = $_POST['so'];
        $result = factorial($so);
    endif;
endif;
?>
<?php
// Tính giai thừa || đệ quy
function factorial($n) {
    if ($n == 0 || $n == 1) :
        return 1;
    else :
        return $n * factorial($n - 1);
    endif;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 6</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-auto m-auto text-center">
            <h3>Tính giai thừa</h3>
            <form action="" method="POST">
                <input type="text" name="so" class="form-control-sm" placeholder="Nhập số">
                <input type="submit" name="caculator" value="Tính" class="btn btn-primary">
            </form>
            <span>
				<?php
                if( !empty($result)) :
                    echo $result;
                else :
                    echo "Vui lòng nhập số để tính giai thừa.";
                endif;
                ?>
			</span>
        </div>
    </div>
</div>
</body>
</html>

