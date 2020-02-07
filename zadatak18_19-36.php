<!--
Modificirati prethodni zadatak vezan za sabiranje brojeva, tako da prima POST parametre putem forme, te da ima mogućnost svih operacija (sabiranje, oduzimanje, množenje, dijeljenje)
Operandi se unose kroz input kontrole, dok se operator bira putem select kontrole
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="operand1">
        <select name="operacija">
            <option value=""></option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="operand2">
        <input type="submit" value="Izvrši operaciju" name="izvrsi">
    </form>
    <?php
        if(isset($_POST["operand1"]) && isset($_POST["operand2"])){
            if (!empty($_POST["operand1"]) && !empty($_POST["operand2"])) {
                $a = ($_POST["operand1"]);
                $b = ($_POST["operand2"]);
                $operacija = ($_POST["operacija"]);
                switch ($operacija) {
                    case '+':
                        $result = $a + $b;
                        echo "Rezultat je " . $result;
                        break;
                     case '-':
                        $result = $a - $b;
                        echo "Rezultat je " . $result;
                        break;
                    case '*':
                        $result = $a * $b;
                        echo "Rezultat je " . $result;
                        break;
                    case '/':
                        $result = $a / $b;
                        echo "Rezultat je " . $result;
                        break;
                    default:
                        echo "Niste odabrali operator";
                        break;
                }
            }
            else{
                echo "Unesite operande.";
            }
        }
    ?>
</body>
</html>
