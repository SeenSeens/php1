<?php
class TinhNamAmLich {
    public $__namduonglich;
    public $__namamlich;
    public $__thiencan;
    public $__diachi;

    public function ThienCan() {
        switch ($this->__namduonglich % 10) {
            case 0:
                $this->__thiencan = 'Canh';
                break;
            case 1:
                $this->__thiencan = 'Tân';
                break;
            case 2:
                $this->__thiencan = 'Nhâm';
                break;
            case 3:
                $this->__thiencan = 'Quý';
                break;
            case 4:
                $this->__thiencan = 'Giáp';
                break;
            case 5:
                $this->__thiencan = 'Ất';
                break;
            case 6:
                $this->__thiencan = 'Bính';
                break;
            case 7:
                $this->__thiencan = 'Đinh';
                break;
            case 8:
                $this->__thiencan = 'Mậu';
                break;
            case 9:
                $this->__thiencan = 'Kỷ';
                break;
        }
    }

    public function DiaChi() {
        switch ( ( $this->__namduonglich - 3 ) % 12 ) {
            case 0:
                $this->__diachi = 'Hợi';
                break;
            case 1:
                $this->__diachi = 'Tí';
                break;
            case 2:
                $this->__diachi = 'Sửu';
                break;
            case 3:
                $this->__diachi = 'Dần';
                break;
            case 4:
                $this->__diachi = 'Mão';
                break;
            case 5:
                $this->__diachi = 'Thìn';
                break;
            case 6:
                $this->__diachi = 'Tỵ';
                break;
            case 7:
                $this->__diachi = 'Ngọ';
                break;
            case 8:
                $this->__diachi = 'Mùi';
                break;
            case 9:
                $this->__diachi = 'Thân';
                break;
            case 10:
                $this->__diachi = 'Dậu';
                break;
            case 11:
                $this->__diachi = 'Tuất';
                break;
        }
    }
    public function NamAmLich() {
        $this->__namamlich = $this->__thiencan . ' ' . $this->__diachi;
    }
}
$tinhnamamlich = new TinhNamAmLich();
if(isset($_POST['tim']) && isset($_POST['namduonglich'])) {
    $tinhnamamlich->__namduonglich = intval($_POST['namduonglich']);
    $tinhnamamlich->ThienCan();
    $tinhnamamlich->DiaChi();
    $tinhnamamlich->NamAmLich();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bài 6</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-auto m-auto">
				<form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center text-uppercase fs-3">Tính năm âm lịch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                            	<td>
                                    <label class="form-label">Năm dương lịch</label>
                                </td>
                            	<td></td>
                            	<td>
                                    <label class="form-label">Năm âm lịch</label>
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                    <input type="text" class="form-control" name="namduonglich" value="<?= isset($tinhnamamlich->__namduonglich) ? $tinhnamamlich->__namduonglich : ''; ?>">
                                </td>
                            	<td>
                                    <input type="submit" value="=>" class="form-control" name="tim">
                                </td>
                            	<td>
                                    <input type="text" class="form-control" name="namamlich" value="<?= isset($tinhnamamlich->__namamlich) ? $tinhnamamlich->__namamlich : ''; ?>" readonly>
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