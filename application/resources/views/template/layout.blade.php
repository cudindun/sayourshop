<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-js">

    <head>
        <meta charset="UTF-8" />

<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="La Boutique HTML v1.0" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Home</title>


{!! Html::style('assets/lib/bootstrap/css/bootstrap.css') !!}
{!! Html::style('assets/css/style.css') !!}
{!! Html::style('assets/font/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('assets/css/flexslider.css') !!}
@yield('css')

<!-- Comment following two lines to use LESS -->
{!! Html::style('assets/css/color-schemes/core.css') !!}
{!! Html::style('assets/css/color-schemes/turquoise.css') !!}

<?php /*
    <link rel="stylesheet" type="text/css" href="css/color-schemes/turquoise.css" id="color_scheme" />
    */
?>

<!-- Uncomment following three lines to use LESS -->
<!--<link rel="stylesheet/less" type="text/css" href="css/less/core.less">
<link rel="stylesheet/less" type="text/css" href="css/less/turquoise.less" id="color_scheme" >
<script src="js/less.js" type="text/javascript"></script>-->


<link rel="icon" href="assets/image/favicon.ico" type="image/x-icon"/>

<link href="http://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Shadows+Into+Light" rel="stylesheet" type="text/css" />

<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
{!! Html::script('assets/js/jquery-2.1.1.min.js') !!}
{!! Html::script('assets/js/jquery-ui-1.10.2.custom.js') !!}
{!! Html::script('assets/js/jquery.easing-1.3.min.js') !!}
{!! Html::script('assets/lib/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/jquery.isotope.min.js') !!}
{!! Html::script('assets/js/jquery.flexslider.js') !!}
{!! Html::script('assets/js/jquery.elevatezoom.js') !!}
{!! Html::script('assets/js/jquery.sharrre-1.3.4.js') !!}
{!! Html::script('assets/js/jquery.gmap3.js') !!}
{!! Html::script('assets/js/imagesloaded.js') !!}
{!! Html::script('assets/js/la_boutique.js') !!}
@yield('js')

<!--preview only-->
{!! Html::script('assets/js/jquery.cookie.js') !!}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>

        <div class="wrapper">

            <!-- Header -->
<div class="header">
    <?php /* ======================= Top Bar ============================
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php // NULL ?>
                </div>
                <div class="col-lg-6 hidden-xs">
                    <ul class="inline pull-right">
                        <li>
                            <a href="login-register.html" title="Login / Register">Login / Register</a>									
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    */ ?>

    <!-- Logo & Search bar -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">							
                    <div class="logo">
                        <a href="/" title="&larr; Back home">
                            {!! Html::image('assets/image/logo.png') !!}
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 col-md-7 col-sm-7 col-xs-12">
                    <div class="row-fluid">
                        <div class="col-lg-12">
                            
                            <!-- Search -->
                            <div class="search">
                                <div class="qs_s">

                                    <form method="post" action="search.html" />
                                        <input type="text" name="query" id="query" placeholder="Search&hellip;" autocomplete="off" value="" />
                                    </form>

                                    <!-- Autocomplete results -->
                                    <div id="autocomplete-results" style="display: none;">	
                                        <ul>
                                            <li>
                                                <a title="Lisette Dress" href="product.html">
                                                    <div class="image">
                                                        {!! Html::image('assets/image/thumbnails/db_file_img_48_60x60.jpg') !!}
                                                    </div>
                                                    <h6>Lisette Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Malta Dress" href="product.html">
                                                    <div class="image">
                                                        {!! Html::image('assets/image/thumbnails/db_file_img_137_60x60.jpg') !!}
                                                    </div>
                                                    <h6>Malta Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Marais Dress" href="product.html">
                                                    <div class="image">
                                                        {!! Html::image('assets/image/thumbnails/db_file_img_42_60x60.jpg') !!}
                                                    </div>
                                                    <h6>Marais Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Millay Dress" href="product.html">
                                                    <div class="image">
                                                        {!! Html::image('assets/image/thumbnails/db_file_img_107_60x60.jpg') !!}
                                                    </div>
                                                    <h6>Millay Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Momoko Dress" href="product.html">
                                                    <div class="image">
                                                        {!! Html::image('assets/image/thumbnails/db_file_img_132_60x60.jpg') !!}
                                                    </div>
                                                    <h6>Momoko Dress</h6>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End id="autocomplete-results" -->
                                    
                                    
                                    
                                </div>
                            </div>
                            <!-- End class="search"-->
                            
                        </div> 
                    </div>
                </div>

                <div class="col-lg-3 col-md-5 col-sm-5 col-xs-12">
                    <div class="user-interact">
                        <a href="#"><i class="fa fa-shopping-cart"></i><span>3</span></a>
                        <a href="#" style="min-width:150px"><i class="fa fa-user"></i>Login / Register </a>
                    </div>  
                </div>
            
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- End class="bottom" -->
    
</div>
<!-- End class="header" -->            
<!-- Navigation -->
<nav class="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="hidden-xs">
                    <!-- Main menu (desktop) -->
                    <ul class="main-menu">
                        <li>
                            <a href="/" title="Home" class="title">Home</a>
                        </li>
                        <li>
                            <a href="category.html" title="Mens" class="title">Mens</a>
                            <ul style="width:170px">
                                <li>
                                    <a href="category.html" title="Accesories" class="title">Accesories</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Jackets" class="title">Jackets</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Jumpers" class="title">Jumpers</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Shirts" class="title">Shirts</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Shoes" class="title">Shoes</a>
                                </li>
                                <li>
                                    <a href="category.html" title="T-Shirts" class="title">T-Shirts</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="category.html" title="Womens" class="title">Womens</a>
                            <ul style="width:170px">
                                <li>
                                    <a href="category.html" title="Accessories" class="title">Accessories</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Bags" class="title">Bags</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Dresses" class="title">Dresses</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Shoes" class="title">Shoes</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Tops" class="title">Tops</a>
                                </li>
                                <li>
                                    <a href="category.html" title="Trousers" class="title">Trousers</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="Features" class="title">Features</a>
                            <ul style="width:170px">
                                <li>
                                    <a href="typography.html" title="Typography" class="title">Typography</a>
                                </li>
                                <li>
                                    <a href="retina-ready-icons.html" title="Retina-ready icons" class="title">Retina-ready icons</a>
                                </li>
                                <li>
                                    <a href="buttons.html" title="Buttons" class="title">Buttons</a>
                                </li>
                                <li>
                                    <a href="elements.html" title="Elements" class="title">Elements</a>
                                </li>
                                <li>
                                    <a href="grids.html" title="Grids" class="title">Grids</a>
                                </li>
                                <li>
                                    <a href="404.html" title="404" class="title">404</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="about-us.html" title="About us" class="title">About us</a>
                        </li>
                        <li>
                            <a href="store-locator.html" title="Store locator" class="title">Store locator</a>
                        </li>
                        <li>
                            <a href="blog.html" title="Blog" class="title">Blog</a>
                        </li>
                        <li>
                            <a href="contact-us.html" title="Contact us" class="title">Contact us</a>
                        </li>					
                    </ul>
                    <!-- End class="main-menu" -->
                </div>
                
                <div class=" col-sm-12 visible-xs-* hidden-lg hidden-sm hidden-md">
                    <!-- Main menu (mobile) -->
                    <select class="form-control">
                        <option value="" selected="selected" />Go to&hellip;
                        <option value="/" />Home
                        <option value="category.html" />Mens
                        <option value="category.html" />Accesories
                        <option value="category.html" />Jackets
                        <option value="category.html" />Jumpers
                        <option value="category.html" />Shirts
                        <option value="category.html" />Shoes
                        <option value="category.html" />T-Shirts
                        <option value="category.html" />Womens
                        <option value="category.html" />Accessories
                        <option value="category.html" />Bags
                        <option value="category.html" />Dresses
                        <option value="category.html" />Shoes
                        <option value="category.html" />Tops
                        <option value="category.html" />Trousers
                        <option value="#" />Features
                        <option value="typography.html" />Typography
                        <option value="retina-ready-icons.html" />Retina-ready icons
                        <option value="buttons.html" />Buttons
                        <option value="elements.html" />Elements
                        <option value="grids.html" />Grids
                        <option value="404.html" />404
                        <option value="about-us.html" />About us
                        <option value="store-locator.html" />Store locator
                        <option value="blog.html" />Blog
                        <option value="contact-us.html" />Contact us					
                    </select>
                </div>
            </div>

            <div class="col-lg-3 visible-desktop">
            </div>
        </div>
    </div>
</nav>
<!-- End class="navigation" -->


    <!-- Content section -->		
    <section class="main" style="padding:0px;">
                
        @yield('content')
                
    </section>
    <!-- End class="main" -->


<!-- Twitter bar -->
<div class="twitter-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="icon">
                    <i class="fa fa-twitter"></i>
                </div>
                <div id="tweets" data-username="lemonstand">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End class="twitter-bar" -->            
<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">	
                        
            <div class="col-lg-2">
                <!-- Support -->
                <div class="support">
                    <h6>Support</h6>

                    <ul class="links">
                        <li>
                            <a href="about-us.html" title="About us" class="title">About us</a>
                        </li>
                        <li>
                            <a href="typography.html" title="Typography" class="title">Typography</a>
                        </li>
                        <li>
                            <a href="retina-ready-icons.html" title="Retina-ready icons" class="title">Retina-ready icons</a>
                        </li>
                        <li>
                            <a href="buttons.html" title="Buttons" class="title">Buttons</a>
                        </li>
                        <li>
                            <a href="elements.html" title="Elements" class="title">Elements</a>
                        </li>
                        <li>
                            <a href="grids.html" title="Grids" class="title">Grids</a>
                        </li>
                        <li>
                            <a href="store-locator.html" title="Store locator" class="title">Store locator</a>
                        </li>
                        <li>
                            <a href="contact-us.html" title="Contact us" class="title">Contact us</a>
                        </li>											
                    </ul>
                </div>
                <!-- End class="support" -->

                <hr />

                <!-- My account -->
                <div class="account">
                    <h6>My account</h6>

                    <ul class="links">								
                        <li>
                            <a href="login-register.html" title="Login / Register">Login / Register</a>									
                        </li>
                    </ul>
                </div>
                <!-- End class="account"-->
                
            </div>

            <div class="col-lg-2">
                
                <!-- Categories -->
                <div class="categories">
                    <h6>Categories</h6>

                    <ul class="links">
                        <li>
                            <a href="category.html" title="Mens">Mens</a>
                        </li>
                        <li>
                            <a href="category.html" title="Womens">Womens</a>
                        </li>
                    </ul>
                </div>
                <!-- End class="categories" -->

                <hr />

                <!-- Pay with confidence -->
                <div class="confidence">
                    <h6>Pay with confidence</h6>

                    {!! Html::image('assets/image/stripe.png') !!}
                </div>
                <!-- End class="confidence" -->
            </div>

            <div class="col-lg-4">
                <h6>From the blog</h6>

                <ul class="list-chevron links">
                    <li>
                        <a href="blog-post.html">Article with video</a>
                        <small>05/01/2013</small>
                    </li>
                    <li>
                        <a href="blog-post.html">Article with images</a>
                        <small>03/14/2013</small>
                    </li>
                    <li>
                        <a href="blog-post.html">Article with style!</a>
                        <small>08/31/2013</small>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4">				

                <!-- Newsletter subscription -->
                <div class="newsletter">
                    <h6>Newsletter subscription</h6>                                        
                </div>

                <form class="form-horizontal" onsubmit="$('#newsletter_subscribe').modal('show'); return false;" enctype="multipart/form-data" action="/" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="Search..." >
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" style="height:34px"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </span>
                    </div>
                </form>

                <div class="newsletter">
                    <p style="margin-top:20px">Sign up to receive our latest news and updates direct to your inbox</p>
                </div>
                <!-- End class="newsletter" -->
                
                <hr />
                
                <!-- Social icons -->
                <div class="social">
                    <h6>Socialize with us</h6>

                    <ul class="social-icons">

                        <li>
                            <a class="twitter" href="#" title="Twitter">Twitter</a>								
                        </li>

                        <li>
                            <a class="facebook" href="#" title="Facebook">Facebook</a>								
                        </li>

                        <li>
                            <a class="pinterest" href="#" title="Pinterest">Pinterest</a>								
                        </li>

                        <li>
                            <a class="youtube" href="#" title="YouTube">YouTube</a>								
                        </li>

                        <li>
                            <a class="vimeo" href="#" title="Vimeo">Vimeo</a>								
                        </li>

                        <li>
                            <a class="flickr" href="#" title="Flickr">Flickr</a>								
                        </li>

                        <li>
                            <a class="googleplus" href="#" title="Google+">Google+</a>								
                        </li>

                        <li>
                            <a class="dribbble" href="#" title="Dribbble">Dribbble</a>								
                        </li>

                        <li>
                            <a class="tumblr" href="#" title="Tumblr">Tumblr</a>								
                        </li>

                        <li>
                            <a class="digg" href="#" title="Digg">Digg</a>								
                        </li>

                        <li>
                            <a class="linkedin" href="#" title="LinkedIn">LinkedIn</a>								
                        </li>

                        <li>
                            <a class="instagram" href="#" title="Instagram">Instagram</a>								
                        </li>

                    </ul>
                </div>
                <!-- End class="social" -->

            </div>
        </div>
    </div>
</div>
<!-- End id="footer" -->
            <!-- Credits bar -->
<div class="credits">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <p>&copy; <?= date('Y')?> <a href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi" title="La Boutique">La Boutique</a> &middot; <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a> &middot; <a href="#" title="Privacy policy">Privacy policy</a> &middot; All Rights Reserved. </p>
            </div>
            <div class="span4 text-right hidden-sm hidden-xs">
                <p><a href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi" title="Responsive eCommerce template">Responsive eCommerce template by Tfingi</a></p>
            </div>
        </div>
    </div>
</div>
<!-- End class="credits" -->            <!-- Options panel -->
<div class="options-panel">
    <div class="options-panel-content">

        <div class="row-fluid">
            <div class="col-lg-12">
                <div class="control-group">
                    <label for="option_color_scheme" class="control-label">Color scheme</label>
                    <div class="controls">
                        <select name="option_color_scheme" id="option_color_scheme" class="span12">
                            <option value="css/color-schemes/turquoise.css" />Turquoise
                            <option value="css/color-schemes/greensea.css" />Green sea
                            <option value="css/color-schemes/emerland.css" />Emerland
                            <option value="css/color-schemes/nephritis.css" />Nephritis
                            <option value="css/color-schemes/peterriver.css" />Peter river
                            <option value="css/color-schemes/belizehole.css" />Belizehole
                            <option value="css/color-schemes/amethyst.css" />Amethyst
                            <option value="css/color-schemes/wisteria.css" />Wisteria
                            <option value="css/color-schemes/wetasphalt.css" />Wet asphalt
                            <option value="css/color-schemes/midnightblue.css" />Midnight blue
                            <option value="css/color-schemes/sunflower.css" />Sunflower
                            <option value="css/color-schemes/orange.css" />Orange
                            <option value="css/color-schemes/carrot.css" />Carrot
                            <option value="css/color-schemes/pumpkin.css" />Pumpkin
                            <option value="css/color-schemes/alizarin.css" />Alizarin
                            <option value="css/color-schemes/pomegranate.css" />Pomegranate
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="options-panel-toggle">
        <a href="#" title=""><i class="fa fa-gear"></i></a>
    </div>
</div>
<!-- End class="options-panel" -->
            
<!-- Newsletter modal window -->
<div id="newsletter_subscribe" class="modal hide fade" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="hgroup title">
            <h3>You are now subscribed to our newsletter</h3>
            <h5>All the latest deals and offers will be making their way to your inbox shortly!</h5>
        </div>
    </div>

    <div class="modal-footer">	
        <div class="pull-left">
            <button data-dismiss="modal" aria-hidden="true" class="btn btn-small">
                Close &nbsp; <i class="icon-ok"></i>
            </button>
        </div>
    </div>
</div>
<!-- End id="newsletter_subscribe" -->          
        </div>
<!-- I'm watching you -->
<script type="text/javascript">
var sc_project=9238432; 
var sc_invisible=1; 
var sc_security="e08559e3"; 
var sc_https=1; 
var sc_remove_link=1; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>

@yield('script')

<!-- Okay I'll stop watching you -->
    </body>
</html>