    <section class="content-header">
          <h1>
            User
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i> Product</a></li>
            <li><a href="{{url('/master/user/list')}}"></i> List</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="box box-warning">
            <div class="box-body">
            	<?php // ======================== Data Table ================================ ?>
              	  <table id="productlist_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Detail</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Terjual</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['product'] as $product): ?>
                      <?php $properties = unserialize($product->properties)?> 
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= date_format(date_create($product->created_at), "d M Y") ?></td>
                        <td><?= $product->name ?></td>
                        <td><button type="button" id="detail_{{$product->id}}" name="detail_{{$product->id}}" class="btn btn-xs btn-primary detail">Detail</button></td>
                        <td>Rp. <?= number_format($product->price, 0, ",", ".") ?></td>
                        <td><?= $product->quantity ?></td>
                        <td><?= $product->sold ?></td>
                        <td><button class="btn btn-success btn-xs">Aktif</button></td>
                      </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
            </div><!-- /.box-body -->
            <!-- Modal -->
            <div id="modaldetail"></div>
          </div><!-- /.box -->
        </section><!-- /.content -->

@section('script')
	<script>
      $(function () {
        $("#productlist_table").DataTable();
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
    </script>
@stop