		<section class="content-header">
          <h1>
            Distributor
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-user"></i> Distributor</a></li>
            <li><a href="{{url('/master/distributor/list')}}"></i> List</a></li>
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
              	  <table id="distributorlist_table" class="table table-bordered table-hover">

                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Distributor</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Date Created</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['distributor'] as $distributor): ?> 
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $distributor->name ?></td>
                        <td><?= $distributor->email ?></td>
                        <td><?= $distributor->address ?></td>
                        <td><?= $distributor->phone ?></td>
                        <td><?= $distributor->created_at ?></td>
                        <td>
                          <a href="{{url('/master/distributor/view')}}/<?=$distributor->id?>"><i class="fa fa-eye"></i></a>
                          <a href="{{url('/master/distributor/edit')}}/<?=$distributor->id?>"><font color="orange"><i class="fa fa-pencil"></i></font></a>
                          <a href="#" id="delete" value="<?=$distributor->id?>" method="post"><font color="red"><i class="fa fa-remove"></i></font></a>
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
        $("#distributorlist_table").DataTable();
      });

      $('a#delete').click(function(){
        r = confirm("Are You Sure Want to Remove This Item?");

        if (r == true) {
           window.location.href='{{url("/master/distributor/delete")}}/'+$(this).attr("value");
        }

      });
    </script>
@stop