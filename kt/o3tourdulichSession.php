<?php
  session_start();
  // session_unset();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
  // ----------------------phần làm selectchon------------------------
    $mangtour = array('Thái Lan' => 5000000, 'Singapore' => 8000000, 'Hàn quốc' => 14000000, 'Đài Loan' => 7000000);
    $manghinh = array('Thái Lan' => 'https://baothainguyen.vn/file/oldimage/baothainguyen/UserFiles/image/d1(21).jpg', 'Singapore' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLuphl8Bg_0Yl2Qe5FFoHWDEGQG8aZ5XJbQPCU0Q_kTA&s', 'Hàn quốc' => 'hanquoc.jpg', 'Đài Loan' => 'dailoan.jpg');
    $tien = 0;
    $hinh = "";
  // ----------------------------------------------
  // -----------------------lấy giá trị name-----------------------
  $tour = '';
  $ngay = '';
  // tất cả trong input đều là chuỗi nên phải đổi thành value
  $soluong = 0;
  $tenkhach = '';
  $diachi = '';
  $dienthoai = '';
  $thanhtien = 0;
  if(isset($_POST['submit'])) {
    $tour = $_POST['tour'];
    $ngay = $_POST['ngay'];
    // tất cả trong input đều là string nên phải đổi thành từ number thành string
    $soluong = intval($_POST['soluong']);
    $tenkhach = $_POST['tenkhach'];
    $diachi = $_POST['diachi'];
    $dienthoai = $_POST['dienthoai'];
  }
  // ----------------------------------------------
  ?>
<form action="o3tourdulichSession.php" method="post" name="form1" id="form1">
  <table width="600" border="0" align="center" cellpadding="1" cellspacing="1">
    <tbody>
      <tr>
        <td colspan="2" align="center" bgcolor="#17335A" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; color: #F5E6E7; font-weight: bold;">ĐĂNG KÝ TOUR DU LỊCH</td>
      </tr>
      <tr>
        <td width="173" bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">Tên tour</td>
        <td width="420" bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">
        <select name="tour" id="tour">
          <?php
            $sectionChon = "";
            if(isset($_POST['tour'])) {
              $sectionChon = $_POST['tour'];
              // lấy ra hình
              foreach($mangtour as $key => $value) {
                if($sectionChon == $key) {
                  $tien = $value;
                }
              }
              foreach($manghinh as $key => $value) {
                if($sectionChon == $key) {
                  $hinh = $value;
                }
              }
            }
            foreach($mangtour as $key => $value) :
          ?>
          <option value="<?php echo $key;?>">
            <?php echo $key;?>
          </option>
          <?php endforeach;?>
        </select></td>
      </tr>
      <tr>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">Ngày khởi hành:</td>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><input type="text" name="ngay" id="ngay" value="<?php echo $ngay;?>"></td>
      </tr>
      
      <tr>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">Số lượng đăng ký:</td>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><input type="text" name="soluong" id="soluong"></td>
      </tr>
      <tr>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">Tên khách hàng:</td>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><input type="text" name="tenkhach" id="tenkhach"></td>
      </tr>
      <tr>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">Liên hệ theo địa chỉ:</td>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><input type="text" name="diachi" id="diachi"></td>
      </tr>
      <tr>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">Số điện thoại</td>
        <td bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><input type="text" name="dienthoai" id="dienthoai"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">Hiển thị hình:</td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#A8C8F5" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">
		<img src="<?php echo $hinh;?>" alt="Girl in a jacket" width="280" height="80">
		</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Đăng Ký Tour"></td>
      </tr>
    </tbody>
  </table>
</form>
<table class="table" align="center" cellspacing="0" border="1">
        <tr>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tour</th>
            <th>Giá</th>
            <th>số khách</th>
            <th>Thành tiền</th>
            <th>Hình</th>
        </tr>
        <!-- khúc này nếu không đổi số lượng về kiểu string thì nó sẽ báo lỗi nên chúng ta đã dùng inval ở số lượng -->
        <?php 
          $thanhtien = $soluong * $tien;
          // tạo đối tượng
          $item = [
            'tenkh' => $tenkhach,
            'diachi' => $diachi,
            'sodth' => $dienthoai,
            'tour' => $tour,
            'gia' => $tien,
            'sokhach' => $soluong,
            'thanhtien' => $thanhtien,
            'hinh' => $hinh
          ];
          $_SESSION['khachhang'][] = $item;
          if(isset($_SESSION['khachhang'])) :
          foreach($_SESSION['khachhang'] as $key => $value) :
        ?>
        <tr>
          <td><?php echo $value['tenkh'];?></td>
          <td><?php echo $value['diachi'];?></td>
          <td><?php echo $value['sodth'];?></td>
          <td><?php echo $value['tour'];?></td>
          <td><?php echo $value['gia'];?></td>
          <td><?php echo $value['sokhach'];?></td>
          <td><?php echo $value['thanhtien'];?></td>
          <td>
          <img src="<?php echo $value['hinh'];?>" alt="Girl in a jacket" width="50" height="50">
          </td>
        </tr>
        <?php 
          endforeach;
          endif;
        ?>
    </table>
</body>
</html>