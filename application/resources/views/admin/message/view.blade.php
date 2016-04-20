		<section class="content-header">
          <h1>
            Message
            <small>View</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/master/message/list')}}"><i class="fa fa-envelope"></i> Message</a></li>
            <li><a href="#"><i class="fa fa-eye"></i>View</a></li>
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
              	  <table id="message_table" class="table table-hover">
                      <tr>
                        <td colspan=2>{!! Html::image('assets/image/user-image.png','user image', array('class' => 'img-circle', 'style' => 'width:30px')) !!}
                            &nbsp; &nbsp;<b>{!! $data['message']->name !!}</b>
                            <div class="pull-right">
                              {!! $data['message']->created_at !!}
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="=2">{!! $data['message']->ask !!}</td>
                      </tr>
                  </table>
                  <?php // ======================== END Table ================================ ?>
                  
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button id="back" class="btn btn-primary pull-right" style="padding:12px">Back to List</button>
              <button id="reply" class="btn btn-danger pull-right" style="padding:12px;margin-right:8px">Reply</button>
            </div>
          </div><!-- /.box -->

        </section><!-- /.content -->

@section('script')
  <script>
    $('#back').click(function(){
      window.location.href='{{url('/master/message/list')}}';
    })
  </script>
@stop