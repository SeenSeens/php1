<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đọc Báo</title>
</head>
<body>
<form action="" method="post">
	<table width="400" cellspaing="0" cellpadding="5" border="0" bgcolor=
	"#F79F81" align="center">
		<tr bgcolor="#FE2EF7">
			<th style="text-align:center">ĐỌC BÁO TRÊN MẠNG</th>
		</tr>
		<tr>
			<td style="text-align:center">
				Chọn báo muốn đọc :
				<select name="lienket">
					<option value="http://tuoitre.vn">Báo Tuổi trẻ</option>
					<option value="http://www.thanhnien.com.vn">Báo Thanh Niên</option>
					<option value="http://www.vnexpress.net">Việt Nam Express</option>		
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
	    $link = $_REQUEST["lienket"];
	    echo "<div style='text-align:center'>";
	    echo "<a href='$link' target='_blank'> Click here $link</a>";
		echo "</div>";
	}
?>
</body>
</html>