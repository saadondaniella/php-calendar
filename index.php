<?php
// Bokade dagar
$booked = [2, 6, 19, 27, 28];

// Hämta funktionen
require 'functions.php';

$year = isset($_GET['year']) ? (int) $_GET['year'] : (int) date('Y');
$month = isset($_GET['month']) ? (int) $_GET['month'] : (int) date('n');

// Räkna ut föregående månad
$prevYear = $year;
$prevMonth = $month - 1;
if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}

// Räkna ut nästa månad
$nextYear = $year;
$nextMonth = $month + 1;
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="calendar-wrapper">

        <div class="calendar-nav">
            <a href="?year=<?= $prevYear; ?>&month=<?= $prevMonth; ?>" class="prev">&laquo; Föregående</a>
            <a href="?year=<?= $nextYear; ?>&month=<?= $nextMonth; ?>" class="next">Nästa &raquo;</a>
        </div>

        <!-- kalendern -->
        <?= buildCalendar($year, $month, $booked); ?>

    </div>

</body>

</html>