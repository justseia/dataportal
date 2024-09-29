<?php

namespace App\Helpers;

class PhoneNumberHelper
{
    public static function formatPhoneNumberForStorage(string $phoneNumber): string
    {
        return preg_replace('/\D/', '', $phoneNumber);
    }

    public static function formatPhoneNumberForView(string $phoneNumber): string
    {
        $cleaned = preg_replace('/\D/', '', $phoneNumber);

        return sprintf('+7 (%s) %s %s %s',
            substr($cleaned, 1, 3),
            substr($cleaned, 4, 3),
            substr($cleaned, 7, 2),
            substr($cleaned, 9, 2)
        );
    }
}
