<style>
    .product-grid{
    font-family: 'Open Sans', sans-serif;
    text-align: center;
    border: 1px solid #ebebeb;
    }
    .product-grid .product-image{
        overflow: hidden;
        position: relative;
    }
    .product-grid .product-image a.image{ display: block; }
    .product-grid .product-image img{
        width: 100%;
        height: auto;
        transition: all 0.05s ease 0s;
    }
    .product-grid:hover .product-image img{ transform: scale(1.1); }
    .product-grid .product-sale-label{
        color: #fff;
        background-color: #b83616;
        font-size: 13px;
        text-transform: capitalize;
        padding: 3px 18px;
        position: absolute;
        top: 0px;
        right: 0px;
    }
    .product-grid .product-links{
        background-color: #b83616;
        padding: 7px 10px;
        margin: 0;
        list-style: none;
        opacity: 0;
        transform: translateY(-50%);
        position: absolute;
        top: 50%;
        right: 0;
        transition: all 0.3s ease 0s
    }
    .product-grid:hover .product-links{ opacity: 1; }
    .product-grid .product-links li{
        margin: 0 0 7px;
        transform: translateX(30px);
        transition: all 0.3s ease 0s;
    }
    .product-grid .product-links li:nth-child(2){ transition: all 0.3s ease 0.05s; }
    .product-grid .product-links li:nth-child(3){ transition: all 0.3s ease 0.1s; }
    .product-grid .product-links li:nth-child(4){ transition: all 0.3s ease 0.15s; }
    .product-grid .product-links li:last-child{ margin: 0; }
    .product-grid:hover .product-links li{ transform: translateX(0); }
    .product-grid .product-links li a{
        color: #fff;
        font-size: 20px;
        position: relative;
        transition: all 0.3s ease 0s;
    }
    .product-grid .product-links li a:hover{
        color: #fff;
        text-shadow: 3px 3px 0 rgba(255,255,255,0.2);
    }
    .product-grid .product-links li a:before,
    .product-grid .product-links li a:after{
        content: attr(data-tip);
        color: #fff;
        background: #000;
        font-size: 13px;
        font-weight: 500;
        line-height: 18px;
        text-shadow: none;
        padding: 5px 10px;
        white-space: nowrap;
        display: none;
        transform: translateY(-50%);
        position: absolute;
        right: 45px;
        top: 50%;
        transition: all 250ms ease-in-out 0s;
    }
    .product-grid .product-links li a:after{
        content: '';
        height: 10px;
        width: 10px;
        padding: 0;
        transform: translateY(-50%) rotate(45deg);
        right: 41px;
        z-index: -1;
    }
    .product-grid .product-links li a:hover:before,
    .product-grid .product-links li a:hover:after{
        display: block;
    }
    .product-grid .product-content{
        text-align: left;
        padding: 25px 15px;
    }
    .product-grid .title{
        font-size: 16px;
        font-weight: 500;
        text-transform: capitalize;
        margin: 0 0 6px;
    }
    .product-grid .title a{
        color: #222;
        transition: all 0.3s ease 0s;
    }
    .product-grid .title a:hover{ color: #b83616; }
    .product-grid .price{
        color: #b83616;
        font-size: 15px;
        font-weight: 700;
        margin: 0 0 4px;
    }
    .product-grid .price span{
        color: #666;
        font-size: 14px;
        font-weight: 400;
        text-decoration: line-through;
    }
    @media screen and (max-width: 990px){
        .product-grid{ margin: 0 0 30px; }
    }
</style>

<div class="container">
    <div class="row">

        <?php foreach ($productDetails as $data): 
            $link = BASE_URL . "details/{$data["product_id"]}";
            ?>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="<?php echo $link;?>" class="image">
                            <img class="pic-1" src="<?php echo BASE_URL . $data["product_image1"]; ?>">
                        </a>
                        <span class="product-sale-label">sale</span>
                        <ul class="product-links">
                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-cart-arrow-down"></i></a></li>
                            <li><a href="#" data-tip="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                            <li><a href="#" data-tip="Quick View"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <h3 class="title">
                            <a href="<?php echo $link;?>">
                                <?php echo $data["product_title"]; ?>
                            </a>
                        </h3>
                        <div class="price">
                            <span>$85.50</span>
                            $<?php echo $data["product_price"]; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>
