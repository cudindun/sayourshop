@extends('components.layout')
@section('title', $data['title'])
@section('content')


<div class="header">
    <!-- Logo & Search bar -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">                          
                    <div class="logo">
                        <a href="{{url ('/') }}" title="&larr; Back home">
                            <img src="{{asset('assets/image/logo.png')}}" style="max-width: 100%;">
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
                                </div>
                            </div>
                            <!-- End class="search"-->
                        </div> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-5 col-xs-12" align="center">
                    <h1>
                        <a href="{{url('keranjang')}}"><i class="fa fa-shopping-cart"></i><span> 3</span></a>
                        @if(Sentinel::check())
                        <a href="{{url('dashboard') }}" style="min-width:150px"><i class="fa fa-user"></i> {{ucwords(Sentinel::getUser()->first_name." ".Sentinel::getUser()->last_name)}}</a>
                        <a href="{{url('logout')}}" style="min-width:150px"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
                        @else
                        <a href="{{url('login_form')}}" style="min-width:150px"><i class="fa fa-user"></i> Login | Register</a>
                        @endif
                    </h1>
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
            <div class="col-md-12">
                <div class="hidden-xs">
                    <!-- Main menu (desktop) -->
                    <div class="main-menu">
                        <li>
                            <a href="{{ url('/') }}" title="Home" class="title">Home</a>
                        </li>
                        <?php
                        $total_app = count($data['category']);

                        for ($i=0; $i < $total_app ; $i++) { 
                        ?>
                            <li>
                                <a href="{{ url('produk/'.$data['category'][$i]->slug) }}">
                                    {{$data['category'][$i]->name}}
                                </a>
                                @if($data['category'][$i]->subcategories == "1")
                                <?php $tes=$data['category'][$i]->subcategory; $category=$data['category'][$i]->slug;?>
                                    <ul class="dropdown-menu">
                                        @foreach($tes as $key)
                                        <li>
                                            <a href="{{ url('produk/'.$category.'/'.$key->slug)}}" title="Shoes">
                                                   {{ucwords($key->subname)}}           
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="{{url('cek_order_form')}}">Cek Order</a>
                        </li>
                        <li>
                            <a href="#">Konfirmasi Pembayaran</a>
                        </li>
                    </div>
                    <!-- End class="main-menu" -->
                </div>
                
                <div class=" col-sm-12 visible-xs-* hidden-lg hidden-sm hidden-md">
                    <!-- Main menu (mobile) -->
                    <select class="form-control">
                        <option value="" selected="selected" />Go to&hellip;
                        <option value="/" />Home
                        <option value="category.html" />Produk
                        <option value="category.html" />Ready Stock
                        <option value="category.html" />Pre-Order                 
                    </select>
                </div>
            </div>
            <div class="col-lg-3 visible-desktop">
            </div>
        </div>
    </div>
</nav>
<!-- End class="navigation" -->

{!! $content !!}

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

                    <div class="links">
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
                    </div>
                </div>
                <!-- End class="support" -->

                <hr />

                <!-- My account -->
                <div class="account">
                    <h6>My account</h6>

                    <div class="links">                              
                        <li>
                            @if(Sentinel::check())
                        <a href="{{url('dashboard')}}" style="min-width:150px"><i class="fa fa-user"></i> {{Sentinel::getUser()->email}}</a>
                        <br>
                        <a href="{{url('logout')}}" style="min-width:150px"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
                        @else
                        <a href="{{url('login_form')}}" style="min-width:150px"><i class="fa fa-user"></i> Login | Register</a>
                        @endif                               
                        </li>
                    </div>
                </div>
                <!-- End class="account"-->
                
            </div>

            <div class="col-lg-2">
                
                <!-- Categories -->
                <div class="categories">
                    <h6>Categories</h6>

                    <div class="links">
                        <li>
                            <a href="category.html" title="Mens">Mens</a>
                        </li>
                        <li>
                            <a href="category.html" title="Womens">Womens</a>
                        </li>
                    </div>
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

                <div class="list-chevron links">
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
                </div>
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

                    <div class="social-icons">

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

                    </div>
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
        </div>
    </div>
</div>
<!-- End class="credits" --> 
                    
        </div>
@stop