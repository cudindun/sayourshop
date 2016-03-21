 <!-- Checkout / Billing Address -->
    <section class="checkout" style="margin-top:20px">
        <div class="container" style="padding: 0px;">
                <div class="row">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="span9">
                        <div class="box">
                            <!-- Checkout progress -->
                            <div id="checkout-progress">
                                <ul class="nav nav-tabs">
                                    <li class="active" style="text-align: center;">
                                         <a href="{{url('keranjang')}}" data-toggle="tab">
                                            <i class="fa fa-map-marker fa-2x"></i>
                                            <span>Keranjang</span>
                                        </a>
                                    </li>
                                    <li style="text-align: center;">
                                        <a href="{{url('checkout_order')}}">
                                            <i class="fa fa-envelope-square fa-2x"></i>
                                            <span>Alamat Pengiriman</span>
                                        </a>
                                    </li>
                                </ul>                   
                            </div>
                            <!-- End id="checkout-progress" -->
                            <!-- Checkout content -->
                            <div id="tab-content">
                                <div class="tab-pane active" id="cart" role="presentation">
                                <form enctype="multipart/form-data" action="{{ url('update_order') }}" method="get" />
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
                                                        <th class="col_properties text-left">Properti</th>
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
                                                                <h5>
                                                                    <a href="{{url ('detail/'.$product->id) }}">{{$product->name}}</a>
                                                                </h5>
                                                            </td>
                                                            <td class="col_properties text-left">
                                                                @foreach( $product->options as $key => $value)
                                                                    {{ucwords($key.' : '.$value)}}<br>
                                                                @endforeach
                                                            </td>
                                                            <td class="col_remove text-right">
                                                                <a href="{{ url('delete_order/'.$product->rowid) }}">
                                                                    <span rel="tooltip" title="Hapus"><i class="fa fa-trash icon-large"></i></span>
                                                                    <input type="hidden" name="row_id" value="{{$product->rowid}}" />
                                                                </a>
                                                            </td>
                                                            <td class="col_qty text-right">
                                                                <input type="text" name="quantity_{{$product->rowid}}" value="{{$product->qty}}" />
                                                                <button class="btn btn-mini" type="submit">
                                                                    <span rel="tooltip" title="Perbaharui"><i class="fa fa-undo"></i></span>
                                                                </button>
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
                                            <a href="{{url('checkout_order')}}">
                                                <button type="button" name="checkout" class="btn btn-primary btn-small mm20">
                                                    Alamat Pengiriman &nbsp; <i class="fa fa-chevron-right"></i>
                                                </button>
                                            </a>    
                                        </div>
                                    </div>
                                </form>
                                </div> 
                                <div class="tab-pane fade" role="presentation" id="address">
                                tes
                                </div>                        
                            </div>  
                            <!-- End id="checkout-content" -->
                        </div>
                    </div>
                    <div class="span3">                                    
                        <!-- Cart details -->
                        <div class="cart-details">
                            <div class="box">
                                <div class="hgroup title">
                                    <h3>Total Pemesanan</h3>
                                    
                                    <h5>Biaya untuk ongkos kirim dihitung setelah checkout</h5>
                                </div>
                                <div class="price-list">
                                    <li>Subtotal: <strong>Rp. {{ number_format(Cart::total(), 0, ",", ".") }}</strong></li>
                                    <li class="important">Total: <strong>Rp. {{ number_format(Cart::total(), 0, ",", ".") }}</strong></li>
                                </div>
                            </div>
                        </div>
                    <!-- End class="cart-details" -->
                    <!-- Coupon -->
                        <div class="coupon">
                            <div class="box">
                                <div class="hgroup title">
                                    <h3>Kode Voucher</h3>
                                    <h5>Masukan kode voucher disini</h5>
                                </div>
                                <form class="form-horizontal" enctype="multipart/form-data" action="/" method="post">
                                    <label for="coupon_code">Kode Voucher</label>
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
<!-- End class="checkout" -->