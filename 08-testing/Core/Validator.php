<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF): bool
    {
        $trimValue = trim(string: $value);
        return strlen(string: $trimValue) >= $min && strlen(string: $trimValue) <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var(value: $value, filter: FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $num1, int $num2): bool
    {
        return $num1 > $num2;
    }
}
