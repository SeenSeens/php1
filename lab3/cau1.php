<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 1</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h3 class="text-center text-uppercase">Theo dõi học tập</h3>
                <form action="" method="post" class="row g-3">
                    <div class="col-4">
                        <label class="form-label">Họ tên học sinh:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="hotenhocsinh">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Giáo viên phụ trách:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="giaovienphutrach">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Lớp:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="lop">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Ngày:</label>
                    </div>
                    <div class="col-4">
                        <input type="datetime-local" name="ngay" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Những việc phân công chưa làm</label>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>