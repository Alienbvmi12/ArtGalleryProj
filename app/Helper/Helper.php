<?php

namespace App\Helper;

class Helper
{
    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $max)];
        }

        return $randomString;
    }

    public static function generateSlug($sentence)
    {
        // Convert the sentence to lowercase
        $lowercase = strtolower($sentence);

        // Remove non-alphanumeric characters and replace them with dashes
        $slug = preg_replace('/[^a-z0-9]+/', '-', $lowercase);

        // Remove leading and trailing dashes
        $slug = trim($slug, '-');

        // Unique it using timestamps

        $slug = $slug . '-' . date('YmdHis', time());

        return $slug;
    }
}
