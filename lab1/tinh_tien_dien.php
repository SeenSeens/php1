<?php
class tinh_tien_dien {
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
//    public function Reset() {
//        $this->setTenChuHo("");
//    }
}