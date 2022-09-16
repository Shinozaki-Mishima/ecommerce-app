<?php

class Point {
    private const POINTS_PER_POINT = 1;

    // how much points 
    public static function getPoints($total) {
        // cast to int to account for cents
        return intval($total * self::POINTS_PER_POINT);
    }

    // get discount amount for points - how much money users can get for the points
    public static function getDiscountAmount($points_used) {
        switch ($points_used) {
            case '100':
                return 5;
                break;
            case '200':
                return 10;
                break;
            case '300':
                return 15;
                break;
            case '500':
                return 25;
                break;
            case '1000':
                return 50;
                break;
            
            default:
                return 0;
                break;
        }
    }
}