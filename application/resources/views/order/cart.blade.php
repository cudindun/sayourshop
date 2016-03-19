<!-- Cart container -->
<section class="cart" style="margin-top:20px">
    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="col-lg-9">
                             
            <!-- Cart -->
                <div class="box">
                    <form enctype="multipart/form-data" action="{{url('update_order')}}" method="get" />
                                       
                        <div class="box-header">
                            <h3>Keranjang Belanja</h3>
                            <h5>Anda memiliki <strong>{{ Cart::count() }}</strong> barang di keranjang</h5>
                        </div>
                        <div class="box-content">
                            <div class="cart-items table-responsive">
                                <table class="styled-table">
                                    <thead>
                                        <tr>
                                            <th class="col_product text-left">Produk</th>
                                            <th class="col_properties text-left">Atribut</th>
                                            <th class="col_remove text-right">&nbsp;</th>
                                            <th class="col_qty text-right">Jumlah</th>
                                            <th class="col_single text-right">Harga</th>
                                            <th class="col_total text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['cart'] as $product)									
                                        <tr>
                                            <td class="col_product text-left">
                                                <div class="image visible-desktop">
                                                    <a href="product.html">
                                                        {!! Html::image('assets/image/thumbnails/db_file_img_230_60xauto.jpg', 'Helen Romper') !!}
                                                    </a>
                                                </div>
                                                <h5>
                                                    <a href="product.html">{{$product->name}}</a>
                                                </h5>
                                            </td>

                                            <td class="col_properties text-left">
                                                <a href="#">
                                                    {{$product->options}}
                                                </a>
                                            </td>

                                            <td class="col_remove text-right">
                                                <a href="{{ url('delete_order/'.$product->rowid) }}">
                                                    <i class="fa fa-trash icon-large"></i>
                                                    <input type="hidden" name="row_id" value="{{$product->rowid}}" />
                                                </a>
                                            </td>

                                            <td class="col_qty text-right">
                                                <input type="text" name="quantity_{{$product->rowid}}" value="{{$product->qty}}" />
                                            </td>

                                            <td class="col_single text-right">
                                                <span class="single-price">Rp. {{ number_format($product->price, 0, ",", ".") }}</span>
                                            </td>

                                            <td class="col_total text-right">
                                                <span class="total-price">Rp. {{ number_format($product->subtotal, 0, ",", ".") }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{url('/')}}" class="btn btn-small">
                                    <i class="fa fa-chevron-left"></i> &nbsp; Lanjut Belanja
                                </a>			
                            </div>

                            <div class="pull-right">
                            
                                <button class="btn btn-small mm20" type="submit">
                                    <i class="fa fa-undo"></i> &nbsp; Perbaharui Keranjang
                                </button>
                            
                            <a href="{{url('checkout_order')}}">
                                <button type="button" name="checkout" class="btn btn-primary btn-small mm20">
                                    Checkout &nbsp; <i class="fa fa-chevron-right"></i>
                                </button>
                            </a>
                            </div>
                        </div>
                    </form>			
                </div>
                <!-- End Cart -->
            </div>

                    <div class="col-lg-3">
                                
                    <!-- Cart details -->
                        <div class="cart-details">
                            <div class="box">
                                <div class="hgroup title">
                                    <h3>Total Pemesanan</h3>
                                    <h5>Biaya untuk ongkos kirim dihitung setelah checkout</h5>
                                </div>

                                <ul class="price-list">
                                    <li>Subtotal: <strong>Rp. {{ number_format(Cart::total(), 0, ",", ".") }}</strong></li>
                                    <li class="important">Total: <strong>Rp. {{ number_format(Cart::total(), 0, ",", ".") }}</strong></li>
                                </ul>
                            </div>
                        </div>
                    <!-- End class="cart-details" -->
                                
                    <!-- Coupon -->
                        <div class="coupon">
                            <div class="box">
                                <div class="hgroup title">
                                    <h3>Coupon code</h3>
                                    <h5>Enter your coupon here to redeem</h5>
                                </div>

                                <form class="form-horizontal" enctype="multipart/form-data" action="/" method="post">
                                    <label for="coupon_code">Coupon code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="exampleInputName2" placeholder="" >
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" style="height:34px"><i class="fa fa-check"></i></button>
                                        </span>
                                    </div>
                                </form>		
                            </div>
                        </div>
                    <!-- End class="coupon" -->
                               
                </div>
            </div>
        </div>	
    </section>         
<!-- End Cart container -->

    <section class="pagination-product" style="margin-top:40px;margin-bottom:15px">
        <div class="container">
            <div class="row">
                <div class="box">
                    PAGINATION PRODUCT SEJENIS<br/>
                    &nbsp;<br/>
                    &nbsp;<br/>
                    &nbsp;<br/>
                </div>
            </div>
        </div>
    </section>