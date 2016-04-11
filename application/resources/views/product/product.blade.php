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
                                            <a href="{{ url('produk/'.$data['slugcategory']->slug.'/'.$subcategory->slug) }}" title="Shoes">
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
                    @foreach($data['product'] as $product)
                        <?php
                            $image = unserialize($product->image);
                        ?>
                        <li class="standard" data-price="58">
                            <a href="{{url('produk/'.$product->category->slug.'/'.$product->subcategory->slug.'/'.$product->id)}}" title="Lisette Dress">
                                <div class="image img-responsive">
                                    <img src="{{url('application/storage/photo_product/'.$image[0])}}" class="primary">
                                    <img src="{{url('application/storage/photo_product/'.$image[1])}}" class="secondary">
                                </div>
                                <div class="title">
                                    <div class="prices">
                                        <span class="price">Rp. {{ number_format($product->price, 0, ",", ".") }}</span>
                                    </div>
                                    <h3>{{ucwords($product->name)}}</h3>
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
                    @endforeach
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