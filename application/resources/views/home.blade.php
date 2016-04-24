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

<!-- Promos -->
<section class="promos" style="margin:0px;">
    <div class="container">
        <div class="row">
        <!-- Slider -->
            <div class="flexslider" style="margin:10px;">
                <ul class="slides">
                    <?php $banner = unserialize($data['banner']->meta_value);?>
                    @foreach($banner['slider1'] as $slide1)
                    <li>
                        <img src="{{url('application/storage/photo_banner/'.$slide1)}}">
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- End class="flexslider" -->  
            <?php // ================ TOP PRODUCT SLIDER ==================  ?>
            <div class="col-lg-6">
                <div class="free-shipping" id="parallax-top-product">
                    <div class="col-lg-12" style="min-height:270px;margin-bottom:10px;">
                        <div class="hgroup title" style="margin-bottom: 0px;background: none;">
                            <h3>Top Product</h3>
                        </div>
                        <div class="col-lg-12" id="port" style="margin-top: 0px;margin-bottom: 0px;">
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
                    <img src="{{url('application/storage/photo_banner/'.$banner['banner1'])}}">
                </div>
            </div>
            <?php // ================ READY STOCK ==================  ?>
            <div class="col-lg-3" >
                <div class="world-shipping">
                        <img src="{{url('application/storage/photo_banner/'.$banner['banner2'])}}">
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
                <div class="box border-top" style="margin-bottom:10px;min-height: 210px;">
                    <h4 class="widget-title widget-title ">Kategori Terlaris</h3>
                    <div class="product-list-small">
                        @foreach($data['product'] as $product)
                            <?php
                                $image = unserialize($product->image);
                            ?>
                            <li style="float: left;padding-right: 5px;">            
                                <div class="image" style="width: 110px;">
                                    <a href="product.html" title="Lolita" style="border: 0px;" >
                                        <image src="{{url('application/storage/photo_product/'.$image[0])}}" style="width:110px; max-width: 500px;height: 110px;">
                                    </a>
                                </div>
                                <div class="desc">
                                    <h6>
                                        <a href="product.html" title="Lolita">{{$product->name}}</a>
                                    </h6>
                                    <div class="price">
                                        Rp. {{ number_format($product->price, 0, ",", ".") }}                                     
                                    </div>
                                    <div class="rating rating-4">
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section>

<?php // ============================ Promo ================================== ?>
<section class="new-product"  >
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 10px;" >
                    <img src="{{url('application/storage/photo_banner/'.$banner['banner3'])}}">
            </div>
        </div>
    </div>
</section>

<section class="new-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box border-top" style="margin-bottom:10px;min-height: 210px;">
                    <h4 class="widget-title widget-title ">Promosi</h3>
                    <div class="product-list-small">
                        @foreach($data['product'] as $product)
                            <?php
                                $image = unserialize($product->image);
                            ?>
                            <li style="float: left;padding-right: 5px;">            
                                <div class="image" style="width: 110px;">
                                    <a href="product.html" title="Lolita" style="border: 0px;" >
                                        <image src="{{url('application/storage/photo_product/'.$image[0])}}" style="width:110px; max-width: 500px;height: 110px;">
                                    </a>
                                </div>
                                <div class="desc">
                                    <h6>
                                        <a href="product.html" title="Lolita">{{$product->name}}</a>
                                    </h6>
                                    <div class="price">
                                        Rp. {{ number_format($product->price, 0, ",", ".") }}                                     
                                    </div>
                                    <div class="rating rating-4">
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-heart"></i>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section>

<?php // ============================ Section 3 ================================== ?>
<section class="promos" style="margin-bottom:25px">
    <div class="container">
        <div class="row">
            <?php // ============================ PRE ORDER ================================== ?>
            <div class="col-lg-3" style="margin-bottom: 10px;" >
                    <img src="{{url('application/storage/photo_banner/'.$banner['banner4'])}}">
            </div>
            <?php // ============================ TOP PRODUK SLIDER ================================== ?>
            <div class="col-lg-9" >
                <div class="flexslider" style="margin-top:0px;margin-bottom: 10px;">
                    <ul class="slides">
                        @if($banner['slider2'] != '')
                            @foreach($banner['slider2'] as $slide2)
                                <li>
                                    <img src="{{url('application/storage/photo_banner/'.$slide2)}}">
                                </li>
                            @endforeach
                        @endif
                    </ul>
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