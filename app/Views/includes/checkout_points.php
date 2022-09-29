<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 20
}
select{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.0vh 1vh;
    margin-bottom: .01vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
</style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

<div class="row">
    <div class="col">
        <form action="checkout" method="post">
            <select class="text-muted" name="points" id="points">
                <option value="0">Reset</option>
                <option value="100">$5 off - 100 points</option>
                <option value="200">$10 off - 200 points</option>
                <option value="300">$15 off - 300 points</option>
                <option value="500">$25 off - 500 points</option>
                <option value="1000">$50 off - 1000 points</option>
            </select>
            <button name="points_btn" type="submit" class="btn btn-outline-danger btn-block"> 
                Loyalty Points Exchange
                <!-- <span class="material-symbols-outlined"> currency_exchange </span>   -->
            </button>
        </form>
        <ul>
            <li>Current Points: <?php echo $cart_object->getUserTotalPoints();?></li>
            <li>Points being used: <?php echo $cart_object->getPointsUsed();?></li>
            <li>Points Discount: $<?php echo $cart_object->getPointsDiscountAmount();?></li>
            <li>Points Gain: <?php echo $cart_object->getPointsGained();?></li>
        </ul>
    </div>
</div>