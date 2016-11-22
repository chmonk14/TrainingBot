<?php
/**
 * Created by PhpStorm.
 * User: Ideapad
 * Date: 18-Nov-16
 * Time: 11:20 PM
 */


function isLightOn (){

    $url = "mysql://nizsshzp1ukftvyw:vn7ew1j2gc9od9ry@sulnwdk5uwjw1r2k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/ngv6y5a1x2oslw5x";
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

// Create connection
    $conn = new mysqli($hostname, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connection was successfully established!";

    $checkQ = "SELECT state FROM Accessory WHERE accID=1";

    $result = mysqli_query($conn,$checkQ);
    $replyStr = " ".$result;
    $row_count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


    if($row_count == 1){

        if($row['state']){
            $replyStr = "Light is on";
        }else{
            $replyStr = "Light is off";
        }

    }else{
        $replyStr = "Can't found in database";

    }


    echo $replyStr;
    return $replyStr;
}

function isEquation ($receivedStr){

    $mixed = $receivedStr;//"100 + 10?";
    $letters=array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V','W', 'X', 'Y', 'Z','?','=');
    $only_numbers=str_replace($letters, '', $mixed);

    echo "$only_numbers <br>";

    if(ctype_space($only_numbers) || empty($only_numbers))return false;
    else return [true, eval('return '.$only_numbers.';')];

}

echo isLightOn();
