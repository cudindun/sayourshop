
		<section class="content-header">
          <h1>
            Product
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>

            <li><a href="#"><i class="fa fa-file"></i> Product</a></li>
            <li><a href="{{url('/master/product/list')}}"></i> List</a></li>

            <li><a href="#"><i class="fa fa-users"></i> Product</a></li>
            <li><a href="{{url('/master/user/list')}}"></i> List</a></li>

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
                        <th>Nama Product</th>
                        <th>Nama kategori</th>
                        <th>Nama Sub Kategori</th>
                        <th>Slug</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Rating</th>
                        <th>Weight</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['product'] as $product): ?> 
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->category->name ?></td>
                        <td><?= $product->subcategory->name ?></td>
                        <td><?= $product->slug ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->quantity ?></td>
                        <td><?= $product->rating ?></td>
                        <td><?= $product->weight ?></td>
                        <td>
                          <a href="{{url('/master/product/view')}}/<?=$product->id?>"><i class="fa fa-eye"></i></a>
                          <a href="{{url('/master/product/edit')}}/<?=$product->id?>"><font color="orange"><i class="fa fa-pencil"></i></font></a>
                          <a href="#" id="delete" value="<?=$product->id?>" method="post"><font color="red"><i class="fa fa-remove"></i></font></a>
                        </td>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

            <!-- Modal -->
            <div id="modaldetail"></div>
          </div><!-- /.box -->
        </section><!-- /.content -->

@section('script')
	<script>
      $(function () {
        $("#productlist_table").DataTable();
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
    </script>
@stop