<!--
    Kreirati osnovnu kontak formu (kao na slikama), a nakon toga obraditi je kroz PHP
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontakt forma</title>
</head>
<body>
    <form action="#" method="POST">
        <label for="name" placeholder="Enter your name">Your name:</label>
        <br>
        <input type="text" name="name">
        <br>
        <label for="email" placeholder="Enter your email">Your email:</label>
        <br>
        <input type="text" name="email">
        <br>
        <label for="gender">Your gender:</label>
        <br>
        <label for="gender">Male:</label>
        <input type="radio" name="gender" value="male">
        <label for="gender">Female:</label>
        <input type="radio" name="gender" value="female">
        <br>
        <label for="message">Message:</label>
        <br>
        <textarea name="message" id="message" cols="30" rows="3"></textarea>
        <br>
        <label for="year">I am older than 13</label>
        <input type="checkbox" name="year">
        <br>
        <input type="submit" name="send" value="Send">
        <input type="submit" name="reset" value="Reset fields">
    </form>
</body>
</html>
<?php
    if (isset($_POST['send'])) {
        $name = isset($_POST['name'])?$_POST['name']:"";
        $email = isset($_POST['email'])?$_POST['email']:"";
        $gender = isset($_POST['gender'])?$_POST['gender']:"";
        $message = isset($_POST['message'])?$_POST['message']:"";
        $year = isset($_POST['year'])?true:false;

        if (empty($name)) {
            echo "<h3>Niste unijeli ime</h3>";
        }
        if (empty($email)) {
            echo "<h3>Niste unijeli email</h3>";
        }else{
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                echo "<h3>" . $email . " nije ispravna email adresa.</h3>";
            }
        }
        if (empty($message)) {
            echo "<h3>Niste unijeli poruku</h3>";
        }
        if (empty($gender)) {
            echo "<h3>Niste odabrali pol</h3>";
        }
        if (!$year) {
            echo "<h3>Mlađi od 13 godina</h3>";
        }
    }else{
        echo "<h3>Popunite sve podatke u formi</h3>";
    }
?>