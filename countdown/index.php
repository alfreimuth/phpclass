<?php
// Variables
$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay =  24 * $secPerHour;
$secPerYear = 365 * $secPerDay;

// Current Time
$now = time();

// Time of semester end
$endOfSchoolSemester = mktime(12, 0, 0, 5, 17, 2025);

// Total number of seconds between now and end of semester
$seconds = $endOfSchoolSemester - $now;

// Years
$years = floor($seconds/$secPerYear);
$seconds = $seconds - ($years / $secPerYear);

// Days
$days = floor($seconds/$secPerDay);
$seconds = $seconds - ( $seconds/$secPerDay);

// Hours
$hours = floor($seconds/$secPerHour);
$seconds = $seconds - ($seconds/$secPerHour);

// Minutes
$minutes = floor($seconds/$secPerMin);
$seconds = $seconds - ($seconds/$secPerMin);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Countdown</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>
    <header>
        <?php include '../includes/header.php'; ?>
    </header>
    <nav>
        <?php include '../includes/nav.php'; ?>
    </nav>
    <main>
        <h1><?=$days?> days</h1>
        <h2><?=$hours?> hours</h2>
        <h3><?=$minutes?> minutes</h3>
        <h4><?=$seconds?> seconds</h4>
        <h5>Today is <?=date('Y-m-d'); ?></h5>
    </main>
    <footer>
        <?php include '../includes/footer.php'; ?>
    </footer>

</body>
</html>

