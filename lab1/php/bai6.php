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