<?php
session_start();
class dat_hang_session {
    public $__tenSanPham;
    public $__diaChi;
    function XuLY() {
        if(isset($_POST['dathang'])) :
            $this->__tenSanPham = !empty($_POST['sanpham']) ? $_POST['sanpham'] : '';
            $this->__diaChi = !empty($_POST['diachi']) ? $_POST['diachi'] : '';
            /**
             * Tiến hành lưu thông tin người dùng vào session
             */
            $_SESSION['sanpham'] = $this->__tenSanPham;
            $_SESSION['diachi'] = $this->__diaChi;
        endif;
    }
}
$dathangsession = new dat_hang_session();
$dathangsession->XuLY();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài kiểm tra giũa kỳ</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row row-cols-1 justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center text-uppercase">Các sản phẩm</div>
                <div class="card-body">
                    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" id="dathang">
                        <div class="row row-cols-2 g-3">
                            <div class="col">
                                <label>Chúng tôi có</label>
                            </div>
                            <div class="col">
                                <select name="sanpham" id="sanpham" class="form-control">
                                    <optgroup label="Kem">
                                        <option value="Kem bốn mùa" <?php if ($dathangsession->__tenSanPham  === 'Kem bốn mùa') echo 'selected'; ?>>Kem bốn mùa</option>
                                        <option value="Kem thập cẩm" <?php if ($dathangsession->__tenSanPham  === 'Kem thập cẩm') echo 'selected'; ?>>Kem thập cẩm</option>
                                    </optgroup>
                                    <optgroup label="Bánh">
                                        <option value="Bông lan lá dứa" <?php if ($dathangsession->__tenSanPham  === 'Bông lan lá dứa') echo 'selected'; ?>>Bông lan lá dứa</option>
                                        <option value="Bông lan sữa tươi" <?php if ($dathangsession->__tenSanPham  === 'Bông lan sữa tươi') echo 'selected'; ?>>Bông lan sữa tươi</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col">
                                <label>Địa chỉ giao hàng</label>
                            </div>
                            <div class="col">
                                <input type="text" name="diachi" id="diachi" class="form-control" value="<?= !empty($_SESSION['diachi']) ? $_SESSION['diachi'] : ''; ?>">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" name="dathang">Đặt hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <?php
                    if (!empty($_SESSION['sanpham'])) :
                        echo 'Bạn đã đặt '. ucwords($_SESSION['sanpham']);
                        echo '</br>';
                        echo 'Chúng tôi sẽ giao hàng cho bạn tại địa chỉ ';
                        echo ucwords($_SESSION['diachi']) . ' Cảm ơn bạn. :)';
                        echo '</br>';
                        echo '<a href="./L4_C6_TruongDinhTuan1.php">Qua về trang đăng nhập</a>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('dathang').addEventListener("submit", (event) => {
        const inputSanPham = document.getElementById("sanpham").value;
        const inputDiaChi = document.getElementById("diachi").value;
        if(inputSanPham.trim() === "" || inputDiaChi.trim() === "") {
            alert("Bạn chưa chọn sản phẩm hoặc chưa nhập địa chỉ");
            event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
        }
    })
</script>
</body>
</html>