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
                                    <img src="{{url('photo_product/'.$image[0])}}" class="primary">
                                    <?php if(count($image) == 1): else: ?>
                                        <img src="{{url('photo_product/'.$image[1])}}" class="secondary">
                                    <?php endif; ?>
                                </div>
                                <div class="title">
                                <div class="prices">
                                        <span class="price">Rp. {{ number_format($product->price, 0, ",", ".") }}</span>
                                    </div>
                                    <h3>{{ucwords($product->name)}}</h3>
                                    
                                    <div class="rating">
                                    @if($product->rating > 0)
                                    <?php 
                                        $stars = $product->rating/count($product->reviews);
                                        for ($i=0; $i < $stars; $i++) { 
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                        }
                                    ?>
                                    {{count($product->reviews)}} review
                                    @endif
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
        $('#content').css('display', 'none');
        e.preventDefault();
        var url = $(this).attr('href');
        var category_id = $('#slug_category').val();
        var subcategory_id = $('#slug_subcategory').val();
        var sortby = $('#sort').val();
        if (sortby == undefined) {
            var sortby = 'name';
        };
        $.ajax({
            url: url ,
            data: (subcategory_id == undefined ) ? {
                sortby: sortby,
                category_id: category_id
            } : {
                sortby: sortby,
                category_id: category_id,
                subcategory_id: subcategory_id
            },
            method:'POST',
        }).done(function(data){
            $('#content').html(data);
            $('#content').fadeIn();
        });
        
    });

</script>