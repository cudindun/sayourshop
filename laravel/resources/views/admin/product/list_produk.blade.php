
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
            <div id="activated_product"></div>
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
                        <td><div id="update_qty_{{$product->id}}"><?= $product->quantity ?></div></td>
                          <td>
                          @if($product->status != 'publish')
                            <button class="btn btn-success btn-xs active_product" id="<?= $product->id ?>" name="<?= $product->name ?>">Aktifkan</button>
                            @else
                            <button class="btn btn-danger btn-xs active_product" id="<?= $product->id ?>">Non-Aktifkan</button>
                             @endif
                             <a href="#" id="detail_{{$product->id}}" name="detail_{{$product->id}}" class="detail"><i class="fa fa-eye"></i></a>
                            <a href="#" id="delete" value="<?=$product->id?>" method="post"><font color="red"><i class="fa fa-remove"></i></font></a>
                            <input type="hidden" class="product_status" id="status_{{$product->id}}" value="{{$product->status}}">
                          </td>
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
                    <div id="varian_total"></div>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-danger" id="alert_variant" hidden="true"></div>
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
                        <input type="hidden" class="form-control" id="size" name="size" >
                        <input type="hidden" class="form-control" id="quantity_tmp" name="quantity_tmp" >
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-xs" id="varian" name="varian">Simpan Varian</button>
                    <button type="button" class="btn btn-success btn-xs" id="done" name="done" data-dismiss="modal" disabled="true">Aktifkan</button>
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
        $("#color").focus(function(){
          $('#alert_variant').hide('slow'); 
        });
      });

      $('.active_product').click(function(){
          var id = this.id;
          var status = $('#status_'+id).val();
          $('#alert_variant').hide(); 
          if (status == 'unactive') {
            var name = this.name;
            $('#id').val(id);
            $('.modal-title').html('Varian produk ' + name);
            $.ajax({
              url: "{!! url('check_variant') !!}",
              data: { id:id },
              method:'POST',
            }).done(function(data){
              if (data != '') {
                $('#varian_total').html("Varian produk saat ini terdapat <b>" + data['variant_count']+"("+ data['variant'] +")" + "</b> varian");
                $('#done').attr('disabled', false);
              }
            });
            $('#myModal').modal('show');
          }else{
            $.ajax({
              url: "{!! url('unactivated_product') !!}",
              data: { id:id },
              method:'POST',
            }).done(function(data){
              location.reload();
            });
          }
      });

      $('#done').click(function(){
        var id = $('#id').val();
        $.ajax({
          url: "{!! url('activated_product') !!}",
          data: {
            id: id
          },
          method:'POST',
        }).done(function(data){
            location.reload();  
        });
      });

      $('#varian').click(function(){
        var size = $('#size').val();
        var total = $('#quantity_tmp').val();
        var color = $('#color').val();
        var id = $('#id').val();
        var s_qty = $('#s_qty').val();
        var m_qty = $('#m_qty').val();
        var l_qty = $('#l_qty').val();
        var xl_qty = $('#xl_qty').val();
        var allsize_qty = $('#allsize_qty').val();
        if (size != '' && color != '') { 
          $.ajax({
            url: "{!! url('add_variant') !!}",
            data: {
              size: size,
              total: total,
              color: color,
              s_qty: s_qty,
              m_qty: m_qty,
              l_qty: l_qty,
              xl_qty: xl_qty,
              allsize_qty: allsize_qty,
              id: id
            },
            method:'POST',
          }).done(function(data){
            if (data == 'fail') {
              $('#alert_variant').html('Maaf varian telah tersedia');
              $('#alert_variant').show('slow'); 
            } else {
              $('#varian_total').html("Varian produk saat ini ada <b>" + data + "</b> varian");
              $('#done').attr('disabled', false);
            }
          });
        }else{
          $('#alert_variant').html('Silahkan masukkan warna, size dan jumlah');
          $('#alert_variant').show('slow'); 
        }
      });

      $('a#delete').click(function(){
        r = confirm("Are You Sure Want to Remove This Item?");
        if (r == true) {
           window.location.href='{{url("/master/produk/delete")}}/'+$(this).attr("value");
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
                $('#size').val("s,m,l,xl,");
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
                var size = $('#size').val().replace("allsize","");
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
                  $('#size').val(size.concat("s,"));
                  });
                  console.log(s_qty);
                });
                }else{ 
                  $('#s_qty').attr('disabled',true);
                  $('#s_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs");   
                    $('#quantity_tmp').val(0); 
                    $('#size').val(size.replace("s,",""));
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                    $('#size').val(size.replace("s,",""));
                  }
                }
            });
            
            $('#m').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#m_qty').val()) ;
                var show = result.toString();
                var size = $('#size').val().replace("allsize","");;
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
              $('#size').val(size.concat("m,"));
               });
            });
                }else{ 
                  $('#m_qty').attr('disabled',true);
                  $('#m_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs"); 
                    $('#quantity_tmp').val(0);
                    $('#size').val(size.replace("m,",""));   
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                    $('#size').val(size.replace("m,","")); 
                  }
                }
            });

            $('#l').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#l_qty').val()) ;
                var show = result.toString();
                var size = $('#size').val().replace("allsize","");;
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
              $('#size').val(size.concat("l,"));
               });
            });
                }else{ 
                  $('#l_qty').attr('disabled',true);
                  $('#l_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs");  
                    $('#quantity_tmp').val(0);
                    $('#size').val(size.replace("l,","")); 
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                    $('#size').val(size.replace("l,","")); 
                  }
                }
            });

            $('#xl').change(function()
            {
                var result = parseInt($('#quantity_tmp').val()) - parseInt($('#xl_qty').val()) ;
                var show = result.toString();
                var size = $('#size').val().replace("allsize","");;
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
              $('#size').val(size.concat("xl,"));
               });
            });
                }else{ 
                  $('#xl_qty').attr('disabled',true);
                  $('#xl_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs"); 
                    $('#quantity_tmp').val(0);
                    $('#size').val(size.replace("xl,","")); 
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                    $('#size').val(size.replace("xl,","")); 
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
              $('#size').val("allsize");
               });
            });
                }else{ 
                  $('#allsize_qty').attr('disabled',true);
                  $('#allsize_qty').val(0);
                  if (result = '') {
                    $('#quantity').html("0 pcs"); 
                    $('#quantity_tmp').val(0);
                    $('#size').val(size.replace("allsize","")); 
                  }else{
                    $('#quantity').html(show + " pcs");
                    $('#quantity_tmp').val(show);
                    $('#size').val(size.replace("allsize","")); 
                  }
                }
            });
    </script>
@stop