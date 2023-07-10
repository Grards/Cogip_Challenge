<?php 
    function dateFormat($dateToFormat){
        $string = $dateToFormat;
        $date = strtotime($string);
        $dateFormated = date('d/m/Y', $date);
        return $dateFormated;
    }
?>