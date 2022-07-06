<?php

class Stripeclient
{

    // TODO: Let all stripe objects call this file
    public static function getClient()
    {
        try {

            return new \Stripe\StripeClient($_ENV["STRIPE_TEST_SECRET"]);
        } catch (Exception $e) {
            echo "Invalid API key";
            exit();
        }
    }
}
