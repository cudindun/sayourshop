		<section class="content-header">
          <h1>
            Order
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-file"></i> SubCategory</a></li>
            <li><a href="{{url('/master/subcategory/list')}}"></i> List</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="box box-warning">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
            	<?php // ======================== Data Table ================================ ?>
              	  <table id="order_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No Invoice</th>
                        <th>Nama</th>
                        <th>Tujuan</th>
                        <th>Total Transfer</th>
                        <th>Tanggal Transfer</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data['payment'] as $payment)
                        <tr>
                            <td>{{$payment->no_invoice}}</td>
                            <td>{{$payment->account_name}}</td>
                            <td>{{$payment->admin_account}}</td>
                            <td>Rp. {{ number_format($payment->total_transfer, 0, ",", ".") }}</td>
                            <td>{{$payment->transfer_date}}</td>
                            <td><button type="button" class="btn btn-xs btn-primary">Konfirmasi</button></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
                  <div id="modaldetail"></div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->

@section('script')
	<script>
      $(function () {
        $("#order_table").DataTable();
      });

      $('.detail').click(function(){
      var id = this.id;
      $.ajax({
        url: "{!! url('order_detail') !!}",
        data: {orderid: id},
                method:'GET',
      }).done(function(data){
        $('#modaldetail').html(data);
      });
      });
    </script>
@stop