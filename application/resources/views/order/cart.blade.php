 <!-- Checkout / Billing Address -->
<section class="checkout" style="margin-top:20px">
    <div class="container" style="padding: 0px;">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger">
                    {{session('fail')}}
                </div>
            @endif
            <div class="span9">
                <div class="box" style="padding-top: 0px;">
                    <!-- Checkout content -->
                    <div id="tab-content">
                        <div class="tab-pane active" id="cart" role="presentation">
                            <form enctype="multipart/form-data" action="{{ url('update_order') }}" method="get" />
                                <div class="box-header" style="background-color: #1abc9c;padding: 10px;">
                                    <h3 style="color: white;">Keranjang Belanja</h3>
                                    <h5 style="color: white">Anda memiliki <strong>{{ Cart::count() }}</strong> barang di keranjang</h5>
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
                            </form>
                        </div>                       
                    </div>  
                    <!-- End id="checkout-content" -->
                    <!-- Checkout content -->
                    <div id="checkout-content">
                        <form action="{{url('checkout')}}">
                            <div class="box-header" style="background-color: #1abc9c;padding: 10px;">
                                <h3 style="color: white">Alamat</h3>
                                <h5 style="color: white">Alamat tujuan pengiriman</h5>
                            </div>
                            <div class="box-content">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No Telepon</th>
                                            <th>Provinsi</th>
                                            <th>Alamat</th>
                                            <th>Kurir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data['address']) 
                                            <?php $query = unserialize($data['address']->meta_value); ?>
                                            @foreach($data['cart'] as $product)
                                                <?php $properties = array();?>
                                                @foreach( $product->options as $key => $value)
                                                    <?php $properties[$key] = $value;?>
                                                @endforeach
                                                <input type="hidden" id="properties_{{$product->rowid}}" name="properties_{{$product->rowid}}" value="{{serialize($properties)}}"></input>
                                            @endforeach
                                            @foreach($query as $address => $value)
                                                <tr>
                                                    @foreach($value as $index => $val)
                                                        <td name="{{$index.'_'.$address}}" name="{{$index.'_'.$address}}">{{$val}}</td>
                                                    @endforeach
                                                    <td>
                                                        <select name="courier_{{$address}}" id="courier_{{$address}}">
                                                            <option value="JNE-OKE">JNE-OKE 3-4 hari
                                                            <option value="JNE-REG">JNE-REG 1-2 hari
                                                            <option value="JNE-YES">JNE-YES 1 hari
                                                        </select>
                                                    </td>
                                                    @if(Cart::count())
                                                        <td>
                                                            <button class="btn btn-mini btn-greensea address" id="no_address" name="no_address" value="{{$address}}"  type="submit">Checkout</button></a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            <input type="hidden" class="form-control" id="coupon_code" name="coupon_code" value="{{session('coupon')}}">
                                            <input type="hidden" class="form-control" value="{{session('discount')}}" id="discount" name="discount">
                                            <tr>
                                                <td><button class="btn btn-mini btn-greensea" id="alamat_baru" name="alamat_baru" type="button">Alamat Baru</button></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <form id="checkout" name="checkout" action="{{url('checkout')}}" role="get">
                            <div class="box-content" hidden="true" id="form_new_address">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="control-group">
                                            <label for="first_name" class="control-label">Nama Lengkap</label>
                                            <div class="controls">
                                                <input class="span12" type="text" name="name" id="name" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="phone" class="control-label">No.Telp</label>
                                            <div class="controls">
                                                <input class="span12" type="text" value="" name="phone" id="phone" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="city" class="control-label">Provinsi</label>
                                            <div class="controls">
                                                <select class="span12" name="province" id="province" >
                                                    @foreach($data['provinces'] as $province)
                                                        <option value="{{$province->nama_province}}">{{$province->nama_province}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <div class="control-group">
                                                    <label for="city" class="control-label">Kurir Pengiriman</label>
                                                    <div class="controls">
                                                        <select class="span12" name="courier" id="courier">
                                                            <option value="JNE-OKE">JNE-OKE 3-4 hari
                                                            <option value="JNE-REG">JNE-REG 1-2 hari
                                                            <option value="JNE-YES">JNE-YES 1 hari
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="address" class="control-label">Detail Alamat (<i>sertakan kota & kecamatan</i>)</label>
                                            <div class="controls">
                                                <textarea class="span12" name="address" id="address" rows="4" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('/')}}" class="btn btn-small">
                                        <i class="icon-chevron-left"></i>lanjut belanja
                                    </a>
                                </div>
                                @if(Cart::count())
                                    @foreach($data['cart'] as $product)
                                        <?php $properties = array();?>
                                        @foreach( $product->options as $key => $value)
                                            <?php $properties[$key] = $value;?>
                                        @endforeach
                                        <input type="hidden" id="properties_{{$product->rowid}}" name="properties_{{$product->rowid}}" value="{{serialize($properties)}}"></input>
                                    @endforeach
                                    <div class="pull-right" hidden="true" id="btn_new_checkout" name="btn_new_checkout">
                                        <button type="submit" class="btn btn-greensea">
                                            Checkout <i class="icon-chevron-right"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </form>                  
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
                            @if(session('discount'))
                                <li>Diskon: <strong>- Rp. {{ number_format(session('discount'), 0, ",", ".") }}</strong></li>
                                <li class="important">Total: <strong>Rp. {{ number_format(Cart::total()-session('discount'), 0, ",", ".") }}</strong></li>
                            @else
                                <li>Diskon: <strong>Rp. {{ number_format(0, 0, ",", ".") }}</strong></li>
                                <li class="important">Total: <strong>Rp. {{ number_format(Cart::total(), 0, ",", ".") }}</strong></li>
                            @endif
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
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{url('discount')}}" method="get">
                            <label for="coupon_code">Kode Voucher</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="coupon" name="coupon" placeholder="" >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" style="height:34px"><i class="fa fa-check"></i></button>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#alamat_baru').click(function()
        {
            $('#form_new_address').show('slow');
            $('#btn_new_checkout').show('slow');
        });
    });

</script>