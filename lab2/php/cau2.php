<?php
class TachHoVaTen {
    public $__hovaten;
    public $__ho;
    public $__tendem;
    public $__ten;
    public function TachHoTen() {
        $fullname = preg_split('/\s+/', $this->__hovaten);

        $this->__ho = $fullname[array_key_first($fullname)];
        $this->__ten = $fullname[array_key_last($fullname)];

        // Loại bỏ index đầu và index cuối của mảng
        unset($fullname[array_key_first($fullname)]);
        unset($fullname[array_key_last($fullname)]);;

        // Thiết lập lại index của mảng và lấy ra tên đệm
        $this->__tendem = implode(' ', array_values($fullname));
    }
}
$tachhovaten = new TachHoVaTen();
if(isset($_POST['tachhovaten'])) {
    $tachhovaten->__hovaten = trim($_POST['hovaten']);
    $tachhovaten->TachHoTen();
}
?>