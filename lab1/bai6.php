<?php require_once "./php/bai6.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bài 6</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-auto m-auto">
				<form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center text-uppercase fs-3">Tính năm âm lịch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                            	<td>
                                    <label class="form-label">Năm dương lịch</label>
                                </td>
                            	<td></td>
                            	<td>
                                    <label class="form-label">Năm âm lịch</label>
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                    <input type="text" class="form-control" name="namduonglich" value="<?= isset($tinhnamamlich->__namduonglich) ? $tinhnamamlich->__namduonglich : ''; ?>">
                                </td>
                            	<td>
                                    <input type="submit" value="=>" class="form-control" name="tim">
                                </td>
                            	<td>
                                    <input type="text" class="form-control" name="namamlich" value="<?= isset($tinhnamamlich->__namamlich) ? $tinhnamamlich->__namamlich : ''; ?>" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
			</div>
		</div>
	</div>
</body>
</html>