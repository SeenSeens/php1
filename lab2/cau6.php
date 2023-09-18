<?php
class GioHoa {
    public $__Hoa;
    public $__ArrayHoa = [];
    public function MangGioHoa() {
        foreach ($this->__ArrayHoa as $arrHoa) {
            $kq = strcasecmp($arrHoa, $this->__Hoa);
            if($kq === 0) $this->__ArrayHoa = array_push($this->__ArrayHoa, $this->__Hoa);
        }
    }
}
$giohoa = new GioHoa();
if(isset($_POST['themvaogio'])) :
    $giohoa->__Hoa = trim($_POST['hoa']);
    $giohoa->MangGioHoa();
endif;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Câu 5</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-auto m-auto">
            <form action="" method="post" id="formTNN">
                <div class="card border-info">
                    <div class="card-header text-uppercase text-center fs-3">Mua hoa</div>
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-auto fs-5"> Loại hoa bạn chọn </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" name="hoa" id="hoa">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-info" name="themvaogio" id="themvaogio">Thêm vào giỏ hoa</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                Giỏ hoa bạn có
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>