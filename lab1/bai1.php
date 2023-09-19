<?php require_once "./php/bai1.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 1</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-auto m-auto">
            <form action="" method="POST">
                <label class="form-label">In lời chào</label>
                <input type="text" name="name" class="form-control" placeholder="Nhap ten cua ban">
                <input type="submit" id="chao" name="chao" value="Chào" class="btn btn-success">
            </form>
            <span class="alert-success" id="rs"><?= "Chào bạn " . $name; ?></span>
        </div>
    </div>
</div>
</body>
</html>

