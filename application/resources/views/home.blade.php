<?php //Css for this page  ?>
    <style>
        .thumb{display:inline-block;vertical-align:baseline;overflow:hidden;padding-top:64px;height:0;width:64px;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-position:0 0;background-repeat:no-repeat;text-decoration:none;color:inherit}

        #port {
            margin: 1.5em 0px;
            overflow: hidden;
            position: relative;
            /*width: 700px;*/
            height: 168px;
            padding: 24px 64px;
        }

        .thumbs_index {
            padding: 0 12px;
            /* initial position */
            left: 0;
            /* Put all he thumbs on one line. */
            white-space: nowrap;
        }
        
        .thumbs_index > li {
            display: inline;
            margin-right: 12px;
        }
        
        .img_thumb {
          padding-top: 120px;
          width: 192px;

          -webkit-box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
             -moz-box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
                  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
        }
        .index{list-style:none;margin:0;padding:0}
        
    </style>

<?php //Page Content  ?>

    <!-- Home content -->
    
                                    
<!-- Slider -->
<section class="flexslider" style="margin:10px;">
    <ul class="slides">
        <li>
            {!! Html::image('assets/image/slides/1.jpg') !!}
            <div class="caption">
                <div class="container">
                    <div class="col-lg-6">
                        <h3>360+ Retina-ready icons</h3>
                        <br />
                        <p>The iconic Font Awesome for Bootstrap</p>
                        <br /> <a class="btn btn-small" title="Retina-ready icons" href="/retina-ready-icons.html">Find out more</a> 
                        <a class="btn btn-primary btn-small" title="" href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li>
            {!! Html::image('assets/image/slides/2.jpg') !!}
            <div class="caption">
                <div class="container">
                    <div class="col-lg-6">
                        <h3>Isotope animation engine</h3>
                        <br />
                        <p>With masonry product listing &amp; blog</p>
                        <br /> <a class="btn btn-small" title="" href="/blog.html">Find out more</a> 
                        <a class="btn btn-primary btn-small" title="" href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li>
            {!! Html::image('assets/image/slides/3.jpg') !!}
            <div class="caption">
                <div class="container">
                    <div class="col-lg-6 col-lg-offset-6 text-right">
                        <h3>Feature-packed webstore</h3>
                        <br />
                        <p>Social sharing, price filtering, instand search and much more...</p>
                        <br /> <a class="btn btn-small" title="" href="/category.html">Find out more</a> 
                        <a class="btn btn-primary btn-small" title="" href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li>
            {!! Html::image('assets/image/slides/4.jpg') !!}
            <div class="caption">
                <div class="container">
                    <div class="col-lg-6 col-lg-offset-6 text-right">
                        <h3>Responsive. Flexible &amp; sleek.</h3>
                        <br />
                        <p>Expertly crafted with Bootstrap front-end framework</p>
                        <br /> <a class="btn btn-small" title="" href="/grids.html">Find out more</a> 
                        <a class="btn btn-primary btn-small" title="" href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</section>
<!-- End class="flexslider" -->                    <!-- Promos -->
<section class="promos" style="margin:0;">
    <div class="container">
        <div class="row">
            <?php // ================ TOP PRODUCT SLIDER ==================  ?>
            <div class="col-lg-6">
                <div class="free-shipping" id="parallax-top-product">
                    <div class="box" style="min-height:350px;margin-bottom:10px;">
                        <div class="hgroup title">
                            <h3>Top Product</h3>
                        </div>
                        <div class="col-lg-12" id="port">
                            <ul class="thumbs_index index parallax-layer">
                                <li><a class="img_thumb thumb" href="#" style="background: url('assets/image/top_products/1.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('assets/image/top_products/2.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('assets/image/top_products/3.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('assets/image/top_products/4.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('assets/image/top_products/5.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('assets/image/top_products/6.jpg');">item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php // ================ PRODUCT MO READY 2 ==================  ?>
            <div class="col-lg-3" >
                <div class="world-shipping">
                    <div class="box border-top" style="margin-bottom:10px;">
                        {!! Html::image('assets/image/world-shipping.png', '') !!}
                        <div class="hgroup title">
                            <h3>We're now global!</h3>
                            <h5>This is a snappy sub-title</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                    </div>
                </div>
            </div>
            <?php // ================ READY STOCK ==================  ?>
            <div class="col-lg-3" >
                <div class="low-price">
                    <div class="box border-top" style="margin-bottom:10px;">
                        {!! Html::image('assets/image/low-price.png', '') !!}
                        <div class="hgroup title">
                            <h3>Ready Stock!</h3>
                            <h5>This is a snappy sub-title</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // ============================ New Product ================================== ?>
<section class="new-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box border-top" style="margin-bottom:10px;">
                    {!! Html::image('assets/image/low-price.png', '') !!}
                    <div class="hgroup title">
                        <h3>Product Ready Stock Terbaru</h3>
                        <h5>Product Ready Stock Terbaru</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // ============================ Promo ================================== ?>
<section class="new-product"  >
    <div class="container">
        <div class="row">
            <div class="col-lg-12" >
                <div class="box border-top" style="margin-bottom:10px;">
                    <div class="hgroup title">
                        <h3>Promo</h3>
                        <h5>Product Ready Stock Terbaru</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // ============================ Section 3 ================================== ?>
<section class="apadah" style="margin-bottom:25px">
    <div class="container">
        <div class="row">
            <?php // ============================ PRE ORDER ================================== ?>
            <div class="col-lg-3" >
                <div class="box border-top">
                    <div class="hgroup title">
                        <h3>PRE ORDER</h3>
                        <h5>Product Ready Stock Terbaru</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                </div>
            </div>
            <?php // ============================ TOP PRODUK SLIDER ================================== ?>
            <div class="col-lg-9" >
                <div class="col-lg-12"  style="padding:0px;">
                    <div class="box border-top" style="margin-bottom:10px;" >
                        <div class="hgroup title" >
                            <h3>TOP PRODUK SLIDER</h3>
                            <h5>Product Ready Stock Terbaru</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                    </div>
                </div>
                <?php // ============================ PRODUK / PROMO PO 1 ================================== ?>
                <div class="col-lg-4"  style="padding:0px;">
                    <div class="box border-top" style="margin-bottom:10px;">
                        <div class="hgroup title">
                            <h3>PRODUK / PROMO PO 1</h3>
                            <h5>Product Ready Stock Terbaru</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                    </div>
                </div>
                <?php // ============================ PRODUK PO TERBARU ================================== ?>
                <div class="col-lg-8">
                    <div class="box border-top" style="margin-bottom:10px;">
                        <div class="hgroup title">
                            <h3>PRODUK PO TERBARU</h3>
                            <h5>Product Ready Stock Terbaru</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section> 
    <!-- End class="home" -->


<?php //Java script for this page  ?>
@section('script')
    <script type="text/javascript">
      jQuery(document).ready(function(){
        // Declare parallax on layers
        jQuery('.parallax-layer').parallax({
          mouseport: jQuery("#port"),
          yparallax: false
        });
      });
    </script>

@stop