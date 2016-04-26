<div class="span10 posts" style="padding-top: 10px;">
                    <!-- Products list -->
                    <div class="product-list isotope">
                    @foreach($data['product'] as $product)
                        <?php
                            $image = unserialize($product->image);
                        ?>
                        <li class="standard" data-price="28" style="width: 220px;">
                            <a href="{{url('produk/'.$product->category->slug.'/'.$product->subcategory->slug.'/'.$product->id)}}" title="Lisette Dress">
                                <div class="image img-responsive">
                                    <img height="220px" src="{{url('application/storage/photo_product/'.$image[0])}}" class="primary">
                                    <?php if(count($image) == 1): else: ?>
                                        <img height="220px" src="{{url('application/storage/photo_product/'.$image[1])}}" class="secondary">
                                    <?php endif; ?>
                                </div>
                                <div class="title">
                                <div class="prices">
                                        <span class="price">Rp. {{ number_format($product->price, 0, ",", ".") }}</span>
                                    </div>
                                    <h3>{{ucwords($product->name)}}</h3>
                                    
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
                        {!! $products->render() !!}    
                    </div>  
                    <!-- End "Load More" Button -->
                </div>
<script type="text/javascript">
    $('.pagination a').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var page = url.substr(-6);
        var category_id = $('#slug_category').val();
        $.ajax({
            url: url,
            data: {
                category_id: category_id
            },
            method:'POST',
        }).done(function(data){
            $('#content').html(data);
        });
    });

</script>