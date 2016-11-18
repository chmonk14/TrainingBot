<?php
/**
 * Created by PhpStorm.
 * User: Ideapad
 * Date: 18-Nov-16
 * Time: 11:20 PM
 */


function isLightOn (){

    $replyStr = "Yes, Light is on";

    return $replyStr;
}

function isEquation (){

    $mixed = "100 + 10?";
    $letters=array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V','W', 'X', 'Y', 'Z','?','=');
    $only_numbers=str_replace($letters, '', $mixed);

    echo "$only_numbers <br>";

    if(empty($only_numbers))return false;
    else return true;
//    $only_numbers = eval('return '.$only_numbers.';');
//
//    echo "$only_numbers <br>";


}