<div class="container my-4">
    <div class="row">
        <div class="col-md-6">
            <img 
            class="img-fluid" 
            src="<?php echo BASE_URL . $data["product_image1"]; ?>"
            alt="product image">
        </div>
        <div class="col-md-6">
            <span><?php echo $data["product_category"]; ?></span>
            <h3><?php echo $data["product_title"]; ?></h3>
            <h3><?php echo $data["product_price"]; ?></h3>

            <form action="<?php echo BASE_URL . "details/$id"; ?>" method="post">

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input name="cart_quantity" type="number" value="1" min="1" class="form-control" id="usr">
                        </div>
                    </div>
                    <div class="col-md-10"> 
                        <button name="add_to_cart" class="btn btn-primary btn-lg">Add to cart</button>
                    </div>
                </div>

            </form>

            <div class="row">
                <div class="col-md-12">
                    <p>About</p>
                    <p><?php echo $data["product_description"]; ?></p>
                </div>
            </div>

        </div>
    </div>
</div>