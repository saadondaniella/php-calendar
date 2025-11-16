<?php

function buildCalendar($year, $month, $bookedDays)
{
    $todayYear  = date('Y');
    $todayMonth = date('n');
    $todayDay   = date('j');

    // Svenska månader
    $swedishMonths = [
        1 => "Januari",
        2 => "Februari",
        3 => "Mars",
        4 => "April",
        5 => "Maj",
        6 => "Juni",
        7 => "Juli",
        8 => "Augusti",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "December"
    ];

    $monthName = $swedishMonths[$month];

    // Antal dagar i månaden
    $daysInMonth = date("t", strtotime("$year-$month-01"));

    // Vilken veckodag 1:a är (1 = mån, 7 = sön)
    $firstWeekday = date("N", strtotime("$year-$month-01"));

    // Rubrik
    $html = "<h2 class='month-title'>$monthName $year</h2>";

    // Svenska veckodagar
    $weekdays = ["Mån", "Tis", "Ons", "Tors", "Fre", "Lör", "Sön"];

    // Veckodagsrad
    $html .= "<div class='weekdays'>";
    foreach ($weekdays as $weekdayName) {
        $html .= "<div class='weekday'>$weekdayName</div>";
    }
    $html .= "</div>";

    // Start på kalendern
    $html .= '<section class="calendar">';

    // Tomma rutor
    for ($i = 1; $i < $firstWeekday; $i++) {
        $html .= '<div class="day empty"></div>';
    }

    // Alla dagar i månaden
    for ($day = 1; $day <= $daysInMonth; $day++) {

        $classes = ['day'];

        if (in_array($day, $bookedDays)) {
            $classes[] = 'booked';
        }

        $weekday = date('N', strtotime("$year-$month-$day"));
        if ($weekday == 6 || $weekday == 7) {
            $classes[] = 'weekend';
        }
        if ($year == $todayYear && $month == $todayMonth && $day == $todayDay) {
            $classes[] = 'today';
        }

        $classString = implode(' ', $classes);

        $html .= "<div class=\"$classString\">$day</div>";
    }

    $html .= '</section>';

    return $html;
}
