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
            <div class="mailbox-read-info">
            <h3>{{ $data['message']->type }}</h3>
            </div> 
            <div class="box-body" style="min-height:150px">
            	<?php // ======================== Table ================================ ?>
              	  <table id="message_table" class="table table-hover">
                      <tr>
                        <td colspan=2>{!! Html::image('assets/image/user-image.png','user image', array('class' => 'img-circle', 'style' => 'width:30px')) !!}
                            &nbsp; &nbsp;<b>{!! $data['message']->name !!}</b> - <i style="color:#888"> {!! $data['message']->email !!} </i>
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
              <button class="pull-right btn btn-default" id="back"><i class="fa fa-arrow-circle-left"></i> Back </button>
            </div>
            
          </div><!-- /.box -->

          <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Reply</h3>
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="emailto" placeholder="{{ $data['message']->email }}" disabled>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </form>
                </div>
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-default" id="send">Send <i class="fa fa-arrow-circle-right"></i></button>
                  <button class="pull-right btn btn-default" id="back"><i class="fa fa-arrow-circle-left"></i> Back </button>
                </div>
              </div>

        </section><!-- /.content -->

@section('script')
  <script>
    $('#back').click(function(){
      window.location.href='{{url('/master/message/list')}}';
    })
  </script>
@stop