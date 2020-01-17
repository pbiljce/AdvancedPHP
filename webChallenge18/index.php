<?php
    /**Klasu o automobilima smjestit u namespace, te napraviti strukturu koja odgovara namespace-u (PSR-4)
     * Kreirati autoloader i registrovati ga (kao u ranijim primjerima) te testirati na našoj klasi o automobilima */
    require "autoloader.php";
    
    $automobil = new Automobil\Automobil("Suzuki","Jimny","4","plava","5","66");
    echo $automobil;
    echo "<br>";
    Automobil\Automobil::mjerneJedinice();
    echo "<br>";
?>