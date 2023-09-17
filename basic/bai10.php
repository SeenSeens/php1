
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 10</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-auto m-auto text-center">
                <form action="" method="POST">
                    <input type="text" name="txttext" class="form-control-sm">
                    <input type="submit" name="txt" value="Chuyển đổi" class="btn btn-primary" value="Bài tập PHP cơ bản và nâng cao">
                </form>
                <?php
                if( isset( $_POST['txt'] ) ) {
                    if( !empty($_POST['txttext']) ) {
                        $text = $_POST['txttext'];
                        echo 'Chữ thường '. strtolower($text); // strtolower() chuyển đổi chữ hoa sang chữ thường
                        echo '<br>Chữ hoa ' . strtoupper($text); // strtoupper() chuyển đổi chữ thường sang chữ hoa
                        echo '<br>' . lcfirst($text); // lcfirst() chuyển đổi chữ đầu tiên thành chữ thường
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

