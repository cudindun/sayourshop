		<section class="content-header">
          <h1>
            User
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i> User</a></li>
            <li><a href="{{url('/master/user/list')}}"></i> List</a></li>
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
              	  <table id="userlist_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Last Login</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['user'] as $user): ?> 
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->first_name ?></td>
                        <td><?= $user->last_name ?></td>
                        <td><?= $user->phone ?></td>
                        <td><?= $user->status ?></td>
                        <td><?= $user->last_login ?></td>
                      </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Last Login</th>
                      </tr>
                    </tfoot>
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->

@section('script')
	<script>
      $(function () {
        $("#userlist_table").DataTable();
      });
    </script>
@stop