		<section class="content-header">
          <h1>
            Message
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> Message</a></li>
            <li><a href="{{url('/master/message/list')}}"></i> List</a></li>
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
              @if(session('error'))
                  <div class="alert alert-danger">
                      {{session('error')}}
                  </div>
              @endif
            </div>
            <div class="box-body">
            	<?php // ======================== Data Table ================================ ?>
              	  <table id="messagelist_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama pengirim</th>
                        <th>Type</th>
                        <th>Pesan</th>
                        <th>Tanggal Kirim</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['message'] as $message): ?> 
                      <tr style="<?= $message->status == 0 ? 'font-weight:bold;' : 'background-color:rgba(0,0,0,0.07);' ?>">
                        <td><?= $i ?></td>
                        <td><?php $name = explode('(', $message->name); echo $name[0]; ?></td>
                        <td><?= $message->type ?></td>
                        <td><?= strlen($message->ask) <= 100 ? $message->ask : substr($message->ask, 0, 100) . '...' ?></td>
                        <td><?php $date = strtotime($message->created_at); if( date('Y', $date) == date('Y') ){echo date('d M', $date);}else{echo date('d M y', $date);} ?></td>
                        <td>
                          <a href="{{url('/master/message/view')}}/<?=$message->id?>"><i class="fa fa-eye"></i></a>
                          <a href="#" id="delete" value="<?=$message->id?>" method="post"><font color="red"><i class="fa fa-remove"></i></font></a>
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
        $("#messagelist_table").DataTable();
      });

      $('a#delete').click(function(){
        r = confirm("Are You Sure Want to Remove This Item?");

        if (r == true) {
           window.location.href='{{url("/master/message/delete")}}/'+$(this).attr("value");
        }

      });
    </script>
@stop