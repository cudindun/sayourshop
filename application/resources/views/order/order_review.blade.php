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
            <div class="span2"></div>
            <div class="span8">
                <div class="box" style="padding-top: 0px;">
                    <!-- Checkout content -->
                    <div id="tab-content">
                        <div class="tab-pane active" id="cart" role="presentation">
                            <form enctype="multipart/form-data" action="{{ url('update_order') }}" method="get" />
                                <div class="box-header" style="background-color: #1abc9c;padding: 10px;">
                                    <h3 style="color: white;">Nomor Invoice Anda : <u>{{$data['order']->no_invoice}}</u></h3>
                                    <h5 style="color: white">Gunakan nomor ini untuk mengecek pesanan Anda</h5>
                                </div>
                                <div class="box-content">
                                    <div class="cart-items table-responsive">
                                        <table class="styled-table">
                                            <thead>
                                                <tr>
                                                    <th class="col_product">Produk</th>
                                                    <th class="col_properties ">Properti</th>
                                                    <th class="col_qty ">Jumlah</th>
                                                    <th class="col_single ">Harga</th>
                                                    <th class="col_single ">Total Berat</th>
                                                    <th class="col_total ">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['orderdetail'] as $order)                                 
                                                    <tr>
                                                        <td class="col_product">
                                                            <h5>
                                                                {{ucwords($order->product->name)}}
                                                            </h5>
                                                        </td>
                                                        <td class="col_product">
                                                            <h5>
                                                                @foreach( $properties = unserialize($order->properties) as $key => $value)
                                                                    {{ucwords($key.' : '.$value)}}<br>
                                                                @endforeach
                                                            </h5>
                                                        </td>
                                                        <td>
                                                            <span>{{$order->quantity}}</span>
                                                        </td>
                                                        <td>
                                                            <span>Rp. {{ number_format($order->product->price, 0, ",", ".") }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{$order->product->weight*$order->quantity}} g</span>
                                                        </td>
                                                        <td>
                                                            <span>Rp. {{ number_format($order->product->price*$order->quantity, 0, ",", ".") }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Subtotal</td>
                                                        <td colspan="3">Rp. {{ number_format($data['order']->total_discount+$data['order']->total_price, 0, ",", ".") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Diskon</td>
                                                        <td>- Rp. {{ number_format($data['order']->total_discount, 0, ",", ".") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Biaya Kirim</td>
                                                        <td colspan="3">Menunggu Konfirmasi Admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Total Biaya</td>
                                                        <td colspan="3">Rp. {{ number_format($data['order']->total_price, 0, ",", ".") }}</td>
                                                    </tr>
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
                                       <tr>
                                           <td class="col_product">
                                                <span>{{$data['order']->order_name}}</span>
                                            </td>
                                            <td class="col_product">
                                                <span>{{$data['order']->order_phone}}</span>
                                            </td>
                                            <td class="col_product">
                                                <span>{{$data['order']->province}}</span>
                                            </td>
                                            <td class="col_product">
                                                <span>{{$data['order']->order_address}}</span>
                                            </td>
                                            <td class="col_product">
                                                <span>{{$data['order']->courier}}</span>
                                            </td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>      
                    </div>  
                    <!-- End id="checkout-content" -->
                </div>
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