<body class="shop-detail">
  <!-- =====  LODER  ===== -->
  <div class="loder"></div>
  <div class ="  text-center" style="color:white;background-color:#c71334">PharmacyOnlineShop is on Alpha ; Some wording and feature are not finish.Thank you</div>
  <div class="wrapper">
    <!-- =====  HEADER START  ===== -->
    <header id="header">
    <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <ul class="header-top-left">
                <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> <img src="<?php base_url()?>assets/images/English-icon.gif" alt="img"> English <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#"><img src="<?php base_url()?>assets/images/English-icon.gif" alt="img"> English</a></li>
                    <li><a href="#"><img src="<?php base_url()?>assets/images/French-icon.gif" alt="img"> French</a></li>
                    <li><a href="#"><img src="<?php base_url()?>assets/images/German-icon.gif" alt="img"> German</a></li>
                  </ul>
                </li>
                <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> USD <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                    <li><a href="#">USD</a></li>
                    <li><a href="#">EUR</a></li>
                    <li><a href="#">AUD</a></li>
                  </ul>
                </li>
              </ul>
            </div> 
            <?php
               $userdata="";
               $authenticated="";
               if(!$this->session->has_userdata('authenticated'))
               {
                 $userdata = $this->session->userdata('user_data');
                 $authenticated =  $this->session->has_userdata('google_authenticated');
               }else {
                 $authenticated  =$this->session->has_userdata('authenticated');
                 $userdata = $this->session->userdata('auth_customer');
               }
            ?>
            <div class="col-sm-6">
              <ul class="header-top-right text-right">
                <li class="cart"><a href="cart">My Cart</a></li>
                <?php if(!$authenticated){?>
                <li class="account"><a href="<?= base_url('My_controller/login_page')?>">Login</a></li>
                <li class="account"><a href="<?= base_url('My_controller/signup_page')?>">Sign-up</a></li>
                <?php } ?>
                <?php if($authenticated) {?>
                <li class="account"><a href="myaccount"><?= $userdata['Full_Name'];  ?></a></li>
                <li class="account"><a href="<?=base_url('My_controller/logout_customer')?>">Logout</a></li>
                <?php } ?>
                <?php if(!$authenticated) {?>
                <li class="account"><a href="myaccount">My Account</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <nav class="navbar">
            <div class="navbar-header mtb_20"> <a class="navbar-brand" href="home"> <img alt="HealthCared" src="<?= base_url();?>assets/images/logo.png"> </a> </div>
            <div class="header-right pull-right mtb_50">
              <button class="navbar-toggle pull-left" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
              <div class="shopping-icon">
              <div class="cart-item " id="count_item" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true" role="button"></div>
                <div id="cart-dropdown" class="cart-menu collapse">
                  <ul>
                    <li id="cart_detail">
                     
                    </li>
                    
                  </ul>
                </div>
              </div>
              <div class="main-search pull-right">
                <div class="search-overlay">
                  <!-- Close Icon -->
                  <a href="javascript:void(0)" class="search-overlay-close"></a>
                  <!-- End Close Icon -->
                  <div class="container">
                    <!-- Search Form -->
                    <form role="search" id="searchform" action="/search" method="get">
                      <label class="h5 normal search-input-label">Enter keywords To Search Entire Store</label>
                      <input value="" name="q" placeholder="Search here..." type="search">
                      <button type="submit"></button>
                    </form>
                    <!-- End Search Form -->
                  </div>
                </div>
                <div class="header-search"> <a id="search-overlay-btn"></a> </div>
              </div>
            </div>
            <div class="collapse navbar-collapse js-navbar-collapse pull-right">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="<?=base_url('My_controller/home')?>">Home</a></li>
                <!-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
                  <ul class="dropdown-menu">
                    <li> <a href="contact_us.html">Contact us</a></li>
                    <li> <a href="cart_page.html">Cart</a></li>
                    <li> <a href="checkout_page.html">Checkout</a></li>
                    <li> <a href="product_detail_page.html">Product Detail Page</a></li>
                    <li> <a href="single_blog.html">Single Post</a></li>
                  </ul>
                </li> -->
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>
      <div class="header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-3">
              <div class="category">
                <div class="menu-bar" data-target="#category-menu,#category-menu-responsive" data-toggle="collapse" aria-expanded="true" role="button">
                  <h4 class="category_text">Top category</h4>
                  <span class="i-bar"><i class="fa fa-bars"></i></span></div>
              </div>
              <div id="category-menu-responsive" class="navbar collapse " aria-expanded="true" style="" role="button">
                <div class="nav-responsive">
                  <ul class="nav  main-navigation collapse in">
                    <li><a href="#">Premium</a></li>
                    <li><a href="#">Signature</a></li>
                    <li><a href="#">Blended</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9">
              <div class="header-bottom-right offers">
              	<div class="marquee"><span><i class="fa fa-circle" aria-hidden="true"></i>It's Sexual Health Week!</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Our 5 Tips for a Healthy Summer</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Sugar health at risk?</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>The Olay Ranges - What do they do?</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Body fat - what is it and why do we need it?</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Can a pillow help you to lose weight?</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- =====  HEADER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
          <div id="category-menu" class="navbar collapse in  mb_40" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
              <ul class="nav  main-navigation collapse in">
                    <li><a href="#">Premium</a></li>
                    <li><a href="#">Signature</a></li>
                    <li><a href="#">Blended</a></li>
              </ul>
            </div>
          </div>
          <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="<?=base_url()?>assets/images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
          <!-- =====  BANNER STRAT  ===== -->
          <!-- <div class="breadcrumb ptb_20">
            <h1>New LCDScreen...</h1>
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="category_page.html">Products</a></li>
              <li class="active">New LCDS...</li>
            </ul>
          </div> -->
          <!-- =====  BREADCRUMB END===== -->
          <div class="row mt_10 ">
            <div class="col-md-6">
            <?php  foreach($data->result() as $row){?>
              <div><a class="thumbnails"> <img data-name="product_image" src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
              <div id="product-thumbnail" class="owl-carousel">
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?=base_url()?>assets/images/product/<?=$row->picture?>" data-fancybox="group1"> <img src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
                </div>
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?=base_url()?>assets/images/product/<?=$row->picture?>" data-fancybox="group1"> <img src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
                </div>
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?=base_url()?>assets/images/product/<?=$row->picture?>" data-fancybox="group1"> <img src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
                </div>
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?=base_url()?>assets/images/product/<?=$row->picture?>" data-fancybox="group1"> <img src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
                </div>
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?=base_url()?>assets/images/product/<?=$row->picture?>" data-fancybox="group1"> <img src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
                </div>
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?=base_url()?>assets/images/product/<?=$row->picture?>" data-fancybox="group1"> <img src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
                </div>
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?=base_url()?>assets/images/product/<?=$row->picture?>" data-fancybox="group1"> <img src="<?=base_url()?>assets/images/product/<?=$row->picture?>" alt="" /></a></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 prodetail caption product-thumb">
              <h4 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem"><?=$row->pname?></a></h4>
              <div class="rating">
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
              </div>
              <span class="price mb_20"><span class="amount"><span class="currencySymbol">₱</span><?=$row->price?></span>
              </span>
              <hr>
              <ul class="list-unstyled product_info mtb_20">
                <!-- <li>
                  <label>Brand:</label>
                  <span> <a href="#">Apple</a></span></li>
                <li> -->
                  <label>Product ID:</label>
                  <span><?=$row->id?></span></li>
                <li>
                  <label>Stock:</label>
                  <span></span></li>
              </ul>
              <hr>
              <p class="product-desc mtb_30"><?=$row->detail ?></p>
              <div id="product">
                <div class="qty mt_30 form-group2">
                  <label>Qty</label>
                  <input name="product_quantity" min="1" value="1" type="number">
                </div>
                <div class="button-group mt_30">
                  <div class='add-to-cart add_cart' name="add_cart" data-productname="<?=$row->pname?>" data-price="<?=$row->price?>" data-productid="<?=$row->id?>" data-picture="<?=$row->picture?>"></div>
                  <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                  <div class="compare"><a href="#"><span>Compare</span></a></div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
    <!-- =====  FOOTER START  ===== -->
    <div class="footer pt_60">
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-block">
            <div class="content_footercms_right">
              <div class="footer-contact">
              <div class="footer-title ptb_20">Address</div>
                <ul>
                  <li>136 velasco ext,barangay maligaya camelot street caloocan city </li>
                  <li>(+63) 998 7654 321 - (+63) 912 345 6789</li>
                  <li>Pharmacy2020@gmail.com</li>
                </ul>
                <div class="social_icon">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 footer-block">
            <h6 class="footer-title ptb_20">Categories</h6>
            <ul>
              <li><a href="#">Medicines</a></li>
              <li><a href="#">Healthcare</a></li>
              <li><a href="#">Mother & Baby</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Toiletries</a></li>
              <li><a href="#">Skincare</a></li>
            </ul>
          </div>
          <div class="col-md-2 footer-block">
            <h6 class="footer-title ptb_20">Information</h6>
            <ul>
              <li><a href="contact.html">Specials</a></li>
              <li><a href="#">New Products</a></li>
              <li><a href="#">Best Sellers</a></li>
              <li><a href="#">Our Stores</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">About Us</a></li>
            </ul>
          </div>
          <div class="col-md-2 footer-block">
            <h6 class="footer-title ptb_20">My Account</h6>
            <ul>
              <li><a href="#">Checkout</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">My Orders</a></li>
              <li><a href="#">My Credit Slips</a></li>
              <li><a href="#">My Addresses</a></li>
              <li><a href="#">My Personal Info</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h6 class="ptb_20">SIGN UP OUR NEWSLETTER</h6>
            <p class="mt_10 mb_20">For get offers from our favorite brands & get 20% off for next </p>
            <div class="form-group">
              <input class="mb_20" type="text" placeholder="Enter Your Email Address">
              <button class="btn">Subscribe</button>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom mt_60 ptb_10">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="copyright-part">@ 2017 All Rights Reserved HealthCare</div>
            </div>
            <div class="col-sm-6">
              <div class="payment-icon text-right">
                <ul>
                  <li><i class="fa fa-cc-paypal "></i></li>
                  <li><i class="fa fa-cc-stripe"></i></li>
                  <li><i class="fa fa-cc-visa"></i></li>
                  <li><i class="fa fa-cc-discover"></i></li>
                  <li><i class="fa fa-cc-mastercard"></i></li>
                  <li><i class="fa fa-cc-amex"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  FOOTER END  ===== -->
  </div>
  <a id="scrollup">Scroll</a>
  
  