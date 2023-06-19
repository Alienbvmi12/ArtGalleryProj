<?php

namespace App\Helper;

class Helper{
    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $max = strlen($characters) - 1;
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $max)];
        }
    
        return $randomString;
    }
}