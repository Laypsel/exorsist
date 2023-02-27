<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="result.php" method="post">
        <?php
            session_start();
            $mychoice = $_POST["choice"];
            $password = $_POST["password"];
            $diapazon = json_decode($_POST["diapazon"]);
            $block = json_decode ($_POST["block"]);
            array_push($block, $mychoice);
            if ($mychoice == $password) {
                echo "<p>The number is correct</p>";
                $_SESSION["result"]["isTheNumberCorrect2"] = true; 
            } else {
                echo "<p>Incorrect</p>";
                echo(" <label><select class='inputnumber' name='choice'>");
                for ($i = $diapazon [0]; $i <= $diapazon [1]; $i ++) { 
                    if ($i == $block[0] || $i == $block[1]) {
                        echo("<option disabled value='".$i."'>".$i."</option>");    
                    } else {
                        echo("<option value='".$i."'>".$i."</option>");
                    }
                }
                echo("</select></label>");
                if ($mychoice > $password) {
                    echo "<p>Look lower than $mychoice</p>";
                } else {
                    echo "<p>Look higher than $mychoice</p>";
                }
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