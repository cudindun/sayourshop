<section class="main">
    <section class="product">
        <!-- Product info -->
        <section class="product-info">
            <div class="container" style="padding-left: 0px;padding-right: 0px;">
                <div class="row">
                    <div class="span4">
                        <div class="product-images">
                            <div class="box">
                                <div class="primary">
                                    <img src="{{asset('assets/image/thumbnails/db_file_img_228_480xauto.jpg')}}" data-zoom-image="{{asset('assets/image/thumbnails/db_file_img_228_480xauto.jpg')}}" alt="Chaser Overalls" style="max-width:100%;position:relative!IMPORTANT;" />
                                </div>
                                <div class="thumbs" id="gallery" align="center">
                                    <ul class="thumbs-list">
                                        <li>
                                            <a class="active" href="#" data-image="{{ asset('assets/image/thumbnails/db_file_img_228_160xauto.jpg')}}" title="Chaser Overalls" data-zoom-image="{{ asset('assets/image/thumbnails/db_file_img_228_160xauto.jpg')}}">
                                                <img style="max-width: 100%;" src="{{ asset('assets/image/thumbnails/db_file_img_228_160xauto.jpg')}}" alt="Chaser Overalls" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-image="{{ asset('assets/image/thumbnails/db_file_img_229_160xauto.jpg')}}" title="Chaser Overalls" data-zoom-image="{{ asset('assets/image/thumbnails/db_file_img_229_160xauto.jpg')}}">
                                                <img style="max-width: 100%;" src="{{ asset('assets/image/thumbnails/db_file_img_229_160xauto.jpg')}}" alt="Chaser Overalls" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-image="{{ asset('assets/image/thumbnails/db_file_img_227_160xauto.jpg')}}" title="Chaser Overalls" data-zoom-image="{{ asset('assets/image/thumbnails/db_file_img_227_160xauto.jpg')}}">
                                                <img style="max-width: 100%;" src="{{ asset('assets/image/thumbnails/db_file_img_227_160xauto.jpg')}}" alt="Chaser Overalls" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                            <!-- <div class="social">
                            <div id="sharrre">
                                <div class="exfacebook sharrre"><button class="btn btn-mini btn-facebook"><i class="icon-facebook"></i> &nbsp; 12</button></div>
    
                                <div class="extwitter sharrre"><button class="btn btn-mini btn-twitter"><i class="icon-twitter"></i> &nbsp; 3</button></div>
    
                                <div class="googleplus sharrre"><button class="btn btn-mini btn-googleplus"><i class="icon-google-plus"></i> &nbsp; 19</button></div>
    
                                <div class="pinterest sharrre"><button class="btn btn-mini btn-pinterest"><i class="icon-pinterest"></i> &nbsp; 64</button></div>
                            </div>
                                            </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="span8">
                        <!-- Product content -->
                        <div class="product-content">
                            <div class="box">
                                <!-- Tab panels' navigation -->
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#product" data-toggle="tab">
                                            <i class="icon-reorder icon-large"></i>
                                            <span class="hidden-phone">Produk</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#shipping" data-toggle="tab">
                                            <i class="icon-truck icon-large"></i>
                                            <span class="hidden-phone">Shipping</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#returns" data-toggle="tab">
                                            <i class="icon-undo icon-large"></i>
                                            <span class="hidden-phone">Returns</span>
                                        </a>
                                    </li>
                                    <li>
                                         <a href="#ratings" data-toggle="tab">
                                            <i class="icon-heart icon-large"></i>
                                            <span class="hidden-phone">Ratings</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Tab panels' navigation -->
                                <!-- Tab panels container -->
                                <div class="tab-content">
                                    <!-- Product tab -->
                                    <div class="tab-pane active" id="product">
                                        <form enctype="multipart/form-data" action="{{url('order')}}" method="post" />
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="name" value="{{ucwords($data['product']->name)}}">
                                        <input type="hidden" name="price" value="{{$data['product']->price}}">
                                        <input type="hidden" name="id" value="{{$data['product']->id}}">
                                            <div class="details">
                                                <h1>{{ucwords($data['product']->name)}}</h1>
                                                <div class="prices">
                                                    <span class="price">Rp. {{ number_format($data['product']->price, 0, ",", ".") }}</span>
                                                </div>
                                                <div class="meta">
                                                    <div class="sku">
                                                        <i class="icon-pencil"></i>
                                                        <span rel="tooltip" title="SKU is 0092">Terjual</span>
                                                    </div>
                                                    <div class="categories">
                                                        <span><i class="icon-tags"></i><a href="#" title="Dresses">{{$data['product']->sold}}</a></span>
                                                    </div>
                                                    <div class="sku">
                                                        <i class="icon-pencil"></i>
                                                        <span rel="tooltip" title="SKU is 0092">Berat</span>
                                                    </div>
                                                    <div class="categories">
                                                        <span id="weight" name="weight"><i class="icon-tags"></i><a href="#" title="Dresses">{{$data['product']->weight}} g</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="short-description">
                                                <p>{{$data['product']->desc}}</p>
                                            </div>
                                            <div class="options">
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label for="product_options" class="control-label">Jumlah</label>
                                                            <div class="controls">
                                                                <input type="number" id="quantity" name="quantity" min="1" value="1" class="span12"></input>
                                                            </div>
                                                        </div>

                                                        @if($data['product']->properties)
                                                        <?php  $properties = unserialize($data['product']->properties);?>
                                                            @foreach($properties as $key => $value)

                                                                <div class="control-group">
                                                                    <label for="product_options" class="control-label">{{$key}}</label>
                                                                    <div class="controls">
                                                                        <select id="{{$key}}" name="{{$key}}" class="span12">
                                                                            @foreach($value as $a)
                                                                            <option name="{{$key}}" value="{{$a}}" />{{$a}}
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <?php 
                                                                // echo "<pre>";
                                                                // echo "{$key} = {$value}\n";
                                                                // echo "<pre>"; 
                                                                ?>
                                                            @endforeach
                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="btn btn-primary btn-large" type="submit">
                                                    <i class="icon-plus"></i> &nbsp; Add to cart
                                                </button>
                                                <a href="{{url('tes_properti')}}">
                                                    <button class="btn btn-primary btn-large" type="button">
                                                        <i class="icon-plus"></i> &nbsp; Properti
                                                    </button>
                                                </a>
                                            </div>
                                        </form>                     
                                    </div>
                                    <!-- End id="product" -->
                                    <!-- Shipping tab -->
                                    <div class="tab-pane" id="shipping">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        </p>
                                        <p>
                                            <img class="img-polaroid" src="http://www.tfingi.com/repo/royal-mail.png" alt="" />
                                            <img class="img-polaroid" src="http://www.tfingi.com/repo/ups-logo.png" alt="" />
                                        </p>
                                        <p>
                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                        </p>
                                        <h6>
                                            <em class="icon-gift"></em>Giftwrap?
                                        </h6>
                                        <p>
                                            Let us take care of giftwrapping your presents by selecting <strong>Giftwrap</strong> in the order process. Eligible items can be giftwrapped for as little as &pound;0.99, and larger items may be presented in gift bags.
                                        </p>                      
                                    </div>
                                    <!-- End id="shipping" -->
                                    <!-- Returns tab -->
                                    <div class="tab-pane" id="returns">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                        </p>
                                        <p class="lead">
                                            For any unwanted goods La Boutique offers a <strong>21-day return policy</strong>.
                                        </p>
                                        <p>
                                            If you receive items from us that differ from what you have ordered, then you must notify us as soon as possible using our <a href="#">online contact form</a>.
                                        </p>
                                        <p>
                                            If you find that your items are faulty or damaged on arrival, then you are entitled to a repair, replacement or a refund. Please note that for some goods it may be disproportionately costly to repair, and so where this is the case, then we will give you a replacement or a refund.
                                        </p>
                                        <p>
                                            Please visit our <a href="#">Warranty section</a> for more details.
                                        </p>                      
                                    </div>
                                    <!-- End id="returns" -->
                                    <!-- Ratings tab -->
                                    <div class="tab-pane" id="ratings">
                                        <div class="ratings-items">
                                            <article class="rating-item">
                                                <div class="row-fluid">
                                                    <div class="span9">
                                                        <h5>Shaped for crush</h5>
                                                        <p>
                                                            I hope they release some more colours of this dress. It feels great and looks sexier.<br />
                                                            <br />
                                                            I love it!
                                                        </p>
                                                    </div>
                                                    <div class="span3">
                                                        <img src="{{asset('assets/image/thumbnails/avatar.png')}}" class="gravatar" alt="" />
                                                        <h6>Sam Ritora</h6>
                                                        <small>08/30/2013</small>
                                                        <div class="rating rating-5">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <hr />
                                        </div>
                                        <div class="well">
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <h6><i class="icon-comment-alt"></i> &nbsp; Share your opinion!</h6>
                                                    <p>Let other people know your thoughts on this product!</p>
                                                </div>
                                                <div class="span4">
                                                    <button type="button" class="btn btn-seconary btn-block" data-toggle="modal" data-target="#myModal">Rate this product</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Review modal window -->
                                        <div id="myModal" class="modal fade" role="dialog" align="center">
                                            <form enctype="multipart/form-data" action="/product/chaser-overalls" method="post" />
                                                <!-- <input type="hidden" name="ls_session_key" value="lsk52286509c22077.63404603" />         -->
                                                <div class="modal-content span6">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <div class="hgroup title">
                                                            <h3>Modal header</h3>
                                                            <h5>Modal header</h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label class="control-label">Rating</label>
                                                                    <div class="controls">
                                                                        <select class="span12" name="rate">
                                                                            <option value="1" />1
                                                                            <option value="2" />2
                                                                            <option value="3" />3
                                                                            <option value="4" />4
                                                                            <option value="5" />5
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label for="review_title" class="control-label">Review title</label>
                                                                    <div class="controls">
                                                                        <input class="span12" id="review_title" name="review_title" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label for="review_author_name" class="control-label">Your name</label>
                                                                    <div class="controls">
                                                                        <input class="span12" id="review_author_name" name="review_author_name" type="text" value="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label for="review_author_email" class="control-label">Your email</label>
                                                                    <div class="controls">
                                                                        <input class="span12" id="review_author_email" name="review_author_email" type="text" value="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span12">
                                                                <div class="control-group">
                                                                    <label for="review_text" class="control-label">Review</label>
                                                                    <div class="controls">
                                                                        <textarea class="span12" id="review_text" name="review_text"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="pull-right">
                                                            <button class="btn btn-primary" type="submit" onclick="">Submit product review</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End id="review_form" -->
                                    </div>
                                    <!-- End id="ratings" -->        
                                </div>                                            
                                <!-- End tab panels container -->            
                            </div>
                        </div>                                    
                        <!-- End class="product-content" -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End class="product-info" -->
        <!-- Product Reviews -->
        <section class="product-reviews">
            <div class="container">
                <div class="span8 offset2">
                    <h5>Tell us why you <span class="script">love <em class="icon-heart"></em></span> this product</h5>
                    <!-- Facebook comments -->
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="fb-comments" data-width="730" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
                    <!-- <div class="fb-comments" data-width="730" data-href="http://la-boutique.twindots.com/product/chaser-overalls" data-num-posts="10"></div> -->
                                <!-- End Facebook comments -->     
                </div>
            </div>      
        </section>
        <!-- End class="product-reviews" -->
        <!-- Related products -->
        <section class="product-related">
            <div class="container" style="padding: 0px;">
                <div class="span12" style="margin-left: 0px;">
                    <h5>Can't find what you're looking for? Why not try these&hellip;</h5>
                    <div class="product-list isotope">
                        <li class="standard" data-price="160">
                            <a href="product.html" title="1300 in Grey">
                                <div class="image">
                                    <img class="primary" src="{{ asset('assets/image/thumbnails/db_file_img_228_160xauto.jpg')}}" alt="Lisette Dress" />
                                    <img class="secondary" src="{{ asset('assets/image/thumbnails/db_file_img_229_160xauto.jpg')}}" alt="Lisette Dress" />
                                </div>
                                <div class="title">
                                    <div class="prices"><span class="price">£160.00</span></div>
                                    <h3>1300 in Grey</h3>
                                </div>
                            </a>
                        </li>
                        <li class="standard" data-price="75">
                            <a href="product.html" title="574 In Navy">
                                <div class="image">
                                    <img class="primary" src="{{ asset('assets/image/thumbnails/db_file_img_137_640xauto.jpg')}}" alt="El Silencio" />
                                    <img class="secondary" src="{{ asset('assets/image/thumbnails/db_file_img_138_640xauto.jpg')}}" alt="El Silencio" />
                                </div>
                                <div class="title">
                                    <div class="prices"><span class="price">£75.00</span></div>
                                    <h3>574 In Navy</h3>
                                </div>
                            </a>
                        </li>
                        <li class="standard" data-price="70">
                            <a href="product.html" title="574 In Red">
                                <div class="image">
                                    <img class="primary" src="{{ asset('assets/image/thumbnails/db_file_img_122_640xauto.jpg')}}" alt="" />
                                    <img class="secondary" src="{{ asset('assets/image/thumbnails/db_file_img_123_640xauto.jpg')}}" alt="" />
                                </div>
                                <div class="title">
                                    <div class="prices"><span class="price">£70.00</span></div>
                                    <h3>574 In Red</h3>
                                </div>
                            </a>
                        </li>
                        <li class="standard" data-price="70">
                            <a href="product.html" title="574 In Red">
                                <div class="image">
                                    <img class="primary" src="{{ asset('assets/image/thumbnails/db_file_img_122_640xauto.jpg')}}" alt="" />
                                    <img class="secondary" src="{{ asset('assets/image/thumbnails/db_file_img_123_640xauto.jpg')}}" alt="" />
                                </div>
                                <div class="title">
                                    <div class="prices"><span class="price">£70.00</span></div>
                                    <h3>574 In Red</h3>
                                </div>
                            </a>
                        </li>
                    </div>
                </div>
            </div>  
        </section>                    
        <!-- End class="products-related" -->
        <!-- Added to cart modal window -->
        <div name="added" id="added" class="modal hide fade" tabindex="-1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="hgroup title">
                    <h3>You're one step closer to owning this product!</h3>
                    <h5>"Chaser Overalls" has been added to your cart</h5>
                </div>
            </div>
            <div class="modal-footer">  
                <div class="pull-right">                
                    <a href="cart.html" class="btn btn-primary btn-small">
                        Go to cart &nbsp; <i class="icon-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- End id="added" -->
    </section>
</section>
@section('script')

	<script type="text/javascript">
        $("#quantity").on("keydown", function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});

	    $("#zoom-image").elevateZoom({cursor: "pointer", galleryActiveClass: "active", scrollZoom : true , imageCrossfade: true, loadingIcon: "http://www.elevateweb.co.uk/spinner.gif"});
    </script>

    <script id="dsq-count-scr" src="//sayourshop.disqus.com/count.js" async></script>
@stop