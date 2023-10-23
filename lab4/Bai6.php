<?php
session_start();
class dang_nhap_session {
    public $__tenDangNhap;
    public $__matKhau;
    function XuLY() {
        if(isset($_POST['dangnhap'])) :
            $this->__tenDangNhap = !empty($_POST['tendangnhap']) ? $_POST['tendangnhap'] : '';
            $this->__matKhau = !empty($_POST['matkhau']) ? $_POST['matkhau'] : '';
            /**
             * Tiến hành lưu thông tin người dùng vào session
             */
            $_SESSION['tendangnhap'] = $this->__tenDangNhap;
            $_SESSION['matkhau'] = $this->__matKhau;
        endif;
    }
}
$dangnhapsession = new dang_nhap_session();
$dangnhapsession->XuLY();
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
exit;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài kiểm tra giũa kỳ</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row row-cols-1 justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center text-uppercase">Đăng nhập</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row row-cols-2 g-3">
                            <div class="col">
                                <label>Tên đăng nhập</label>
                            </div>
                            <div class="col">
                                <input type="text" name="tendangnhap" class="form-control">
                            </div>
                            <div class="col">
                                <label>Mật khẩu</label>
                            </div>
                            <div class="col">
                                <input type="text" name="matkhau" class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <?php
                    if (!empty($_SESSION['tendangnhap'])) :
                        echo 'Chào bạn '. $_SESSION['tendangnhap'] . 'Đăng nhập thành công';
                        
                    endif;
                    ?>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>