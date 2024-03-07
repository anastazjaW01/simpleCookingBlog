<?php

//function that generate 6 digit code 
function generateSixDigitCode(){
    $code = "";
    $codeLength = 6;
    $digits = "0123456789";
    $digitsLength = strlen($digits);

    for($i = 0; $i < $codeLength; $i++){
        $index = crypto_rand_secure(0, $digitsLength - 1);
        $code .= $digits[$index];
    }

    return $code;
}

$sixDigitCode = generateSixDigitCode();

function crypto_rand_secure($min, $max){
    $range = $max - $min;
    if($range < 0) return $min;

    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1;
    $bits = (int) $log + 1;
    $filter = (int) (1 << $bits) - 1;

    do{
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
    }while($rnd >= $range);

    return $min + $rnd;
}





