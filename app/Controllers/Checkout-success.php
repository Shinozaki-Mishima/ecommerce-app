<?php 

// required files
require_once APP_DIR."Utils/code.precheckout.php";

$completed = false;

// Get cart details
$cart_details = $cart_object->getCartDetails($user_id);

if(empty($cart_details)) {
    echo "cart is empty";
    exit;
}

// Calculate subtotal and total
$cart_object->calculateTotal();

// determine payment method
switch ($payment) {
    case 'debug':
        # code...
        $data = [
            "payment" => "none",
            "payment_id" => null,
            "subtotal" => $cart_object->getSubTotal(),
            "total" => $cart_object->getTotal(),
            "total_discount_amount" => 0,
        ];
        $completed = true;
        break;

    case 'stripe':
        # code...
        $payment_object = new Stripehelper();
        $checkoutOrder = $payment_object->getCheckoutOrder($id);
        Debugger::debug($checkoutOrder);
        $completed = $payment_object->isCheckoutCompleted($checkoutOrder);
        $data = $payment_object->getPaymentDetails($checkoutOrder);
        Debugger::debug($data);
        
        break;
    
    default:
        # code...
        break;
}

// check if payment was completed
if(!$completed || empty($data)) {
    echo "payment process not completed.";
    exit;
}

// TODO: FOR TESTING DO NOT INSERT INFO
//exit;

// set points info
$points_used = $cart_object->getPointsUsed();
$points_gained = $cart_object->getPointsGained();
$points_discount_amount = $cart_object->getPointsDiscountAmount();
$total_points = ($cart_object->getUserTotalPoints() + $points_gained) - $points_used;

// Insert order
$order_id = $order_object->insertOrder(
    $user_id,
    $data["subtotal"],
    $data["total"],
    $data["total_discount_amount"],
    $data["payment"],
    $data["payment_id"],
);

// Insert order details
$order_object->insertOrderDetails($cart_details, $order_id);

// Update user points
$user_object->updateTotalPoints($user_id, $total_points);
$user_object->setTotalPoints($total_points);
// reset session
$cart_object->resetSessions();


// Send user to thanks page
header("location: " . BASE_URL . "thanks");
exit;