<!--
    Kreirati aplikaciju koja će na osnovu korisničkog unosa iz niza timova prikazivati njihove fudbalere (a može i nešto slično, poput specifikacije mobilnih telefona, itd.)
    Važno je za aplikaciju da korisnik mora odabrati ovaj tim klikom na njegov link
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telefoni</title>
</head>
<body>
    <ul>
        <li><a href="zadatak18_19-35.php?id=1">Samsung</a></li>
        <li><a href="zadatak18_19-35.php?id=2">Xiaomi</a></li>
        <li><a href="zadatak18_19-35.php?id=3">Huawei</a></li>
    </ul>
    <?php
        $samsung = array("Samsung Galaxy A71", "Samsung Galaxy A51", "Samsung Galaxy Note 10", "Samsung Galaxy A10");
        $xiaomi = array("Xiaomi Redmi Note 8", "Xiaomi Redmi 8", "Xiaomi MI 9 Lite");
        $huawei = array("Huawei Honor 7S", "Huawei Honor 7C", "Huawei Mate 10 Lite", "Huawei Honor 10");

        if(isset($_GET["id"])){
            switch ($_GET["id"]) {
                case '1':
                    foreach ($samsung as $phone) {
                        echo $phone . "<br>";
                    }
                    break;   
                case '2':
                    foreach ($xiaomi as $phone) {
                        echo $phone . "<br>";
                    }
                    break;     
                case '3':
                    foreach ($huawei as $phone) {
                        echo $phone . "<br>";
                    }
                    break;            
                default:
                    break;
            }
        }
    ?>
</body>
</html>
