<?php
function getFirstAndLastDayOfMonth($date) {
    $dateTime = new DateTime($date);

    // Lấy thông tin năm và tháng từ đối tượng DateTime
    $year = $dateTime->format('Y');
    $month = $dateTime->format('m');

    // Tạo ngày đầu tiên của tháng
    $firstDay = new DateTime("$year-$month-01");

    if( $month === 12 ) :
        $nextMonth = 1;
        $nextYear = $year + 1;
    else :
        $nextMonth = $month + 1;
        $nextYear = $year;
    endif;

    $lastDay = new DateTime("$nextYear-$nextMonth-01");
    $lastDay->modify('-1 day'); // Trừ đi một ngày để có ngày cuối cùng của tháng hiện tại

    return [ 'first_day' =>  $firstDay->format('Y-m-d'), 'last_day' => $lastDay->format('Y-m-d') ];
}

if( isset($_POST['submt']) ) :
    if( !empty($_POST['txt'])) :
        $date = trim( $_POST['txt'] );
        $result = getFirstAndLastDayOfMonth($date);
        echo "Ngày đầu tiên của tháng: " . $result['first_day'] . "<br>";
        echo "Ngày cuối cùng của tháng: " . $result['last_day'] . "<br>";
    endif;
endif;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 11</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-auto m-auto">
                <form action="" method="POST">
                    <input type="text" name="txt" class="form-control">
                    <input type="submit" name="submt" value="Lấy ngày đầu tiên và ngày cuối cùng của tháng" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

