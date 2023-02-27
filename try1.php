<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="try2.php" method="post">
        <?php
            session_start();
            $block = [];
            $mychoice = json_decode($_POST["choice"]);
            $password = $_POST["password"];
            $diapazon = [];
            $result = [
                "isTheRangeCorrect" => false, // перевірка чи відгаданий діапазон
                "isTheNumberCorrect1" => false,
                "isTheNumberCorrect2" => false,
            ];
            echo(" <label><select class='inputnumber' name='choice'>");
            for ($i = 1, $j = 10; $i <= 100; $i += 10, $j += 10) { 
                if ($password >= $i && $password <= $j) {
                    $diapazon = [$i,$j];// вірний діапазон для числа загаданного компом , в діапазоні два числааааааааа.
                    for ($f = $i; $f <= $j; $f++) {
                        echo "<option value='".$f."'>".$f."</option>";
                    }
                } else {
                    echo "<p>You are correct</p>";
                }
            }
            echo("</select></label>");
            if ($diapazon[0] == $mychoice[0] && $diapazon[1] == $mychoice[1]) {
                echo "<p>The range is correct</p>";
                $result["isTheRangeCorrect"] = true;
            } else {
                echo "<p>Incorrect</p>";
            }
            
            $_SESSION["result"] = $result;
        ?>
        <input type='hidden' name='password' value='<?= $password ?>'>
        <input type='hidden' name='diapazon' value='<?= json_encode($diapazon) ?>'>
        <input type='hidden' name='block' value='<?= json_encode ($block) ?>'>
        <input type='submit' value='Choose the number'>
    </form>
</body>
</html>