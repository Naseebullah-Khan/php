<?php

class Validator
{
    public static function string($value, $min = 1, $max = 1000): bool
    {
        $trimValue = trim(string: $value);
        return strlen(string: $trimValue) >= $min && strlen(string: $trimValue) <= $max;
    }

    public static function email($value): bool
    {
        return filter_var(value: $value, filter: FILTER_VALIDATE_EMAIL);
    }
}