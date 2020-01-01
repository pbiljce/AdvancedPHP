<?php
    /**
     * ZADATAK - Klasa, promjena vrijednosti
     * Prethodno kreiranu klasu instancirati dva puta (u dva objekta).
     * Prije instanciranja drugog objekta klasi promijeniti vrijednosti oba datuma.
     * Nakon toga uraditi var_dump() oba objekta da vidimo šta se desilo
     */

    class DateDifference{
        public $date1 = "25.03.1980";
        public $date2 = "01.01.2020";
        public $format = "months";
    }

    $d1 =  new DateDifference();
    $d1 -> date1 = "26.03.1980";
    $d1 -> date2 = "02.01.2020";
    $d2 =  new DateDifference();

    var_dump($d1);
    var_dump($d2);
?>
