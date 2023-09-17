
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="GET">
		<label>Nhập hệ số A</label>
		<input type="number" name="heSoA">
		<label>Nhập hệ số B</label>
		<input type="number" name="heSoB">
		<button name="Tính">Tính</button>
	</form>
	<?php
	$x="";
	if(isset($_GET['heSoA']) && isset($_GET['heSoB'])) {
		$a = $_GET['heSoA'];
		$b = $_GET['heSoB'];
		if($a === "") {
			echo "bạn chưa nhập giá trị a";
			exit();
		}
		if($b === ""){
			echo 'Bạn chưa nhập giá trị b';
			exit();
		} 
		if($a == 0) {
			if($b == 0) {
				$x = 'Phương trình vô số nghiêm';
			} else {
				$x =  'Phương trình vô nghiệm';
			}
		} else {
			$x = -$b/$a;
		}
	}
	?>
	<p style="font-weight: bold;">= <?= $x; ?></p>
</body>
</html>
