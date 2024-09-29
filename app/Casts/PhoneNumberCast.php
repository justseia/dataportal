<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\Helpers\PhoneNumberHelper;

class PhoneNumberCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): string
    {
        if (app()->runningInConsole() || request()->is('api/*')) {
            return $value;
        }

        return PhoneNumberHelper::formatPhoneNumberForView($value);
    }

    public function set($model, $key, $value, $attributes): string
    {
        return PhoneNumberHelper::formatPhoneNumberForStorage($value);
    }
}
