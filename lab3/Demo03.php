<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng Ký Phòng</title>
</head>
<body>
<form action="" method="get">
	<table width="400" cellspaing="0" cellpadding="5" border="0" bgcolor=
	"#F79F81" align="center">
		<tr bgcolor="#FE2EF7">
			<th style="text-align:center">ĐĂNG KÝ PHÒNG</th>
		</tr>
		<tr>
			<td style="text-align:center">
				Phòng Số :
				<select name="phong">
					<option value="A001">A001</option>
					<option value="A002">A002</option>
					<option value="A003">A003</option>
					<option value="Hội trường A">Hội trường A</option>
					<option value="Hội trường B">Hội trường B</option>
				</select>
			</td>
		</tr>
		<tr>
			<td style="text-align:center">
				Giáo sư giảng dạy:
				<input type="text" name="giangvien" value="">
			</td>
		</tr>
		<tr>
			<td style="text-align:center">
				Giáo sư giảng dạy:
				<input type="text" name="giangvien" value="">
			</td>
		</tr>
		<tr>
			<td style="text-align:center">
				Giáo sư giảng dạy:
				<input type="text" name="giangvien" value="">
			</td>
			<td style="text-align:center">
				Giáo sư giảng dạy:
				<input type="text" name="giangvien" value="">
			</td>
		</tr>
		<tr>
			<td style="text-align:center">
				Ngày/Tháng/Năm
				<select name="ngay">
				<?php
list($gio, $phut, $giay, $thang, $ngay, $nam) = explode(":",date("h:i:s:m:d:Y"));
					for($i=0; $i<14; $i++)
					{
$timestamp = mktime($gio,$phut, $giay,$thang,$ngay+$i,$nam);
						
						$date = date("d/m/Y", $timestamp);
						
						echo "<option value='$date'>$date</option>";
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="text-align:center">
				<input type="submit" name="ghinhan" value=" Ghi Nhận ">
			</td>
		</tr>
	</table>
</form>
<?php
    if (isset($_REQUEST["ghinhan"]))
    {
	    $phong = $_REQUEST["phong"];
	    $gv    = $_REQUEST["giangvien"];
	    $ngay  = $_REQUEST["ngay"];

	    echo '<table width="400" cellspaing="0" cellpadding="5" border="0" bgcolor="#F79F81" align="center">';
	    echo "<tr><td style='text-align:center'>";
	    echo "Ngày " . $ngay . "<br/>";
	    echo "Giáo sư " . $gv . " Sẽ dạy tại phòng ".$phong;
		echo "</td></tr></table>";
    }
?>
</body>
</html>