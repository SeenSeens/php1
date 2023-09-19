<?php
class TinhTienDien {
    private $tenchuho;
    private $chisocu;
    private $chisomoi;
    private $dongia;

    public function setTenChuHo($tenchuho) {
        $this->tenchuho = $tenchuho;
    }
    public function getTenChuHo() {
        return $this->tenchuho;
    }
    public function setChiSoCu($chisocu) {
        $this->chisocu = $chisocu;
    }
    public function getChiSoCu() {
        return$this->chisocu;
    }
    public function setChiSoMoi($chisomoi) {
        $this->chisomoi = $chisomoi;
    }
    public function getChiSoMoi() {
        return $this->chisomoi;
    }
    public function setDonGia($dongia) {
        $this->dongia = $dongia;
    }
    public function getDonGia() {
        return $this->dongia;
    }
    public function TinhTien() {
        return ( $this->getChiSoMoi() - $this->getChiSoCu() ) * $this->getDonGia();
    }
}

$tinhtiendien = new TinhTienDien();

if(isset($_POST['tinhtiendien']) && isset($_POST['tenchuho']) && isset($_POST['chisocu']) && isset($_POST['chisomoi']) && isset($_POST['dongia'])) {
    $tenchuho = $_POST['tenchuho'];
    $chisocu = floatval($_POST['chisocu']);
    $chisomoi = floatval($_POST['chisomoi']);
    $dongia = floatval($_POST['dongia']);

    $tinhtiendien->setTenChuHo($tenchuho);
    $tinhtiendien->setChiSoCu($chisocu);
    $tinhtiendien->setChiSoMoi($chisomoi);
    $tinhtiendien->setDonGia($dongia);

    $tinhtiendien->TinhTien();
}