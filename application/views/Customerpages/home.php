<body>
<!-- =====  LODER  ===== -->
 <div class="loder"></div>
 <div class ="  text-center" style="color:white;background-color:#c71334">PharmacyOnlineShop is on Alpha ; Some wording and feature are not finish.Thank you</div>
  <div class="wrapper">
    <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
      <div class="newsletter-popup">
        <img class="offer" src="<?=base_url('assets/images/newsbg.jpg')?>" alt="offer">
        <div class="newsletter-popup-static newsletter-popup-top">
          <div class="popup-text">
            <div class="popup-title">50% <span>off</span></div>
            <div class="popup-desc">
              <div>Sign up and get 50% off your next Order</div>
            </div>
          </div>
          <form onsubmit="return  validatpopupemail();" method="post">
            <div class="form-group required">
              <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
              <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
              <label class="checkme">
                <input type="checkbox" value="" id="checkme" />Dont show again</label>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <ul class="header-top-left">
                <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> <img src="<?= base_url()?>assets/images/English-icon.gif" alt="img"> English <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#"><img src="<?= base_url()?>assets/images/English-icon.gif" alt="img"> English</a></li>
                    <li><a href="#"><img src="<?= base_url()?>assets/images/French-icon.gif" alt="img"> French</a></li>
                    <li><a href="#"><img src="<?= base_url()?>assets/images/German-icon.gif" alt="img"> German</a></li>
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
                <li class="cart"><a href="<?=base_url('My_controller/view_cart')?>">My Cart</a></li>
                <?php if(!$authenticated){?>
                <li class="account"><a href="<?= base_url('My_controller/login_page')?>">Login</a></li>
                <li class="account"><a href="<?= base_url('My_controller/signup_page')?>">Sign-up</a></li>
                <?php } ?>
                <?php if($authenticated) {?>
                <li class="account"><a href="<?=base_url('My_controller/myaccount')?>"><?= $userdata['Full_Name'];  ?></a></li>
                <li class="account"><a href="<?=base_url('My_controller/logout_customer')?>">Logout</a></li>
                <?php } ?>
                <?php if(!$authenticated) {?>
                <li class="account"><a href="<?=base_url('My_controller/myaccount')?>">My Account</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <nav class="navbar">
            <div class="navbar-header mtb_20"> <a class="navbar-brand" href="<?=base_url('home')?>"> <img alt="HealthCared" src="<?= base_url();?>assets/images/logo.png"> </a> </div>
            <div class="header-right pull-right mtb_50">
              <button class="navbar-toggle pull-left" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
              <div class="shopping-icon">
              <div class="cart-item " id="count_item" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true" role="button"></div>
                <div id="cart-dropdown" class="cart-menu collapse collapses">
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
                  <?php foreach($menu->result()as $menus){?>
                    <li class="menu"><a href="<?=base_url("My_controller/groupMenu?groupMenu=$menus->menu_type")?>"><?=$menus->menu_type?></a></li>
                  <?php } ?>
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
        <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
          <div id="category-menu" class="navbar collapse mb_40 hidden-sm-down in" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
              <ul class="nav  main-navigation collapse in ">
                 <?php foreach($menu->result()as $menus){?>
                  <li class="menu"><a href="<?=base_url('My_controller/groupMenu?groupMenu=').$menus->menu_type?>"><?=$menus->menu_type?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <br>
           <div class="left_banner left-sidebar-widget mt_30 mb_50"> <a href="#"><img src="<?= base_url();?>assets/images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
        </div>
        <div id="column-right" class="col-sm-8 col-md-8 col-lg-9 mtb_30">
          <!-- =====  BANNER STRAT  ===== -->
          <!-- <div class="banner">
            <div class="main-banner owl-carousel">
              <div class="item"><a href="#"><img src="<?=base_url()?>assets/images/main_banner1.jpg" alt="Main Banner" class="img-responsive" /></a></div>
              <div class="item"><a href="#"><img src="<?=base_url()?>assets/images/a.jpg" alt="Main Banner" class="img-responsive" /></a></div>
            </div>
          </div> -->
          <!-- =====  BANNER END  ===== -->
          <!-- =====  SUB BANNER  STRAT ===== -->
          <!-- <div class="row">
            <div class="cms_banner mt_10">
              <div class="col-xs-6 col-sm-12 col-md-6 mt_20">
                <div id="subbanner1" class="sub-hover"> <a href="#"><img src="<?= base_url();?>assets/images/skin.jpg" alt="Sub Banner1" class="img-responsive"></a>
                </div>
              </div>
              <div class="col-xs-6 col-sm-12 col-md-6 mt_20">
                <div id="subbanner2" class="sub-hover"> <a href="#"><img src="<?= base_url();?>assets/images/asor.jpg" alt="Sub Banner2" class="img-responsive"></a>
                </div>
              </div>
            </div>
          </div> -->
          <!-- =====  SUB BANNER END  ===== -->

          <!--Sale Product-->
          <!-- <div id="sale-product">
            <div class="heading-part mb_20 ">
              <h2 class="main_title">New Product</h2>
            </div>
            <div class="Specials owl-carousel">
              <?php foreach($data->result() as $row){?>
              <div class="item product-layout product-list">
                <div class="product-thumb">
                  <div class="image product-imageblock">
                       <a href="product_detail?detail=<?=$row->id?>">
                        <img data-name="product_image" src="<?= base_url();?>assets/images/product/<?=$row->picture?>" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                         <img src="<?= base_url();?>assets/images/product/<?=$row->picture?>" alt="iPod Classic" title="iPod Classic" class="img-responsive"> 
                        </a> 
                    </div>
                  <div class="caption product-detail text-left">
                    <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem"><?=$row->pname?></a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">₱</span><?=$row->price ?></span>
                    </span>
                      <p class="product-desc mt_20"><?=$row->detail?></p>
                       <br>
                       <br>
                       <br>
                       <br>
                       <br>
                    <div class="button-group text-center ">
                      <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                      <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                      <div class="compare"><a href="#"><span>Compare</span></a></div>
                      <div class='add-to-cart add_cart' name="add_cart" data-productname="<?=$row->pname?>" data-price="<?=$row->price?>" data-productid="<?=$row->id?>" data-picture="<?=$row->picture?>"></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div> -->
          <div class="category-page-wrapper mb_30">
            <div class="col-md-12 sort-wrapper ">
              <input value="" class="form-control " name="search" id="search" placeholder="Search here..." type="text">
            </div>
            <div class="col-xs-2 text-right list-grid-wrapper">
              <div class="btn-group btn-list-grid">
                <button type="button" id="list-view" class="btn btn-default list-view"></button>
                <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
              </div>
            </div>
          </div> 
          <div class="row" id="result">
             
          </div>
          <div style="font-size:20px" class=" text-center mt_50" id="pagination_link">
            
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
              <button class="btn add_cart">Subscribe</button>
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