<?php

class Customhelper {

    public static function calculateDiscountAmount($total, $discount){
        // total = total - ((discount / 100) * total)
        $value = $total - bcmul(bcdiv($discount, 100, 10), $total, 10);
        return number_format($value, 2, '.', '');
    }

    public static function calculatePercentOf($percent, $total){
        return number_format(bcmul(bcdiv($percent, 100, 10), $total, 10), 2);
    }

    public static function formatData($dateString){
        $date = date_create($dateString);
        return date_format($date, "d M y");
    }

    /*
    <?php

class Customhelper
{



    public static function calculateDiscountAmount($total, $discount)
    {
        $value = $total - bcmul(bcdiv($discount, 100, 10), $total, 10);
        return number_format($value, '.', '');
    }

    public static function calculatePercentOf($total, $percent)
    {
        return number_format(bcmul(bcdiv($percent, 100, 10), $total, 10), 2);
    }


    public static function formatDate($dateString)
    {
        $date = date_create($dateString);
        return date_format($date, "d M y");
    }
}
*/
}