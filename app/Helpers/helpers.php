<?php

function transformDateToInputDate($date){
    $date = explode('-', $date);
    $date = array_reverse($date);
    $temp = $date[1];
    $date[1] = $date[2];
    $date[2] = $temp;
    $date = implode('-', $date);
    return $date;
}

function getDateFromDateTime($datetime){
    return explode(" ", $datetime)[0];
}