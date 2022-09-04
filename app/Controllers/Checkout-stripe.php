<?php

require_once APP_DIR . "Utils/code.precheckout.php";

$cartDetails = $cart_object->getCartDetails($user_id);
$cart_object->calculateTotal();

$stripe = Stripeclient::getClient();

//require 'vendor/autoload.php';
// This is your test secret API key.
//\Stripe\Stripe::setApiKey('sk_test_51JnmnlEgJDFZ4b1rIAfcQgklnMwn2ToEdIJrxkbKzivY2eXyX7Z3T5aIFh2DXTV1P6BiOPgo49eUtSvOHvj8v6ko00pntJCUOi');

header('Content-Type: application/json');

$YOUR_DOMAIN = BASE_URL;

$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
    'price_data' => [
        'currency' => 'TTD',
        'unit_amount' => $cart_object->getTotal() * 100,
        'product_data' => [
            'name' => 'Cart Checkout',
            'description' => 'Cart checkout description',
            'images' => ['https://source.unsplash.com/0sihmMSmnoE/300x300']
        ]
    ],
    'quantity' => 1,
  ]],
  'payment_method_types' => ['card'],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . 'checkout/success/stripe/{CHECKOUT_SESSION_ID}',
  'cancel_url' => $YOUR_DOMAIN . 'checkout',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);