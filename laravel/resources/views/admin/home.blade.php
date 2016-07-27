		<section class="content-header">
          <h1>
            Home
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Small boxes (Stat box) -->
          <div class="row">
              <h3 align="center">Order By Status This Day</h3>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{count($data['new_order_day'])}}<sup style="font-size: 12px">order(s)</sup></h3>
                  <p>Menunggu Pembayaran</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-cart"></i>
                </div>
                <a href="{{url('master/transaction/order')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{count($data['has_paid'])}}<sup style="font-size: 12px">order(s)</sup></h3>
                  <p>Telah Dibayar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{count($data['paid'])}}<sup style="font-size: 12px">order(s)</sup></h3>
                  <p>Lunas</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-paperplane"></i>
                </div>
                <a href="{{url('master/user/list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{count($data['send'])}}<sup style="font-size: 12px">order(s)</sup></h3>
                  <p>Dikirim</p>
                </div>
                <div class="icon">
                  <i class="ion-android-checkmark-circle"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

        </section><!-- /.content -->

@section('script')
	<script>
      $(function () {
        $("#userlist_table").DataTable();
      });
    </script>
@stop