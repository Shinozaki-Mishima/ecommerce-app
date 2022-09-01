<?php

class Customhelper
{

    // What is the final price after a discount
    public static function calculateDiscountAmount($total, $discount)
    {
        $value = $total - bcmul(bcdiv($discount, 100, 10), $total, 10);
        return number_format($value, 2, '.', '');
    }

    // What is x percent of a value
    public static function calculatePercentOf($total, $percent)
    {
        return number_format(bcmul(bcdiv($percent, 100, 10), $total, 10), 2);
    }

    // Show the date to the user in a nice way
    public static function formatDate($dateString)
    {
        $date = date_create($dateString);
        return date_format($date, "d M y");
    }
}