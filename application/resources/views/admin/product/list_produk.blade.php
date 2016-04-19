
		<section class="content-header">
          <h1>
            Product
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>

            <li><a href="#"><i class="fa fa-file"></i> Product</a></li>
            <li><a href="{{url('/master/product/list')}}"></i> List</a></li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="box box-warning">
            <div class="box-header with-border">
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
            </div>
            <div class="box-body">
            	<?php // ======================== Data Table ================================ ?>
              	  <table id="productlist_table" class="table table-bordered table-hover">

                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['product'] as $product): ?> 
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= date_format(date_create($product->created_at), "d M Y") ?></td>
                        <td><?= $product->name ?></td>
                        <td>Rp. <?= number_format($product->price, 0, ",", ".") ?></td>
                        <td><?= $product->quantity ?></td>
                        @if($product->status != 'publish')
                          <td>
                            <button class="btn btn-success btn-xs active" id="<?= $product->id ?>" name="<?= $product->name ?>" data-toggle="modal" data-target="#myModal">Aktifkan</button>
                            <a href="#" id="detail_{{$product->id}}" name="detail_{{$product->id}}" class="detail"><i class="fa fa-eye"></i></a>
                            <a href="#" id="delete" value="<?=$product->id?>" method="post"><font color="red"><i class="fa fa-remove"></i></font></a>
                          </td>
                        @else
                          <td>
                            <button class="btn btn-danger btn-xs">Non-Aktifkan</button>
                            <a href="#" id="detail_{{$product->id}}" name="detail_{{$product->id}}" class="detail"><i class="fa fa-eye"></i></a>
                            <a href="#" id="delete" value="<?=$product->id?>" method="post"><font color="red"><i class="fa fa-remove"></i></font></a>
                          </td>
                        @endif
                      </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

            <!-- Modal -->
            <div id="modaldetail"></div>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
              <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <input type="text" class="form-control" id="color" name="color" placeholder="Masukkan satu warna produk">
                      <div class="col-sm-12">
                      <label class="radio-inline"><input class="radiobtn" type="radio" name="optradio" id="automatic" value="automatic">Otomatis</label>
                      <label class="radio-inline"><input class="radiobtn" type="radio" name="optradio" id="costumize" value="costumize" >Kostumisasi</label>
                      </div>
                      <div class="checkbox col-sm-12">
                        <label class="col-sm-2"><input id="s" name="0" type="checkbox" value="S">S</label>
                        <input type="number" min="0" name="s_qty" id="s_qty" disabled="true" value="0"></input>
                      </div>
                      <div class="checkbox col-sm-12">
                        <label class="col-sm-2"><input id="m" name="1" type="checkbox" value="M">M</label>
                        <input type="number" min="0" name="m_qty" id="m_qty" disabled="true" value="0"></input>
                      </div>
                      <div class="checkbox col-sm-12">
                        <label class="col-sm-2"><input id="l" name="2" type="checkbox" value="L">L</label>
                        <input type="number" min="0" name="l_qty" id="l_qty" disabled="true" value="0"></input>
                      </div>
                      <div class="checkbox col-sm-12">
                        <label class="col-sm-2"><input id="xl" name="3" type="checkbox" value="XL">XL</label>
                        <input type="number" min="0" name="xl_qty" id="xl_qty" disabled="true" value="0"></input>
                      </div>
                      <div class="checkbox col-sm-12">
                        <label class="col-sm-2"><input id="allsize" name="allsize" type="checkbox" value="allsize">All Size</label>
                        <input type="number" min="0" id="allsize_qty" name="allsize_qty" disabled="true" value="0"></input>
                      </div>
                      <div class="checkbox col-sm-12">
                        <label class="col-sm-2">Total</label>
                        <b><div id="quantity" name="quantity"></div></b>
                        <input type="hidden" class="form-control" id="id" name="id" value="" >
                        <input type="text" class="form-control" id="size" name="size" >
                        <input type="hidden" class="form-control" id="quantity_tmp" name="quantity_tmp" >
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-xs" id="varian">Simpan Varian</button>
                    <button type="button" class="btn btn-success btn-xs">Selesai</button>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.box -->
        </section><!-- /.content -->

@section('script')
	<script>
      $(function () {
        $("#productlist_table").DataTable();
      });

      $('#varian').click(function(){
        var size = $('#size').val();
        var total = $('#quantity_tmp').val();
        var color = $('#color').val();
        var id = $('#id').val();
        
      });

      $('.active').click(function(){
        var name = this.name;
        var id = this.id;
        $('#id').val(id);
        $('.modal-title').html('Varian produk ' + name);
      });

      $('a#delete').click(function(){
        r = confirm("Are You Sure Want to Remove This Item?");

        if (r == true) {
           window.location.href='{{url("/master/product/delete")}}/'+$(this).attr("value");
        }
      });

      $('.detail').click(function(){
        var id = this.id.substr(7);
        $.ajax({
          url: "{!! url('master/produk_detail') !!}",
          data: {product_id: id},
          method:'GET',
        }).done(function(data){
          $('#modaldetail').html(data);
        });
      });

          $('#automatic').click(function()
            {
              $('input[type=number]').attr( 'disabled',true);
                $('#s').prop( "checked",true);
                $('#s_qty').val(5);
                $('#s_qty_tmp').val(5);
                $('#m').prop( "checked",true);
                $('#m_qty').val(5);
                $('#m_qty_tmp').val(5);
                $('#l').prop( "checked",true);
                $('#l_qty').val(5);
                $('#l_qty_tmp').val(5);
                $('#xl').prop( "checked",true);
                $('#xl_qty').val(5);
                $('#s_qty_tmp').val(5);
                $('#allsize').prop( "checked",false);
                $('#size').val("s,m,l,xl");
                $('#quantity_tmp').val(20);
                $('#quantity').html("20 pcs");
            });

            $('#costumize').click(function()
            {
              $('input[type=number]').attr( 'disabled',false);
              $('input[type=number]').val( 0);
            });

            function quantity(){
              var total = parseInt($('#s_qty').val())+ parseInt($('#m_qty').val()) + parseInt($('#l_qty').val()) + parseInt($('#xl_qty').val()) + parseInt($('#allsize_qty').val());
              // $('#quantity').val( );
              $('#quantity').html(total + " pcs");
              $('#quantity_tmp').val(total);
              console.log($('#quantity_tmp').val());
            }

            $('#s').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#s_qty').val()) ;
                var show = result.toString();
                $('#automatic').prop("checked",false);
                $('#costumize').prop("checked",true);
                $('#allsize').prop("checked",false);
                $('#allsize_qty').attr('disabled',true);
                $('#allsize_qty').val(0);
                if ($('#s').prop( "checked" )) {
                  $('#s_qty').attr('disabled',false);
                  $(function() {
              $('#s_qty').blur(function (){
              quantity();
               });
            });
                }else{ 
                  $('#s_qty').attr('disabled',true);
                  $('#s_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs");   
                    $('#quantity_tmp').val(0);  
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                  }
                }
            });
            
            $('#m').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#m_qty').val()) ;
                var show = result.toString();
                $('#automatic').prop("checked",false);
                $('#costumize').prop("checked",true);
                $('#allsize').prop("checked",false);
                $('#allsize_qty').attr('disabled',true);
                $('#allsize_qty').val(0);
                if ($('#m').prop( "checked" )) {
                  $('#m_qty').attr('disabled',false);
                  $(function() {
              $('#m_qty').blur(function (){
              quantity();
               });
            });
                }else{ 
                  $('#m_qty').attr('disabled',true);
                  $('#m_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs"); 
                    $('#quantity_tmp').val(0);  
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                  }
                }
            });

            $('#l').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#l_qty').val()) ;
                var show = result.toString();
                $('#automatic').prop("checked",false);
                $('#costumize').prop("checked",true);
                $('#allsize').prop("checked",false);
                $('#allsize_qty').attr('disabled',true);
                $('#allsize_qty').val(0);
                if ($('#l').prop( "checked" )) {
                  $('#l_qty').attr('disabled',false);
                  $(function() {
              $('#l_qty').blur(function (){
              quantity();
               });
            });
                }else{ 
                  $('#l_qty').attr('disabled',true);
                  $('#l_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs");  
                    $('#quantity_tmp').val(0);
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                  }
                }
            });

            $('#xl').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#xl_qty').val()) ;
                var show = result.toString();
                $('#automatic').prop("checked",false);
                $('#costumize').prop("checked",true);
                $('#allsize').prop("checked",false);
                $('#allsize_qty').attr('disabled',true);
                $('#allsize_qty').val(0);
                if ($('#xl').prop( "checked" )) {
                  $('#xl_qty').attr('disabled',false);
                  $(function() {
              $('#xl_qty').blur(function (){
              quantity();
               });
            });
                }else{ 
                  $('#xl_qty').attr('disabled',true);
                  $('#xl_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs"); 
                    $('#quantity_tmp').val(0);
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                  }
                }
            });

            $('#allsize').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#allsize_qty').val()) ;
                var show = result.toString();
                $('#automatic').prop("checked",false);
                $('#costumize').prop("checked",true);
                if ($('#allsize').prop( "checked" )) {
                  $('#allsize_qty').attr('disabled',false);
                  $('#s').prop("checked",false);
                  $('#s_qty').attr('disabled',true);
                  $('#s_qty').val(0);
                  $('#m').prop("checked",false);
                  $('#m_qty').attr('disabled',true);
                  $('#m_qty').val(0);
                  $('#l').prop("checked",false);
                  $('#l_qty').attr('disabled',true);
                  $('#l_qty').val(0);
                  $('#xl').prop("checked",false);
                  $('#xl_qty').attr('disabled',true);
                  $('#xl_qty').val(0);
                  $(function() {
              $('#allsize_qty').blur(function (){
              quantity();
               });
            });
                }else{ 
                  $('#allsize_qty').attr('disabled',true);
                  $('#allsize_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs"); 
                    $('#quantity_tmp').val(0);
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                  }
                }
            });
    </script>
@stop