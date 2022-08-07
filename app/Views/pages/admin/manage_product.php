<div class="container">
    <div class="card p-3">
        <h1>Product Management</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <form action="<?php echo BASE_URL . $url; ?>" method="post">
                    <div class="form-group">
                        <label for="product_title">Product Title:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_title" 
                        name="product_title" 
                        value="<?php echo $product_title; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_description">Product Description:</label>
                        <textarea 
                        class="form-control" 
                        rows="5" 
                        id="product_description"
                        name="product_description"
                        > 
                            <?php echo $product_description; ?>
                        </textarea>
                    </div> 

                    <div class="form-group">
                        <label for="product_price">Product Price:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_price" 
                        name="product_price" 
                        value="<?php echo $product_price; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_quantity">Product Quantity:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_quantity" 
                        name="product_quantity" 
                        value="<?php echo $product_quantity; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_image1">Main Image:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_image1" 
                        name="product_image1" 
                        value="<?php echo $product_image1; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_image2">Optional Image:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_image2" 
                        name="product_image2" 
                        value="<?php echo $product_image2; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_image3">Optional Image:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_image3" 
                        name="product_image3" 
                        value="<?php echo $product_image3; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_image4">Optional Image:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_image4" 
                        name="product_image4" 
                        value="<?php echo $product_image4; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_status">Product Status:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_status" 
                        name="product_status" 
                        value="<?php echo $product_status; ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_category">Product Category:</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="product_category" 
                        name="product_category" 
                        value="<?php echo $product_category; ?>">
                    </div>

                    <button class="btn btn-primary" type="submit" name="add_product">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>