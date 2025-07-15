<?php
session_start();

// បង្កើតលេខចៃដន្យ (១ដងនៅពេលដំបូង)
if (!isset($_SESSION['number'])) {
    $_SESSION['number'] = rand(1, 100);
    $_SESSION['tries'] = 0;
    $_SESSION['message'] = '';
}

// Reset game
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Function to check guess
function checkGuess($guess, $number) {
    if ($guess < $number) return "Too low!";
    elseif ($guess > $number) return "Too high!";
    else return "Correct!";
}

// ប処理ការទាយ
if (isset($_POST['guess'])) {
    $guess = intval($_POST['guess']);
    $_SESSION['tries']++;

    if ($guess == $_SESSION['number']) {
        $score = max(100 - ($_SESSION['tries'] - 1) * 10, 0);
        $_SESSION['message'] = "Congratulations! You guessed correctly in {$_SESSION['tries']} tries. Your score: $score";
    } else {
        $_SESSION['message'] = checkGuess($guess, $_SESSION['number']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guessing Game</title>
</head>
<body>
    <h2>Number Guessing Game</h2>
    <p>Guess a number between 1 and 100</p>

    <?php if ($_SESSION['message'] === "Correct!"): ?>
        <p style="color: green; font-weight: bold;"><?= $_SESSION['message'] ?></p>
        <form method="post">
            <input type="submit" name="reset" value="Play Again">
        </form>
    <?php else: ?>
        <form method="post">
            <input type="number" name="guess" min="1" max="100" required>
            <input type="submit" value="Guess">
        </form>
        <p style="color: blue"><?= $_SESSION['message'] ?></p>
        <p>Attempts: <?= $_SESSION['tries'] ?></p>
    <?php endif; ?>
</body>
</html>