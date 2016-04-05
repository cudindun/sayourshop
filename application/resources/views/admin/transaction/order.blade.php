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
                        <th>No Resi</th>
                        <th>No Invoice</th>
                        <th>Status</th>
                        <th>Detail</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data['order'] as $order)
                        <tr>
                            <td><input type="text" class="col-sm-12"></td>
                            <td>{{$order->no_invoice}}</td>
                            <td>{{$order->order_status}}</td>
                            <td><button class="btn btn-primary btn-xs detail" id="{{$order->id}}">Lihat</button></td>
                            <td><button class="btn btn-success btn-xs">Lunas</button></td>
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