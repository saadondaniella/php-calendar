<?php

function buildCalendar($year, $month, $bookedDays)
{
    // Svenska månadsnamn
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

    // Vilken veckodag den 1:a ligger på
    $firstWeekday = date("N", strtotime("$year-$month-01"));

    // Rubrik + start på kalendern
    $html = "<h2 class='month-title'>$monthName $year</h2>";
    $html .= '<section class="calendar">';

    // Tomma rutor innan första dagen
    for ($i = 1; $i < $firstWeekday; $i++) {
        $html .= '<div class="day empty"></div>';
    }

    // Dagar i månaden
    for ($day = 1; $day <= $daysInMonth; $day++) {

        $classes = ['day'];

        if (in_array($day, $bookedDays)) {
            $classes[] = 'booked';
        }

        $weekday = date('N', strtotime("$year-$month-$day"));
        if ($weekday == 6 || $weekday == 7) {
            $classes[] = 'weekend';
        }

        $classString = implode(' ', $classes);

        $html .= "<div class=\"$classString\">$day</div>";
    }

    $html .= ' </section>';

    return $html;
}
