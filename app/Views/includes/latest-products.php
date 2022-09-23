<style>
    .full-slider {
        position: relative;
    }

    ul.slider-controls li {
        position: absolute;
        z-index: 99;
        top: 40%;
    }

    /* Contorls  */


    /* Remove dot from ul li */
    ul.slider-controls {
        list-style: none;
    }

    /* position contorols */
    .left {
        left: 10%;
    }

    .right {
        right: 10%;
    }

    /* resize controls */
    .left i,
    .right i {
        font-size: 2rem;
    }


    /* Custom nav */

    .tns-nav {
        text-align: center;
        margin: 20px;
    }

    .tns-nav button {
        background: #343a40;
        border: none;
        height: 13px;
        width: 12px;
        border-radius: 50%;
        margin-left: 9px;
    }
</style>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<div class="full-slider my-5">
    
    <div class="heading">
        <h1 class="text-center">New Arrivals</h1>
        <hr>
    </div>

    <ul class="slider-controls" id="slider-controls2">
        <li class="left">
            <button class="btn btn-light btn-sm">
                <span class="material-icons">
                    arrow_back_ios
                </span>
            </button>
        </li>
        <li class="right">
            <button class="btn btn-light btn-sm">
                <span class="material-icons">
                    arrow_forward_ios
                </span>
            </button>
        </li>
    </ul>


    <div class="container">
        <div class="my-slider" id="my-slider2">

        <?php
        $product_details = $product_object->getLatestProducts();
        foreach ($product_details as $data) :
            $link = BASE_URL . "details/{$data["product_id"]}";
        ?>
            <div>
                <div class="slider-img">
                    <a href="<?php echo $link;?>" class="image">
                    <img class="img-fluid" src="<?php echo BASE_URL . $data["product_image1"]; ?>" alt=""> </a>
                </div>

                <div class="slider-product-details">
                    <div class="slider-product-title">
                        <small>
                            <?php echo $data["product_title"]; ?>
                        </small>
                    </div>

                    <div class="slider-product-price">
                        $<?php echo $data["product_price"]; ?>
                    </div>

                </div>

            </div>
        <?php endforeach; ?>

        </div>
        <!-- or ul.my-slider > li -->

    </div>
</div>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
<!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.helper.ie8.js"></script><![endif]-->



<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<!-- NOTE: prior to v2.2.1 tiny-slider.js need to be in <body> -->


<script type="module">
    $(document).ready(function() {

        var slider = tns({
            container: '#my-slider2',
            items: 6,
            slideBy: 'page',
            autoplay: true,
            mouseDrag: true,
            gutter: 10,
            autoplayButtonOutput: false,
            navPosition: 'bottom',
            controlsContainer: '#slider-controls2'
        });
    });
</script>