		<section class="content-header">
          <h1>
            SubCategory
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
              	  <table id="subcategorylist_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Nama Subkategori</th>
                        <th>Slug</th>
                        <th>Properties</th>
                        <th>Total Produk</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['subcategory'] as $subcategory): ?> 
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $subcategory->category->name ?></td>
                        <td><?= $subcategory->subname ?></td>
                        <td><?= $subcategory->slug ?></td>
                        <td><?= $subcategory->properties ?></td>
                        <td><?= $subcategory->total_product ?></td>
                        <td>
                          <a href="{{url('/master/subcategory/view')}}/<?=$subcategory->id?>"><i class="fa fa-eye"></i></a>
                          <a href="{{url('/master/subcategory/edit')}}/<?=$subcategory->id?>"><font color="orange"><i class="fa fa-pencil"></i></font></a>
                          <a href="{{url('/master/subcategory/delete')}}/<?=$subcategory->id?>"><font color="red"><i class="fa fa-remove"></i></font></a>
                        </td>
                      </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->

@section('script')
	<script>
      $(function () {
        $("#subcategorylist_table").DataTable();
      });
    </script>
@stop