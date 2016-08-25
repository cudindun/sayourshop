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
            <div id="alert" hidden="true"></div>
            
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
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
                  <div id="modaldetail"></div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->

@section('script')
	<script>
      $(document).ready(function(){
        // $("#order_table").DataTable();
        $('#order_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy:true,
            pagingType:"full_numbers",
            pageLength: 10,
            responsive: true,
            ajax: { url:'{!! url("list_order") !!}'},
            columns: [
                { 
                  data: 'id',
                  className: "center",
                  mRender: function (data) {
                  return '<input type="text" class="col-sm-12 resi" id="'+data+'" name="'+data+'">';
                  },
                },
                { data: 'no_invoice', name: 'no_invoice'},
                { data: 'order_status', name: 'order_status'},
                { 
                  data: 'id',
                  className: "center",
                  mRender: function (data) {
                  return '<button class="btn btn-primary btn-xs detail" id="'+data+'">Lihat</button>';
                  },
                },
                { 
                  data: 'id',
                  className: "center",
                  mRender: function (data) {
                  return '<button class="btn btn-success btn-xs send" id="send_'+data+'">Kirim</button>';
                  },
                },
            ]
        });
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

      $(".resi").focus(function(){
        $('#alert').hide('slow');
      });

      $('.resi').change(function(){
        var id = this.id;
        var resi = $('#'+id).val();
        $.ajax({
          url: "{!! url('insert_shipping') !!}",
          data: {resi: resi,
                  orderid : id},
                  method:'POST',
        }).done(function(data){
          $('#alert').html('<div class="alert alert-success">No resi berhasil disimpan </div>');
          $('#alert').show('slow');
        });
      });

      $('.send').click(function(){
        var id = this.id.substr(5);
        if ($('.resi').val() != '') {
          $.ajax({
            url: "{!! url('send') !!}",
            data: {orderid : id},
                    method:'POST',
          }).done(function(data){
            $('#send_'+ id).attr('disabled',true);
          });
          $('#alert').hide('slow');
        } else {
          $('#alert').html('<div class="alert alert-danger">Silahkan isi no resi terlebih dahulu</div>');
          $('#alert').show('slow');
        }
      });
    </script>
@stop