<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thuộc Tính File</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<table width="400" cellspaing="0" cellpadding="5" border="0" bgcolor=
	"#F79F81" align="center">
		<tr bgcolor="#FE2EF7">
			<th style="text-align:center">Thuộc Tính Của tập Tin</th>
		</tr>
		<tr>
			<td style="text-align:center">
				Tập tin:
				<input type="file" name="taptin"/>
			</td>
		</tr>
		<tr>
			<td style="text-align:center">
				<input type="submit" name="taitaptin" value=" Thuộc Tính Của tập Tinh ">
			</td>
		</tr>
	</table>
</form>
<?php
    if (isset($_POST["taitaptin"]))
    {
    	$tentaptin  = $_FILES["taptin"]["name"];
    	$kieutaptin = $_FILES["taptin"]["type"];
    	$kichthuoc  = $_FILES["taptin"]["size"] / 1024;
    	echo "<div style='text-align:center'>";
    	echo "Tên file: " . $tentaptin. "<br/>";
    	echo "Loại file: " . $kieutaptin. "<br/>";
    	echo "Kích cỡ: " . number_format($kichthuoc, 2) . "kb <br/>";
    	echo "</div>";
    }

?>
</body>
</html>