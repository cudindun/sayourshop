		<section class="content-header">
          <h1>
            Mailbox
            <small>{{$data['total_message']->where('status',0)->count()}} new Message</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> Mailbox</a></li>
          </ol>
        </section>

         <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <?php // <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a> ?>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Mails</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <?= $data['total_message']->where('status',0)->count() > 0 ? '<span class="label label-primary pull-right">'.$data['total_message']->where('status',0)->count().'</span>' : ''?></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Inbox</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                <?php
                  // <div class="mailbox-controls">
                  //   <!-- Check all button -->
                  //   <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                  //   <div class="btn-group">
                  //     <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  //     <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  //     <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                  //   </div>/.btn-group
                  //   <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                  //   <div class="pull-right">
                  //     1-50/200
                  //     <div class="btn-group">
                  //       <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  //       <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  //     </div><!-- /.btn-group -->
                  //   </div><!-- /.pull-right -->
                  // </div>
                  ?>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                        @foreach($data['message'] as $message)
                        <tr>
                          <td><input type="checkbox"></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="{{url('master/message/view')}}/{{$message->id}}">{{$message->name}}</a></td>
                          <td class="mailbox-subject">
                            <a href="{{url('master/message/view')}}/{{$message->id}}" style="color:black">
                              {{$message->type}} - <?= strlen($message->ask) <= 40 ? $message->ask : substr($message->ask, 0, 40) . '...' ?>
                            </a>
                          </td>
                          <td class="mailbox-attachment">
                            <?=
                              $message->status == 1 ? '<i class="fa fa-check" title="Telah di check" aria-label="checked"></i>' : ''
                            ?>
                          </td>
                          <td class="mailbox-date text-center" style="width:20%">
                              <?php 
                                $now = Date("Y-m-d H:i:s");
                                $now = new DateTime($now);
                                $date = strtotime($message->created_at);
                                $date = date("Y-m-d H:i:s", $date);
                                $date = new DateTime($date); 
                                $diff  = $date->diff($now); 
                                if($diff->d == 0){
                                  if($diff->h == 0){
                                    if($diff->i == 0){
                                      echo 'Less than a minute ago';
                                    }else{
                                      echo $diff->i . ' minutes ago';
                                    }                                   
                                  }else{
                                    echo $diff->h . ' hours ago';
                                  }
                                }else{
                                  echo $diff->d . ' days ago';
                                }
                              ?>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1- {{ $data['total_message']->count() }} / {{ $data['total_message']->count() }}
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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