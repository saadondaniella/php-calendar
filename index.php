<?php

$booked = [2, 6, 19, 27, 28];

function buildCalendar($bookedDays, $year, $month)
{
    $html = '<section class="calendar">';

    // 1. Ta reda på första veckodagen (1 = måndag, 7 = söndag)
    $firstWeekday = date('N', strtotime("$year-$month-01"));

    // 2. Ta reda på hur många dagar det finns i månaden
    $daysInMonth = date('t', strtotime("$year-$month-01"));

    // 3. Lägg in tomma rutor innan första dagen, om det behövs
    for ($i = 1; $i < $firstWeekday; $i++) {
        $html .= '<div class="day empty"></div>';
    }

    // 4. Lägg in dagarna 1–$daysInMonth
    for ($day = 1; $day <= $daysInMonth; $day++) {

        $classes = ['day'];

        if (in_array($day, $bookedDays)) {
            $classes[] = 'booked';
        }

        // Räkna ut vilken veckodag just den här dagen är
        $weekday = date('N', strtotime("$year-$month-$day"));
        if ($weekday == 6 || $weekday == 7) {
            $classes[] = 'weekend';
        }

        $classString = implode(' ', $classes);

        $html .= "<div class=\"$classString\">$day</div>";
    }

    $html .= '</section>';

    return $html;
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
    <!-- Exempel: januari 2025 -->
    <?= buildCalendar($booked, 2025, 11); ?>

</body>

</html>