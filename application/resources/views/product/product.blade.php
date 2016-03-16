<style>
        .thumb{display:inline-block;vertical-align:baseline;overflow:hidden;padding-top:64px;height:0;width:64px;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-position:0 0;background-repeat:no-repeat;text-decoration:none;color:inherit}

        #port {
            margin: 0.58em 0px;
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
<section class="main">
    <section class="category">
        <div class="container" style="padding: 0px;">
            <div class="row">
                <div class="span12">
                    <div class="box" style="min-height:350px;margin-top:15px">
                        <p><h2>SLIDER READY STOCK</h2></p>
                        <div class="col-lg-12" id="port">
                            <ul class="thumbs_index index parallax-layer">
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/1.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/2.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/3.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/4.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/5.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/6.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/1.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/2.jpg');">item</a></li>
                                <li><a class="img_thumb thumb" href="#" style="background: url('http://webdev.stephband.info/jparallax/images/parallax_thumbnails/3.jpg');">item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <!-- Sidebar -->
                    <aside class="sidebar">
                        <div class="children">
                            <div class="box border-top">
                                <div class="hgroup title">
                                    <h3>
                                        <a href="{{$data['slugcategory']->slug}}" title="Ready Stock">{{ucwords($data['slugcategory']->name)}}</a>
                                    </h3>
                                </div>
                                @if($data['slugcategory']->subcategories == "1")
                                    <?php $sub=$data['slugcategory']->subcategory; ?>
                                    <div class="category-list secondary">
                                    @foreach($sub as $subcategory)
                                        <li>
                                            <a href="{{$data['slugcategory']->slug}}/{{$subcategory->slug}}" title="Shoes">
                                                <span class="count">{{ $subcategory->total_product }} </span>
                                                {{ ucwords($subcategory->subname) }}               
                                            </a>
                                        </li>
                                    @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Price filter -->
                        <div class="price-filter">
                            <div class="box border-top">
                                <div class="hgroup title">
                                    <h3>Refine products</h3>
                                </div>
                                <div style="margin-top:8px">
                                    <select class="form-control" >
                                        <option selected>Sort By</option>
                                        <option >Name</option>
                                        <option >Price</option>
                                        <option >Category</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End class="price-filter" -->
                        <!-- Latest reviews -->
                        <div class="widget LatestProductReviews">
                            <h3 class="widget-title widget-title ">Latest product reviews</h3>
                            <div class="ratings-small">
                                <li>
                                    <div class="image">
                                        <a title="View product" href="product.html">
                                            {!! Html::image('assets/image/thumbnails/avatar.png','',array('class' => 'gravatar', 'style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>Ebay seller</h6>
                                        <small>08/30/2013</small>
                                        <div class="rating rating-4">
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                    </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <a title="View product" href="product.html">
                                            {!! Html::image('assets/image/thumbnails/avatar.png','',array('class' => 'gravatar', 'style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>Victoria Spince</h6>
                                        <small>08/30/2013</small>
                                        <div class="rating rating-1">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <a title="View product" href="product.html">
                                            {!! Html::image('assets/image/thumbnails/avatar.png','',array('class' => 'gravatar', 'style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>Becca</h6>
                                        <small>08/30/2013</small>
                                        <div class="rating rating-4">
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </li>                                            
                            </div>
                        </div>
                        <!-- end class="widget LatestProductReviews" -->
                                    
                        <!-- Latest Products -->
                        <div class="widget LatestProducts">
                            <h3 class="widget-title widget-title ">What's new</h3>
                            <div class="product-list-small">
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Lolita">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_269_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Lolita">Lolita</a>
                                        </h6>
                                        <div class="price">
                                            £88.00                                      
                                        </div>
                                        <div class="rating rating-4">
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Mars">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_265_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Mars">Mars</a>
                                        </h6>
                                        <div class="price">
                                            £398.00                                     
                                        </div>
                                        <div class="rating rating-0">
                                            <a href="#">No reviews &mdash; be the first?</a>
                                        </div>
                                    </div>
                                </li>
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Anna Lace">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_261_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Anna Lace">Anna Lace</a>
                                        </h6>
                                        <div class="price">
                                            £38.00                                      
                                        </div>
                                        <div class="rating rating-4">
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </li>                                            
                            </div>
                        </div>
                        <!-- End class="widget LatestProducts" -->
                        <!-- Adverts -->
                        <div class="widget Partial">
                            <h3 class="widget-title widget-title ">New for Summer 2014</h3>
                            <div class="adverts">
                                <li>
                                    <a href="#" class="advert">
                                        {!! Html::image('assets/image/adverts/advert-1.jpg','', array('style' => 'max-width:100%')) !!}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="advert">
                                        {!! Html::image('assets/image/adverts/advert-2.jpg','', array('style' => 'max-width:100%')) !!}
                                    </a>
                                </li>
                            </div>
                        </div>
                        <!-- End class="widget Partial" -->
                        <!-- Products on Sale -->
                        <div class="widget Productsonsale">
                            <h3 class="widget-title widget-title ">Special offers</h3>
                            <div class="product-list-small">
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Dip Dye Panel Henley">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_57_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Dip Dye Panel Henley">Dip Dye Panel Henley</a>
                                        </h6>
                                        <div class="price">
                                            £48.00                      
                                            <del style="font-size: 10px;">£60.00</del> 
                                            <span class="label label-sale">Sale</span>
                                        </div>
                                        <div class="rating rating-4.5">
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Amelia Tote">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_44_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Amelia Tote">Amelia Tote</a>
                                        </h6>
                                        <div class="price">
                                            £48.00                      
                                            <del style="font-size: 10px;">£58.00</del> 
                                            <span class="label label-sale">Sale</span>
                                        </div>
                                        <div class="rating rating-0">
                                            <a href="#">No reviews &mdash; be the first?</a>
                                        </div>
                                    </div>
                                </li>
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Navy Polka Dot SS BD">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_175_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Navy Polka Dot SS BD">Navy Polka Dot SS BD</a>
                                        </h6>
                                        <div class="price">
                                            £131.99                     
                                            <del style="font-size: 10px;">£175.00</del> 
                                            <span class="label label-sale">Sale</span>
                                        </div>
                                        <div class="rating rating-0">
                                            <a href="#">No reviews &mdash; be the first?</a>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <!-- End  class="widget Productsonsale" -->
                        <!-- TopSellingProducts -->
                        <div class="widget TopSellingProducts">
                            <h3 class="widget-title widget-title ">Top selling products</h3>
                            <div class="product-list-small">
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="El Silencio">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_32_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>

                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="El Silencio">El Silencio</a>
                                        </h6>

                                        <div class="price">
                                            £55.00                                      
                                        </div>

                                         <div class="rating rating-3">
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Lisette Dress">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_48_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>

                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Lisette Dress">Lisette Dress</a>
                                        </h6>

                                        <div class="price">
                                            £58.00                                      
                                        </div>

                                        <div class="rating rating-0">
                                            <a href="#">No reviews &mdash; be the first?</a>
                                        </div>
                                    </div>
                                </li>
                                <li>            
                                    <div class="image">
                                        <a href="product.html" title="Dustbowl Snapback">
                                            {!! Html::image('assets/image/thumbnails/db_file_img_34_160xauto.jpg','', array('style' => 'max-width:100%')) !!}
                                        </a>
                                    </div>

                                    <div class="desc">
                                        <h6>
                                            <a href="product.html" title="Dustbowl Snapback">Dustbowl Snapback</a>
                                        </h6>

                                        <div class="price">
                                            £28.00                                      
                                        </div>

                                        <div class="rating rating-0">
                                            <a href="#">No reviews &mdash; be the first?</a>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <!-- End  class="widget TopSellingProducts" -->          
                        <!-- This month only! widget -->
                        <div class="widget Text">
                            <h3 class="widget-title widget-title ">This month only!</h3>
                            <h5>Free UK shipping!</h5>
                            <h6><i class="icon-gift"> &nbsp; </i> Free gift wrap</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
                            <a class="btn btn-primary" href="#">
                                BUY NOW <em>for</em> $85
                            </a>
                        </div>
                        <!-- End class="widget Text" -->               
                    </aside>
                     <!-- End sidebar -->
                </div>
                <div class="span9">
                    <?php // ============================ Banner 1 ================================= ?>
                    <div class="col-lg-6" style="margin: 0px;padding: 0px 5px 0 5px;" >
                        <div class="box text-center" style="min-height:250px">
                            <h2>BANNER 1</h2>
                        </div>
                    </div>
                    <?php // ============================ Banner 2 ================================= ?>
                    <div class="col-lg-6" style="margin: 0px;padding: 0px 5px 0 5px;" >
                        <div class="box text-center" style="min-height:250px">
                            <h2>BANNER 2</h2>
                        </div>
                    </div>
                </div>
                <div class="span9">
                    <!-- Products list -->
                    <div class="product-list isotope">
                        <li class="standard" data-price="58">
                            <a href="product.html" title="Lisette Dress">
                                <div class="image img-responsive">
                                    {!! Html::image('assets/image/thumbnails/db_file_img_48_640xauto.jpg','', array('class' => 'primary')) !!}
                                </div>
                                <div class="title">
                                    <div class="prices">
                                        <span class="price">£58.00</span>
                                    </div>
                                       <h3>Lisette Dress</h3>
                                </div>
                            </a>
                        </li>
                        <li class="standard" data-price="58">
                            <a href="product.html" title="El Silencio">
                                <div class="image">
                                    {!! Html::image('assets/image/thumbnails/db_file_img_48_640xauto.jpg','', array('class' => 'primary')) !!}
                                    {!! Html::image('assets/image/thumbnails/db_file_img_49_640xauto.jpg','', array('class' => 'secondary')) !!}
                                    <span class="badge badge-sale">SALE</span>
                                </div>
                                <div class="title">
                                    <div class="prices">
                                        <del class="base">£58.00</del> 
                                        <span class="price">£57.99</span> 
                                    </div>
                                       <h3>El Silencio</h3>
                                </div>

                            </a>
                        </li>
                        <li class="standard" data-price="58">
                            <a href="product.html" title="Malta Dress">
                                <div class="image">
                                    {!! Html::image('assets/image/thumbnails/db_file_img_48_640xauto.jpg','', array('class' => 'primary')) !!}
                                    {!! Html::image('assets/image/thumbnails/db_file_img_49_640xauto.jpg','', array('class' => 'secondary')) !!}
                                </div>
                                <div class="title">
                                    <div class="prices">
                                        <span class="price">£88.00</span>
                                    </div>
                                    <h3>Malta Dress</h3>
                                    <div class="rating rating-5">
                                        <i class=" clfa fa-heart"></i>
                                        <i class=" clfa fa-heart"></i>
                                        <i class=" clfa fa-heart"></i>
                                        <i class=" clfa fa-heart"></i>
                                        <i class=" clfa fa-heart"></i>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="standard" data-price="38">
                            <a href="product.html" title="El Paso Tank">
                                <div class="image">
                                    {!! Html::image('assets/image/thumbnails/db_file_img_48_640xauto.jpg','', array('class' => 'primary')) !!}
                                    {!! Html::image('assets/image/thumbnails/db_file_img_49_640xauto.jpg','', array('class' => 'secondary')) !!}
                                </div>
                                <div class="title">
                                    <div class="prices">
                                        <span class="price">£38.00</span>
                                    </div>
                                    <h3>El Paso Tank</h3>
                                    <div class="rating rating-4.5">
                                    <i class="fa fa-heart"></i>
                                    <i class="fa fa-heart"></i>
                                    <i class="fa fa-heart"></i>
                                    <i class="fa fa-heart"></i>
                                    <i class="fa fa-heart"></i>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </div>
                    <!-- End class="product-list isotope" --> 
                    <!-- "Load More" Button -->
                    <button id="load_more" class="btn btn-block" data-category="16" data-rows="20" data-page="1" data-featured="true">
                        <span>Load more</span> &nbsp; <i class="icon-spinner icon-spin icon-large"></i>
                    </button>         
                    <!-- End "Load More" Button -->
                </div>
            </div>
        </div>
    </section>
</section>
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