
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 5</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row row-cols-2 justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header text-center text-white text-uppercase bg-primary-subtle fs-5">Đăng ký tour du lịch</div>
                <div class="card-body">
                    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" class="row g-3" id="dang_ky_tour_dl">
                        <div class="col-6">
                            <label class="form-label">Tên tour:</label>
                        </div>
                        <div class="col-6">
                            <select name="tour" id="tour" class="form-control">
                                <?php $controller->ShowTourName(); ?>
                            </select>

                        </div>
                        <div class="col-6">
                            <label class="form-label">Ngày khởi hành:</label>
                        </div>
                        <div class="col-6">
                            <input type="date" name="ngaykhoihanh" id="ngaykhoihanh" class="form-control" value="<?= $controller->getNgayKhoiHanh(); ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Phương tiện di chuyển:</label>
                        </div>
                        <div class="col-6">
                            <select name="phuongtien" id="phuongtien" class="form-control">
                                <?php $controller->ShowPhuongTienDiChuyen(); ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Số lượng đăng ký</label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" id="soluongdangky" name="soluongdangky" value="<?= !empty($controller->getSoLuong()) ? $controller->getSoLuong() : ''; ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Tên khách hàng</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="tenkhachhang" name="tenkhachhang" value="<?= !empty($controller->getTenKhachHang()) ? $controller->getTenKhachHang() : ''; ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Liên hệ theo địa chỉ</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="lienhediachi" id="lienhediachi" value="<?= $controller->getLienHeDiaChi() !== null ? $controller->getLienHeDiaChi() : ''; ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Số điện thoại</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="sodienthoai" id="sodienthoai" value="<?php if(isset($controller->getSoDienThoai)) echo $controller->getSoDienThoai(); ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Những yêu cầu kèm theo</label>
                            <textarea class="form-control" name="yeucau" id="yeucau">

                            </textarea>
                        </div>
                        <div class="col-12">

                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary" name="dangky" id="dangky">Đăng ký tour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-center text-uppercase bg-primary-subtle text-white fs-5">
                    Thông tin đặt tour
                </div>
                <div class="card-body">
                    <?php $controller->HienThiThongTinDatTour(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('dang_ky_tour_dl').addEventListener("submit", (event) => {
        const inputSoLuongDangKy = document.getElementById("soluongdangky").value;
        const inputTenKhachHang = document.getElementById("tenkhachhang").value
        const inputLienHeDiaChi = document.getElementById("lienhediachi").value
        const inputSoDienThoai = document.getElementById("sodienthoai").value;
        // const inputYeuCau = document.getElementById("yeucau").value;

        if(inputSoLuongDangKy.trim() === "") {
            alert("Bạn chưa nhập số lượng đăng ký");
            event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
            return;
        }
        if(inputTenKhachHang.trim() === "") {
            alert("Bạn chưa nhập tên khách hàng");
            event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
            return;
        }
        if(inputLienHeDiaChi.trim() === "") {
            alert("Bạn chưa nhập địa chỉ liên hệ");
            event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
            return;
        }
        if(inputSoDienThoai.tr  im() === "") {
            alert("Bạn chưa nhập số điện thoại");
            event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
            return;
        }
        if(inputYeuCau.trim() === "") {
            alert("Bạn chưa nhập yêu cầu");
            event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
            return;
        }
    });
</script>
</body>
</html>
