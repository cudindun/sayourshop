                    <!-- Products list -->
                        <div class="product-list isotope">
                            @foreach($data['query'] as $product)
                            <?php
                                $image = unserialize($product->image);
                            ?>
                                <li class="standard" style="width: 220px;">
                                    <a href="{{url('produk/'.$product->category->slug.'/'.$product->subcategory->slug.'/'.$product->id)}}" title="{{$product->name}}">
                                        <div class="image img-responsive">
                                            <img src="{{url('photo_product/2_'.$image[0])}}" class="primary">
                                        </div>
                                        <div class="title">
                                            <div class="prices">
                                                <span class="price">Rp. {{ number_format($product->price, 0, ",", ".") }}</span>
                                            </div>
                                            <?php if (strlen($product->name) > 30) { ?>
                                                <h3>{{ucwords(substr($product->name, 0, 30))}}...</h3>
                                            <?php }else if(strlen($product->name) < 16) { ?>
                                                <h3>{{ucwords($product->name)}}<br>&nbsp;</h3> 
                                            <?php }else{ ?>
                                                <h3>{{ucwords($product->name)}}</h3>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </div>
                    <!-- End class="product-list isotope" -->
                 
                    <!-- "Load More" Button -->
                    <?php $products = $data['query']?>
                    <div align="center">
                        {!! $products->render() !!}    
                    </div>         
                    <!-- End "Load More" Button -->
    <script type="text/javascript">
        $('.pagination a').click(function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var search = $('#pencarian').val();
            var category = $('#search_category').val();
            var sortby = $('#sort').val();
            if (sortby == undefined) {
                var sortby = 'name';
            }
            $.ajax({
                url: url,
                data: (category == undefined) ? {
                    sortby: sortby,
                    search: search
                } : {
                    sortby: sortby,
                    search: search,
                    category_id:category
                },
                method:'GET',
            }).done(function(data){
                $('#search_content').html(data);
            });
            
        });
    </script>