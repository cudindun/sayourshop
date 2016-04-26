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
                    <div style="min-height:350px;margin-top:15px">
                        @if($data['banner'])
                        <?php $banner = unserialize($data['banner']->meta_value);?>
                        <div class="col-lg-12" style="padding: 0px;margin: 0px;">
                            <img src="{{url('application/storage/photo_banner/'.$banner['banner1'])}}">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="span2">
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
                                    <h3>Filter products</h3>
                                </div>
                                <div style="margin-top:8px">
                                    <h7>Sort By : </h7>
                                    <select id="sort-by" class="form-control" style="margin-top:8px">
                                        <option selected> - - - </option>
                                        <option value="name">Name</option>
                                        <option value="price">Price</option>
                                        <option value="category">Category</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End class="price-filter" -->                     
                    </aside>
                     <!-- End sidebar -->
                </div>
                <div class="span10">
                    <?php // ============================ Banner 1 ================================= ?>
                    <div class="col-lg-6" style="margin: 0px;padding: 0px;" >
                            <img src="{{url('application/storage/photo_banner/'.$banner['banner2'])}}">
                    </div>
                    <?php // ============================ Banner 2 ================================= ?>
                    <div class="col-lg-6" style="margin: 0px;padding: 0px;min-height: 100px;" >
                            <img src="{{url('application/storage/photo_banner/'.$banner['banner3'])}}">
                    </div>
                </div>
                <hr>
                <div class="span10" style="padding-top: 10px;">
                    <!-- Products list -->
                    <div class="product-list isotope" id="product-list">
                    @foreach($data['product'] as $product)
                        <?php
                            $image = unserialize($product->image);
                        ?>
                        <li class="standard" style="width: 220px;">
                            <a href="{{url('produk/'.$product->category->slug.'/'.$product->subcategory->slug.'/'.$product->id)}}" title="Lisette Dress">
                                <div class="image img-responsive">
                                    <img height="220px" src="{{url('application/storage/photo_product/'.$image[0])}}" class="primary">
                                    <?php if(count($image) == 1): else: ?>
                                        <img height="220px" src="{{url('application/storage/photo_product/'.$image[1])}}" class="secondary">
                                    <?php endif; ?>
                                </div>
                                <div class="title">
                                    <div class="prices">
                                        <span class="price" data-type="price">Rp. {{ number_format($product->price, 0, ",", ".") }}</span>
                                    </div>
                                    <h3 id="nama">{{ucwords($product->name)}}</h3>
                                    
                                    <div class="rating rating-4.5">

                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    
                                    </div>

                                </div>
                            </a>
                        </li>

                    @endforeach
                    </div>
                    <!-- End class="product-list isotope" --> 
                    <!-- "Load More" Button -->
                    <?php $products = $data['product']?>
                    <div align="center">
                        {!! $products->render(); !!}    
                    </div>  

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