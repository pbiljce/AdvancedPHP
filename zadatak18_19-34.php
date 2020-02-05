<?php
/**
 * Kreirati aplikaciju koja će na osnovu korisničkog unosa izvršiti sabiranje dva broja.
 * Aplikacija radi na način da ako u address bar unesete dva broja, ona će ih sabrati.
 * Ako se ne unese ništa, stranica je potpuno prazna.
 */
    if(isset($_GET["a"]) && isset($_GET["b"])){
        if(!empty($_GET["a"]) && !empty($_GET["b"])){
            $a = $_GET["a"];
            $b = $_GET["b"];
            $result = $a + $b;
            echo "Rezultat je " . $result;
        }
        else{
            echo "Nisu unesene vrijednosti za a i b";
        }
    }
    else{
        echo "Pogresan parametar";
    }
?>
