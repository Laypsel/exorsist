<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <form action="index.php" method="post">
        <?php
            session_start();
            $password = $_POST["password"];
            if (isset($_POST["choice"])) {
                $mychoice = $_POST["choice"];
            }
            if ($_SESSION["result"]["isTheRangeCorrect"] && $_SESSION["result"]["isTheNumberCorrect1"]) {
                echo("<p>You are master exorsist!</p>");
            } else if ($_SESSION["result"]["isTheRangeCorrect"] && $_SESSION["result"]["isTheNumberCorrect2"]) {
                echo("<p>You are great exorsist!</p>");
            } else if ($_SESSION["result"]["isTheNumberCorrect1"] || $_SESSION["result"]["isTheRangeCorrect"]) {
                echo("<p>Good job</p>");
            } else if ($_SESSION["result"]["isTheNumberCorrect2"]) {
                echo("<p>Not bad</p>");
            } else if ($mychoice == $password) {
                echo("<p>Try better</p>");
            } else {
                echo("<p>You were wrong all the time!</p>");
                echo "<p>The correct number was $password</p>";
            }

        ?>
        <input type='hidden' name='password' value='<?= $password ?>'>
        <input type='submit' value='Start again'>
    </form>
</body>
</html>