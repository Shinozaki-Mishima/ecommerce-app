<head>
        <meta charset="utf-8" /> 
 
        <title>About - Kitchennete</title> 
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="public/Assets/css/styles.css" rel="stylesheet" />
</head>

<style>
/* scroll btn */

@import url(https://fonts.googleapis.com/css?family=Josefin+Sans:300,400);
* {
  margin: 0;
  padding: 0;
}
html, body {
  height: 100%;
}
section {
  position: relative;
  width: 100%;
  height: 50%;
}

section h1 {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 2;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  color: #fff;
  font : normal 300 64px/1 'Josefin Sans', sans-serif;
  text-align: center;
  white-space: nowrap;
}

#section01 { 
    position: relative;
    background-color: #343a40;
    background: url("images/about-banner.jpg") no-repeat center center;
    background-size: cover;
    padding-top: 8rem;
    padding-bottom: 8rem;
}

#section01::after {
    content: "";
    position: absolute;
    background-color: #1c375e;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    opacity: 0.5;
}


#thanks {
  background-color: #fff;
}
#thanks::after {
  content: none;
}
#thanks div {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 2;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
#thanks h2 {
  margin-bottom: 60px;
  color: #333;
  font : normal 300 64px/1 'Josefin Sans', sans-serif;
  text-align: center;
  white-space: nowrap;
}
#thanks p {
  color: #333;
  font : normal 400 20px/1 'Josefin Sans', sans-serif;
}
#thanks p a {
  color: #333;
  text-decoration: none;
  transition: color .3s;
}
#thanks p a:hover {
  color: #888;
}
.demo a {
  position: absolute;
  bottom: 20px;
  left: 50%;
  z-index: 2;
  display: inline-block;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  color: #fff;
  font : normal 400 20px/1 'Josefin Sans', sans-serif;
  letter-spacing: .1em;
  text-decoration: none;
  transition: opacity .3s;
}
.demo a:hover {
  opacity: .5;
}



#section01 a {
  padding-top: 60px;
}
#section01 a span {
  position: absolute;
  top: 0;
  left: 50%;
  width: 24px;
  height: 24px;
  margin-left: -12px;
  border-left: 1px solid #fff;
  border-bottom: 1px solid #fff;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
  box-sizing: border-box;
}

.lead {
  font-size: 1.25rem;
  font-weight: 300;
}

</style>

<script>
    $(function() {
        $('a[href*=#]').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
            });
    });
</script>

<section id="section01" class="demo">
    <h1>Welcome to kitchenette</h1> 
    <a href="#section02"><span></span>Scroll</a>
</section>

<!-- About section-->
<div class="container mt-5">
    <section id="section02">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>About Kitchenette</h2>
                    <p class="lead">
                    An e-commerce website which facilitates the commerce of kitchenware and apliances as well as
                    features to assist in user experience which may include:
                    </p>
                    <ul>
                        <li>Loyalty point system - where every purchase, users can earn points which can be used for discounts on items.</li>
                        <li>Comprehensive Recommender Systems to assist users in finding desired items more efficiently.</li>
                        <li>Intuitive chatbots offering 24/7 live chat responses to user queries.</li>
                        <li>Facilitates online purchasing with credit cards using local currency.</li>
                        <li>Seasonal sales on items.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Services -->
<section class="bg-light" id="services">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>Services we offer</h2>
                <p class="lead">
                    We at kitchentte offer quality kitchenware and appliances to fit any budget. 
                    We expand our collection of products frequently to accomodate for all client necessities. 
                    We offer a Loyalty point system - where every purchase, users can earn points which can be used for discounts on items.</p>
            </div>
        </div>
    </div>
</section>

 
<!-- Footer-->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item"><a href="#!">About</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!">Contact</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; Kitchenette 2022. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-4">
                        <a href="#!"><i class="bi-facebook fs-3"></i></a>
                    </li>
                    <li class="list-inline-item me-4">
                        <a href="#!"><i class="bi-twitter fs-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!"><i class="bi-instagram fs-3"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
