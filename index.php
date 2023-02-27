<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exorsist</title>
</head>
<body>
    <form action="try1.php" method="post">
        <label>
            <select class='inputnumber' name='choice'>
                <?php
                    $var = [];
                    for ($i = 1, $j = 10, $f = 0; $i <= 100; $i += 10, $j += 10, $f++) {
                        $var[] = [];
                        array_push($var[$f],$i,$j);
                        echo "<option value='".json_encode($var [$f])."'>".json_encode($var [$f])."</option>";
                    }
                    ?>
            </select>
        </label>
        <input type='hidden' name='password' value='<?= $password  = rand(1,100) ?>'>
        <input type='submit' value='Choose the number'>
    </form>
</body>
</html>