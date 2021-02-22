<?php

use App\General\OrderConfig;

function currency_format($value = 0, $decimal = 2, $dec_point = '.', $thousands_sep = ',')
{
    try {
        if ($value == 0) return $value;

        if (is_numeric($value) && $value == round($value)) return number_format($value, 0, $dec_point, $thousands_sep);

        return number_format($value, 2, $dec_point, $thousands_sep);
    } catch (\Exception $ex) {
        return $value;
    }
}

function getNameStatus($status)
{
    return OrderConfig::STATUS[$status];
}

function getNameStatusEmail($status)
{
    return OrderConfig::ORDER[$status];
}
