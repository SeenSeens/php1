<?php require_once "./php/bai4.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-auto m-auto">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center text-uppercase fs-3">Kết quả học tập</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label>Điểm HK 1</label></td>
                                <td><input type="text" name="diemhk1" id="diemhk1" class="form-control" value="<?php if(isset($ketquahoctap->diemhk1)) echo$ketquahoctap->diemhk1; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Điểm HK 2</label></td>
                                <td><input type="number" name="diemhk2" class="form-control" value="<?php if(isset($ketquahoctap->diemhk2)) echo$ketquahoctap->diemhk2; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Điểm trung bình</label></td>
                                <td><input type="number" name="diemtrungbinh" class="form-control" value="<?php if(isset($ketquahoctap->diemtrungbinh)) echo $ketquahoctap->diemtrungbinh; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td><label>Kết quả</label></td>
                                <td><input type="text" name="ketqua" class="form-control" value="<?php if(isset($ketquahoctap->ketqua)) echo $ketquahoctap->ketqua; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td><label>Xếp loại học lục</label></td>
                                <td><input type="text" name="xeploai" class="form-control" value="<?php if(isset($ketquahoctap->xeploai)) echo $ketquahoctap->xeploai; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" value="Xem kết quả" class="btn btn-secondary" name="xemketqua">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
