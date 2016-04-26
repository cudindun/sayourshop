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
                                    <select class="form-control" style="margin-top:8px">
                                        <option selected> - - - </option>
                                        <option >Name</option>
                                        <option >Price</option>
                                        <option >Category</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End class="price-filter" -->                     
                    </aside>
                     <!-- End sidebar -->
                </div>
                <input type="hidden" value="{{$data['slugcategory']->id}}" id="slug_category"></input>
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
                <div id="content"></div>
            </div>
        </div>
    </section>
</section>
<?php //Java script for this page  ?>
@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(){
        var category_id = $('#slug_category').val();
        $.ajax({
            url: "{!! url('product_content') !!}",
            data: {
                category_id: category_id
            },
            method:'POST',
        }).done(function(data){
            $('#content').html(data);
        });
    });  
</script>

@stop