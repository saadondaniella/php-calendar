<?php

function buildCalendar($year, $month, $bookedDays)
{
    // Antal dagar i månaden
    $daysInMonth = date("t", strtotime("$year-$month-01"));

    // Vilken veckodag första dagen ligger på (1 = måndag, 7 = söndag)
    $firstWeekday = date("N", strtotime("$year-$month-01"));

    $html = '<section class="calendar">';

    // Lägg till tomma rutor om månaden inte börjar på måndag
    for ($i = 1; $i < $firstWeekday; $i++) {
        $html .= '<div class="day empty"></div>';
    }

    // Riktiga dagar
    for ($day = 1; $day <= $daysInMonth; $day++) {

        $classes = ['day'];

        // Bokad
        if (in_array($day, $bookedDays)) {
            $classes[] = 'booked';
        }

        // Helg
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
