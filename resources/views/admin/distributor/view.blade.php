		<section class="content-header">
          <h1>
            Distributor
            <small>View</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/master/distributor/list')}}"><i class="fa fa-file"></i> Distributor</a></li>
            <li><a href="#"><i class="fa fa-eye"></i>View</a></li>
            <li><a href="{{url('/master/distributor/list')}}">{!! $data['distributor']->name !!}</a></li>
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
              	  <table id="distributor_table" class="table table-hover">
                      <tr>
                        <th>ID</th>
                        <td>{!! $data['distributor']->id !!}</td>
                      </tr>
                      <tr>
                        <th>Nama Distributor</th>
                        <td>{!! $data['distributor']->name !!}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{!! $data['distributor']->email !!}</td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td>{!! $data['distributor']->address !!}</td>
                      </tr>
                      <tr>
                        <th>Phone</th>
                        <td>{!! $data['distributor']->phone !!}</td>
                      </tr>
                      <tr>
                        <th>Created at</th>
                        <td>{!! $data['distributor']->created_at !!}</td>
                      </tr>
                      <tr>
                        <th>Updated at</th>
                        <td>{!! $data['distributor']->updated_at !!}</td>
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
      window.location.href='{{url('/master/distributor/list')}}';
    })
  </script>
@stop