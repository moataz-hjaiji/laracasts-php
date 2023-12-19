<?php

namespace Core;
class Validator
{
    public static function isString($value,$min=1,$max=INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
    public static function isEmail($value)
    {

        return filter_var($value,FILTER_VALIDATE_EMAIL);
    }
}
