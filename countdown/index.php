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
$years = floow($seconds/$secPerYear);
$seconds = seconds - ($years * $secPerYear);

// Days
$days = floor($seconds/$secPerDay);
$seconds = $seconds / $secPerDay;

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
        <h1><?=$seconds?></h1>
    </main>
    <footer>
        <?php include '../includes/footer.php'; ?>
    </footer>

</body>
</html>

