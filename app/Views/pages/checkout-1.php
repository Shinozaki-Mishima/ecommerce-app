<!-- css here -->
<style>
    body{
    background: #ddd; 
    vertical-align: middle; 
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold;
}
.title{
    margin-bottom: 5vh;
}
.card{
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}
@media(max-width:767px){
    .card{
        margin: 3vh auto;
    }
}
.cart{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}
@media(max-width:767px){
    .cart{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}
.summary{
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
}
@media(max-width:767px){
    .summary{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
}
.summary .col-2{
    padding: 0;
}
.summary .col-10
{
    padding: 0;
}.row{
    margin: 0;
}
.title b{
    font-size: 1.5rem;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}
a{
    padding: 0 1vh;
}
.close{
    margin-left: auto;
    font-size: 0.7rem;
}
img{
    width: 3.5rem;
}
.back-to-shop{
    margin-top: 4.5rem;
}
h5{
    margin-top: 4vh;
}
hr{
    margin-top: 1.25rem;
}
form{
    padding: 2vh 0;
}
select{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.btn{
    color: red;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
a{
    color: black; 
}
a:hover{
    color: black;
    text-decoration: none;
}
 #code{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}
</style>
<!-- html here -->
<div class="card my-4">
<div class="row">
    <div class="col-md-8 cart">
        <div class="title">
            <div class="row">
                <div class="col"><h4><b>Shopping Cart</b></h4></div>
            </div>
        </div>
        <?php foreach ($cartDetails as $data): ?>

        <div class="row border-top border-bottom">
            <div class="row main align-items-center">
                <div class="col-2"><img class="img-fluid" src="<?php echo BASE_URL. $data["product_image1"];?>"></div>
                <div class="col">
                    <div class="row text-muted"><a href="#"><?php echo $data["product_title"];?></a></div>
                    <div class="row"><?php echo $data["product_category"];?></div>
                </div>
                <div class="col">
                    <a href="#"></a><a href="#" class="border"><?php echo $data["cart_quantity"];?></a><a href="#"></a>
                </div>
                <form action="cart" method="post">
                    <div class="col ">$<?php echo $data["product_price"] ?> <button class="close ml-3" type="submit" name="remove_from_cart">&#10005;</button></div>
                    <input type="hidden" name="cart_id" value="<?php echo $data["cart_id"]; ?>">
                </form>
            </div>
        </div>

        <?php endforeach; ?>
        

        <div class="back-to-shop"><a href="<?php echo BASE_URL."store"; ?>">&leftarrow;</a><span class="text-muted">Back to shop</span></div>

    </div>
    <div class="col-md-4 summary">
        <div><h5><b>Summary</b></h5></div>
        <hr>
        <div class="row my-1">
            <div class="col" style="padding-left:0;">Subtotal</div>
            <div class="col text-right">$<?php echo $cart_object->getSubtotal();?></div>
        </div>
        <div class="row my-1">
            <div class="col" style="padding-left:0;">Discount</div>
            <div class="col text-right">%<?php echo $cart_object->getDiscount()?></div>
        </div>
        <div class="row my-1">
            <div class="col" style="padding-left:0;">Discount Price</div>
            <div class="col text-right">$<?php echo $cart_object->getDiscountPrice();?></div>
        </div>
        <!-- <form>
            <p>SHIPPING</p>
            <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
            <p>GIVE CODE</p>
            <input id="code" placeholder="Enter your code">
        </form> -->
        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
            <div class="col">TOTAL PRICE</div>
            <div class="col text-right">$<?php echo $cart_object->getTotal();?></div>
        </div> 
        <div class="col">Loyalty Points</div>
            <?php require_once APP_DIR . "Views/includes/checkout_points.php";?>
            <?php require_once APP_DIR."Views/includes/stripe-ui.php";?>
    </div>
</div>
            
        </div>