<div class="row">
    <div class="col-md-12">
        <p>Loyalty Points</p>
        <form action="checkout" method="post">
            <select class="form-control" name="points" id="points">
                <option value="0">Reset</option>
                <option value="100">$5 off - 100 points</option>
                <option value="200">$10 off - 200 points</option>
                <option value="300">$15 off - 300 points</option>
                <option value="500">$25 off - 500 points</option>
                <option value="1000">$50 off - 1000 points</option>
            </select>
            <button name="points_btn" type="submit" class="btn btn-outline-primary btn-block">Exchange</button>
        </form>
        <ul>
            <li>Current Points: <?php echo $cart_object->getUserTotalPoints();?></li>
            <li>Points being used: <?php echo $cart_object->getPointsUsed();?></li>
            <li>Points Discount: $<?php echo $cart_object->getPointsDiscountAmount();?></li>
            <li>Points Gain: <?php echo $cart_object->getPointsGained();?></li>
        </ul>
    </div>
</div>