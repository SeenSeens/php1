<?php
class SoSanhChuoi {
    public $__chuoithunhat;
    public $__chuoithuhai;
    public $__sosanh;
    public function SoSanh() {
        $kq = strcasecmp($this->__chuoithunhat, $this->__chuoithuhai);
        if($kq === 0 ) return $this->__sosanh = "Hai chuỗi giống nhau";
        if($kq > 0) return $this->__sosanh = "Chuỗi thứ nhất dài hơn chuỗi thứ 2";
        if($kq < 0) return $this->__sosanh = "Chuỗi thứ nhất ngắn hơn chuỗi thứ 2";
    }

}
$soanhchuoi = new SoSanhChuoi();

if(isset($_POST['sosanh']) && isset($_POST['chuoithunhat']) && isset($_POST['chuoithuhai'])) {
    $soanhchuoi->__chuoithunhat = $_POST['chuoithunhat'];
    $soanhchuoi->__chuoithuhai = $_POST['chuoithuhai'];
    $soanhchuoi->SoSanh();
}
?>