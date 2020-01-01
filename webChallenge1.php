<?php
    /**
     * ZADATAK - funkcija, razlika između dva datuma
     * Kreirati funkciju koja izračunava razliku između dva proslijeđena datuma.
     * Ako je drugi datum neproslijeđen, uzimamo trenutni datum.
     * Treći parametar iskoristiti za željeni ispis, odnosno da li će razlika biti ispisana u danima, mjesecima i godinama, ili u nekoj drugoj kombinaciji
     */
    function dateDifference($date1,$date2,$format){
        if(empty($date2)){
            $date2 = Date("d.m.Y");
        }

        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);

        $dateDiff = $date1 -> diff($date2); //https://www.php.net/manual/en/datetime.diff.php (PROPERTIES - y-number of years, m-number of months, d-number of days, h-number of hours, i--number of minutes, s-number of seconds, days-If the DateInterval object was created by DateTime::diff() then this is the total number of days between the start and end dates. Otherwise, days will be FALSE
        $difference = $dateDiff -> days;
        $differenceYears = $dateDiff -> y;
        $differenceMonths = $dateDiff -> m + $differenceYears * 12;

        switch($format){
            case "days":
                echo "Ukupna razlika je " . $difference . " dana.";
            break;
            case "months":
                echo "Razlika u mjesecima je " . $differenceMonths . " mjeseci.";
            break;
            case "years":
                echo "Razlika u godinama je " . $differenceYears . " godina.";
            break;
            default;
                echo $dateDiff -> format('Razlika je %d dana %m mjeseci i %y godina');
            break;
        }
    }

    dateDifference("10.10.1950","12.12.2012","");
?>
