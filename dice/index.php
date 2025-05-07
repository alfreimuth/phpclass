<?php
session_start();

function rollDice(): int
{
    return mt_rand(1,6);
}

// Player
$playerDice1 = rollDice();
$playerDice2 = rollDice();
$playerScore = $playerDice2 + $playerDice1;

// Computer
$computerDice1 = rollDice();
$computerDice2 = rollDice();
$computerDice3 = rollDice();
$computerScore = $computerDice3 + $computerDice2 + $computerDice1;

// Score
if ($playerScore > $computerScore) {
    $result = "You Win!";
} elseif ($playerScore < $computerScore){
    $result = "Computer Wins!";
} else {
    $result = "Tie!";
}

function getDicePicture($diceValue): string
{
    return "<img src='../img/dice{$diceValue}.png' alt='Dice'>";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dice Game</title>
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
    <div id="dice">
        <h1>Dice Game</h1>
        <div id="playerDice">
            <h2>Your score: <?php echo $playerScore; ?></h2>
            <?php echo getDicePicture($playerDice1) . getDicePicture($playerDice2); ?>
        </div>
        <div id="compDice">
            <h2>Computer's Score: <?php echo $computerScore; ?></h2>
            <?php echo getDicePicture($computerDice1) . getDicePicture($computerDice2) . getDicePicture($computerDice3); ?>
        </div>
        <h2> <?php echo $result; ?></h2>
    </div>
</main>
<footer>
    <?php include '../includes/footer.php'; ?>
</footer>

</body>
</html>

