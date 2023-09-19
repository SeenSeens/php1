<?php
$noidung = "";
$maunen = "";
$mauchu = "";
// Khung input
function checkEmpty() {
    if( !empty($_POST['noidung']) && !empty($_POST['maunen']) && !empty($_POST['mauchu'])) :
        echo "Chua nhập dữ liệu";
    endif;
    return true;
}
// Check type color
function checkTypeColor() {

}
if(isset($_POST['xemketqua'])) :
    if( checkEmpty()) :
        $noidung = $_POST['noidung'];
        $maunen = $_POST['maunen'];
        $mauchu = $_POST['mauchu'];
    endif;
endif;
?>