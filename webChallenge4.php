<?php
    /**
     * ZADATAK - Instanciranje klase
     * Na osnovu prethodno kreirane klase (DateDifference) napraviti instanciranje same klase u jedan objekat.
     */

    class DateDifference{
        public $date1 = "25.03.1980";
        public $date2 = "01.01.2020";
        public $format = "months";
    }

    $d1 = new DateDifference();
    var_dump($d1);
?>