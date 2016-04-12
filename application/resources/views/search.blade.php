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
                    <div class="box">
                        <p>
                            <h6> 
                                Hasil Pencarian "<b>{{$data['name']}}</b>"
                                <div class="pull-right">
                                    <select class="form-control" >
                                        <option selected>Urut Berdasarkan</option>
                                        <option >Name</option>
                                        <option >Price</option>
                                        <option >Category</option>
                                    </select>
                                </div>
                            </h6>
                        </p>
                    </div>
                </div>
                <div class="span2">
                    <!-- Sidebar -->
                    <aside class="sidebar">
                        <div class="children">
                            <div class="box border-top">
                                <div class="hgroup title">
                                    <h3>
                                        <a href="#" title="Kategori">Kategori</a>
                                    </h3>
                                </div>
                                <div class="category-list secondary">
                                    @foreach($data['category'] as $category)
                                    <li>
                                        <a href="#" title="{{ucwords($category->name)}}">
                                            {{ucwords($category->name)}}            
                                        </a>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>           
                    </aside>
                     <!-- End sidebar -->
                </div>
                <div class="span10">
                    @if($data['query'] != '')
                    <!-- Products list -->
                        <div class="product-list isotope">
                            @foreach($data['query'] as $product)
                            <?php
                                $image = unserialize($product->image);
                            ?>
                                <li class="standard" style="width: 220px;">
                                    <a href="{{url('produk/'.$product->category->slug.'/'.$product->subcategory->slug.'/'.$product->id)}}" title="{{$produc->name}}">
                                        <div class="image img-responsive">
                                            <img height="220px" src="{{url('application/storage/photo_product/'.$image[0])}}" class="primary">
                                            <img height="220px" src="{{url('application/storage/photo_product/'.$image[1])}}" class="secondary">
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
                        </div>
                    <!-- End class="product-list isotope" -->
                    @endif 
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