<?php
class KetQuaHocTap {
    public $diemhk1;
    public $diemhk2;
    public $diemtrungbinh;
    public $ketqua;
    public $xeploai;

    public function CheckDiem() {
        if($this->diemhk1 > 0 && $this->diemhk1 <= 10 && $this->diemhk2 > 0 && $this->diemhk2 <= 10) return true;
        else return  false;
    }
    function TinhDiemTrungBinh() {
        if( $this->CheckDiem()) {
            $this->diemtrungbinh = ($this->diemhk1 + ($this->diemhk2 * 2)) / 3;
        }
    }

    function XemKetQua() {
        if($this->diemtrungbinh >= 5) return $this->ketqua = "Được lên lớp";
        return $this->ketqua = "Ở lại lớp";
    }

    function XepLoai() {
        switch ($this->diemtrungbinh) {
            case $this->diemtrungbinh > 8:
                $this->xeploai = "Giỏi";
                break;
            case $this->diemtrungbinh > 6.5:
                $this->xeploai = "Khá";
                break;
            case $this->diemtrungbinh > 5:
                $this->xeploai = "Trung bình";
                break;
            case $this->diemtrungbinh < 5:
                $this->xeploai = "Yếu";
                break;
        }
    }
}

$ketquahoctap = new KetQuaHocTap();

if (isset($_POST['xemketqua']) && isset($_POST['diemhk1']) && isset($_POST['diemhk2'])) {

    $ketquahoctap->diemhk1 = floatval($_POST['diemhk1']);
    $ketquahoctap->diemhk2 = floatval($_POST['diemhk2']);
    $ketquahoctap->TinhDiemTrungBinh();
    $ketquahoctap->XemKetQua();
    $ketquahoctap->XepLoai();
}
?>