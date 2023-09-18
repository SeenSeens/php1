<?php
class TimNamNhuan {
    public $__Year;
    public array $__ArrayYear = [];
    /**
     * Kiểm tra năm nhuận
     */
    public function KiemTraNamNhuan($year): bool {
        return (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0);
    }

    /**
     * Thêm năm nhuận vào mảng
     */
    public function InNamNhuan() {
        foreach (range(2000, $this->__Year) as $year)
            if ($this->KiemTraNamNhuan($year))
                $this->__ArrayYear[] = $year;
        return $this->__ArrayYear;
    }
}
?>