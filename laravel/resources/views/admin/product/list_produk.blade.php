
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
              <div class="col-sm-4">
                <select class="pull-right" id="category">
                  @foreach($data['category'] as $category)
                    <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-4" align="center">
                <select id="subcategory"></select>
              </div>
              <div class="col-sm-4">
                <select id="status_product">
                  <option value="">--Status--</option>
                  <option value="publish">Aktif</option>
                  <option value="unactive">Non-Aktif</option>
                </select>
              </div>

            	<?php // ======================== Data Table ================================ ?>
                <div id="productlist_table">
              	  
                </div>
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
    $(document).ready(function(){
      get_category_product(1);
      get_product_subcategory(1);
    });

    $('#category').change(function(){
      var val = this.value;
      $('#status_product').val('');
      get_category_product(val);
      get_product_subcategory(val);
    });

    $('#status_product').change(function(){

      var status = this.value;
      var category_id = $('#category').val();
      var subcategory_id = $('#subcategory').val();
      $.ajax({
        url: "{!! url('get_product_by_status') !!}",
        data: {status:status, category_id:category_id, subcategory_id:subcategory_id},
        method: 'GET',
      }).done(function(data){
        $('#productlist_table').html(data);
      });
    });

    $('#subcategory').change(function(){
      var val = this.value;
      $('#status_product').val('');
      $.ajax({
        url: "{!! url('get_product_subcategory') !!}",
        data: {subcategory_id:val},
        method: 'GET',
      }).done(function(data){
        $('#productlist_table').html(data);
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

    $('#done').click(function(){
        var id = $('#id').val();
        var category_id = $('#category').val();
        $.ajax({
          url: "{!! url('activated_product') !!}",
          data: {
            id: id
          },
          method:'POST',
        }).done(function(data){ 
            get_category_product(category_id);
        });
      });

    function get_product_subcategory(category_id){
      var url = '{!! url("get_list_subcategory") !!}';
      $('#subcategory').empty();
      $.getJSON(url, {category_id:category_id}, function(data){
        $('#subcategory').append('<option value="">--Subkategori--</option>');
        for(i=0;i<data.length;i++){
          $('#subcategory').append('<option id='+data[i].id+' value='+data[i].id+'>'+data[i].subname+'</option>');
        }
      });
    }

    function get_category_product(category_id){
      $.ajax({
        url: "{!! url('category_product') !!}",
        data: {category_id:category_id},
        method: 'GET',
      }).done(function(data){
        $('#productlist_table').html(data);
      });
    }
  </script>
@stop