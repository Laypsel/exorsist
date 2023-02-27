<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php
        $mychoice = $_POST["choice"];
        $password = $_POST["password"];
        if ($password == $mychoice) {
            echo "result.php";
        } else {
            echo "try3.php";
        }
    ?>" method="post">
        <?php
            session_start();
            $diapazon = json_decode($_POST["diapazon"]);
            $block = json_decode ($_POST["block"]);
            array_push($block, $mychoice);
            if ($mychoice == $password) {
                echo "<p>The number is correct</p>";
                $_SESSION["result"]["isTheNumberCorrect1"] = true; //записуємо в ключ підмасива result - true, якщо вірно
            } else {
                echo "<p>Incorrect</p>";
                echo(" <label><select class='inputnumber' name='choice'>");
                if ($password >= $diapazon[0] && $password <= ($diapazon[0] + 4)) {
                    $diapazon [1] = ($diapazon[1] - 5);
                } else {
                    $diapazon [0] = ($diapazon[0] + 5);
                }
                for ($i = $diapazon [0]; $i <= $diapazon [1]; $i ++) { 
                    if ($i == $block[0] || $i == $block[1]) {
                        echo("<option disabled value='".$i."'>".$i."</option>");    
                    } else {
                        echo("<option value='".$i."'>".$i."</option>");
                    }
                }
                echo("</select></label>");
                
            }
        ?>
        <input type='hidden' name='password' value='<?= $password ?>'>
        <input type='hidden' name='diapazon' value='<?= json_encode($diapazon) ?>'>
        <input type='hidden' name='block' value='<?= json_encode ($block) ?>'>
        <?php
            if ($mychoice == $password) {
                echo "<input type='submit' value='Go to results'>";
            } else {
                echo "<input type='submit' value='Choose the number'>";
            }
        ?>
    </form>
</body>
</html>