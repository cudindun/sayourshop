		<section class="content-header">
          <h1>
            Subcategory
            <small>View</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/master/category/list')}}"><i class="fa fa-file"></i> Subcategory</a></li>
            <li><a href="#"><i class="fa fa-eye"></i>View</a></li>
            <li><a href="{{url('/master/subcategory/list')}}">{!! $data['category']->subname !!}</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
            	<?php // ======================== Table ================================ ?>
              	  <table id="subcategory_table" class="table table-hover">
                      <tr>
                        <th>ID</th>
                        <td>{!! $data['category']->id !!}</td>
                      </tr>
                      <tr>
                        <th>Kategori ID</th>
                        <td>{!! $data['category']->category_id !!} / {!! $data['category']->category->name !!}</td>
                      </tr>
                      <tr>
                        <th>Nama Sub Category</th>
                        <td>{!! $data['category']->subname !!}</td>
                      </tr>
                      <tr>
                        <th>Nama Slug</th>
                        <td>{!! $data['category']->slug !!}</td>
                      </tr>
                      <tr>
                        <th>Total Product</th>
                        <td>{!! $data['category']->total_product !!}</td>
                      </tr>
                      <tr>
                        <th>Properties</th>
                        <td>{!! $data['category']->properties !!}</td>
                      </tr>
                      <tr>
                        <th>Created at</th>
                        <td>{!! $data['category']->created_at !!}</td>
                      </tr>
                      <tr>
                        <th>Updated at</th>
                        <td>{!! $data['category']->updated_at !!}</td>
                      </tr>
                  </table>
                  <?php // ======================== END Table ================================ ?>
                  
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button id="back" class="btn btn-primary pull-right" style="padding:12px">Back to List</button>
            </div>
          </div><!-- /.box -->

        </section><!-- /.content -->

@section('script')
  <script>
    $('#back').click(function(){
      window.location.href='{{url('/master/subcategory/list')}}';
    })
  </script>
@stop