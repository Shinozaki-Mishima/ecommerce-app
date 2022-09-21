<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<button 
    class="btn btn-outline-danger my-4" 
    type="button" 
    data-toggle="collapse" 
    data-target="#search-filter" 
    aria-expanded="false" 
    aria-controls="search-filter">
    Search or Filter
</button>

<div class="card p-2 my-4 collapse" id="search-filter">
<h5 class="mb-3">Search:</h5>
    <div class="row">

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <input type="text" placeholder="search" name="search" class="form-control" id="search">
                            <button class="btn btn-default"> 
                                <span class="material-icons">search</span> 
                            </button>
                         
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h5 class="mb-3">Filter:</h5>

    <div class="row">

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <select name="category" class="form-control" id="category">
                                <option value="0">Select Category</option>
                                <?php 
                                    $categories = $product_object->getAllCategories();
                                    foreach ($categories as $category):
                                ?>
                                <option>
                                    <?php echo $category["product_category"]; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                         
                    </div>
                    <button class="btn btn-default"> <span class="material-icons">done</span> </button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <select name="min_price" class="form-control" id="min_price">
                                <option value="0">Select Min Price</option>
                                <option value="200">lower than $200</option>
                                <option value="500">lower than $500</option>
                                <option value="800">lower than $800</option>
                                <option value="1000">lower than $1000</option>
                            </select>
                         
                    </div>
                    <button class="btn btn-default"> <span class="material-icons">done</span> </button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <select name="max_price" class="form-control" id="max_price">
                                <option value="0">Select Max Price</option>
                                <option value="200">higher than $200</option>
                                <option value="500">higher than $500</option>
                                <option value="800">higher than $800</option>
                                <option value="1000">higher than $1000</option>
                            </select>
                         
                    </div>
                    <button class="btn btn-default"> <span class="material-icons">done</span> </button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <select name="order" class="form-control" id="order">
                                <option value="0">Order by</option>
                                <option value="order-title">Product Title (A-Z)</option>
                                <option value="order-title-desc">Product Title (Z-A)</option>
                                <option value="order-price">Price (low-high)</option>
                                <option value="order-price-desc">Price (high-low)</option>
                            </select>
                         
                    </div>
                    <button class="btn btn-default"> <span class="material-icons">done</span> </button>
                </div>
            </form>
        </div>

    </div>
</div>