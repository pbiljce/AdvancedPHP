<?php
/**
 * Klasu o automobilima preraditi na način da implementira interfejse:
 * iVrata (openDoor($side); closeDoor($side); fixDoor($side);)
 * iMotor(startEngine(); shutdownEngine(); fixEngine();)
 * iVoznja(go(); stop(); break();)
 * Apstraktna klasa treba da implementira interfejse, te metode popisane unutar njih
 * Nakon toga naslijediti apstraktnu klasu i doraditi metode do samoga kraja unutar naše klase o automobilima (ostaviti konstruktor, destruktor, toString(), getter, setter, render(), …)
 */
    require "autoloader.php";
    
    $automobil = new Automobil\Automobil("Suzuki","Jimny","4","plava","5","66");
    echo $automobil;
    echo "<br>";
    Automobil\Automobil::mjerneJedinice();
    echo "<br>";
    $automobil->closeDoor("Lijeva");
    echo "<br>";
    $automobil->go();
    echo "<br>";
?>
