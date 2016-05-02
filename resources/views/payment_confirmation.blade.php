<section class="main">
    <!-- Reset password -->
    <section class="confirm_payment">
        <div class="container">
            <div class="row">
                <div class="span9 offset1">
                    @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif
                                @if(session('failed'))
                                <div class="alert alert-danger">
                                    {{session('failed')}}
                                </div>
                                @endif
                    <form enctype="multipart/form-data" action="{{url('pembayaran')}}" method="post" />
                        <div class="box">
                            <div class="hgroup">
                                <h4>Konfirmasi Pembayaran</h4>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <div class="box-content">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label for="email">No Invoice</label>
                                        <div class="control-group">
                                            @if($data['invoice'])
                                                <input class="span12" type="text" id="no_invoice" name="no_invoice" value="{{$data['invoice']}}" required>
                                            @else
                                                <input class="span12" type="text" id="no_invoice" name="no_invoice" required>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <label for="email">Nama Pemilik Rekening</label>
                                        <div class="control-group">
                                            <input class="span12" type="text" id="account_name" name="account_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label for="email">No Rekening</label>
                                        <div class="control-group">
                                            <input class="span12" type="text" id="bank_account" name="bank_account" required>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <label for="email">Nama Bank</label>
                                        <div class="control-group">
                                            <input class="span12" type="text" id="bank_name" name="bank_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label for="email">Tujuan Rekening</label>
                                        <div class="control-group">
                                            <select name="admin_account" id="admin_account" class="span12">
                                                <?php $bank_account = unserialize($data['bank_account']->meta_value);?>
                                                @foreach( $bank_account as $key => $account)
                                                    <?php $a= '';?>
                                                    @foreach($account as $value)
                                                        <?php $a .= $value.' ';?>
                                                    @endforeach
                                                    <option value="{{$a}}">{{$a}}
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <label for="email">Jumlah Transfer (<i>tanpa titik</i>)</label>
                                        <div class="control-group">
                                            @if($data['total_price'])
                                                <input class="span12" type="text" id="total_transfer" name="total_transfer" value="{{$data['total_price']}}" required>
                                            @else
                                                <input class="span12" type="text" id="total_transfer" name="total_transfer" required>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label for="email">Tanggal Pembayaran</label>
                                        <div class="control-group">
                                            <div class="input-group date">
                                                <input type="text" class="form-control" name="transfer_date" id="transfer_date" ><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="btn btn-primary btn-small" type="submit" value="Submit">
                                    Konfirmasi
                                </button>                                            
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
        </div>	
    </section>                
    <!-- End Reset password -->            
</section>
<script type="text/javascript">
    $(document).ready(function()
    {
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
       $('#transfer_date').val(today); 
       $('.input-group.date').datepicker({
            todayBtn: "linked",
            language: "id",
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>
<!-- End class="main"