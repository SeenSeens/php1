<?php
class TimKiemChuoi {
    public $__chuoi;
    public $__tuCantim;
    public $__ketQua;

    public function __construct($chuoi, $tuCanTim) {
        $this->__chuoi = $chuoi;
        $this->__tuCantim = $tuCanTim;
        $this->__ketQua = $this->TimTuTrongChuoi($chuoi, $tuCanTim);
    }

    public function TimTuTrongChuoi($chuoi, $tuCanTim) {
        if (preg_match("/\b$tuCanTim\b/i", $chuoi, $matches, PREG_OFFSET_CAPTURE)) {
            $viTri = $matches[0][1];
            return "Tìm thấy từ '$tuCanTim' tại vị trí $viTri trong chuỗi.";
        } else {
            return "Không tìm thấy từ '$tuCanTim' trong chuỗi.";
        }
    }
}

if(isset($_POST['timkiem'])) {
    $chuoi = trim($_POST['chuoi']);
    $tucantim = trim($_POST['tucantim']);
    $timkiemchuoi = new TimKiemChuoi($chuoi, $tucantim);
    $ketQua = $timkiemchuoi->__ketQua;
}
?>