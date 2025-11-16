<?php
// Bokade dagar
$booked = [2, 6, 19, 27, 28];

// Hämta funktionen
require 'functions.php';
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

    <!-- Visa kalendern här -->
    <?= buildCalendar(2025, 11, $booked); ?>

</body>

</html>