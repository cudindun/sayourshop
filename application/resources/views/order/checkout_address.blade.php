<!-- Checkout / Billing Address -->
<section class="checkout" style="margin-top:20px">
    <div class="container" style="padding: 0px;">
        <form enctype="multipart/form-data" action="shipping.html" method="post" />
            <div class="row">
                <div class="span9">
                    <div class="box">
                        <!-- Checkout progress -->
                        <div id="checkout-progress">
                            <ul class="nav nav-tabs">
                                <li style="text-align: center;">
                                        <a href="{{url('keranjang')}}">
                                        <i class="fa fa-map-marker fa-2x"></i>
                                        <span>Keranjang</span>
                                    </a>
                                </li>
                                <li class="active" style="text-align: center;">
                                        <a href="{{url('checkout_order')}}">
                                        <i class="fa fa-envelope-square fa-2x"></i>
                                        <span>ALamat Pengiriman</span>
                                    </a>
                                </li>
                            </ul>                   
                        </div>
                        <!-- End id="checkout-progress" -->
                        <!-- Checkout content -->
                        <div id="checkout-content">
                            <div class="box-header">
                                <h3>Alamat</h3>
                                <h5>Berikan alamat pengiriman Anda selengkap-lengkapnya untuk menghindari hal-hal yang tidak diinginkan</h5>
                            </div>
                            <div class="box-content">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="control-group">
                                            <label for="first_name" class="control-label">Nama Lengkap</label>
                                            <div class="controls">
                                                <input class="span12" type="text" value="" name="first_name" id="first_name" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="email" class="control-label">Email</label>
                                            <div class="controls">
                                                <input class="span12" type="text" value="" name="email" id="email" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="phone" class="control-label">No.Telp</label>
                                            <div class="controls">
                                                <input class="span12" type="text" value="" name="phone" id="phone" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="control-group">
                                                    <label for="city" class="control-label">Provinsi</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="" name="city" id="city" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="subdistrict" class="control-label">Kecamatan</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="" name="subdistrict" id="subdistrict" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <div class="control-group">
                                                    <label for="city" class="control-label">Kota / Kabupaten</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="" name="city" id="city" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="zip" class="control-label">Kodepos</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="" name="zip" id="zip" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label for="street_address" class="control-label">Detail Alamat</label>
                                            <div class="controls">
                                                <input class="span12" type="text" value="" name="street_address" id="street_address" />
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                            </div>
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('keranjang')}}" class="btn btn-small">
                                        <i class="icon-chevron-left"></i> &nbsp; Keranjang
                                    </a>
                                </div>
                                <div class="pull-right">                                                    
                                    <button type="submit" class="btn btn-primary">
                                        Checkout &nbsp; <i class="icon-chevron-right"></i>
                                    </button>
                                </div>
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
        </form>
    </div>	
</section>
<!-- End class="checkout" -->