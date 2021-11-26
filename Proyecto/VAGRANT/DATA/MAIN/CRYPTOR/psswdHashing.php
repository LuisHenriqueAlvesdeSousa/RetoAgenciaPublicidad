<?php

use LordDashMe\Cryptor\PasswordHashing\PasswordHashing;

function encriptar($valor){

    $hashing = new PasswordHashing();
    if(!$hashing->verify($valor)){
        $hashing->algorithm(PasswordHashing::ALGO_PASSWORD_DEFAULT);
    }
    return $hashing->get();
}
?>