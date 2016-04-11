		<section class="content-header">
          <h1>
            Coupon
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Coupon</a></li>
            <li><a href="{{url('/master/coupon')}}"></i> List</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <button type="button" id="add-coupon" class="btn btn-primary" data-toggle="modal" data-target="#coupon-modal">Add Coupon</button>
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
              	  <table id="couponlist_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Max Discount</th>
                        <th>Date Added</th>
                        <th>Date Active</th>
                        <th>Date Expired</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($data['kupon'] as $voc): $code = unserialize($voc->meta_value); ?> 
                      <tr>
                        <td><?=$i?></td>
                        <td><?= $code[0]['code'] ?></td>
                        <td><?= $code[0]['discount'] ?></td>
                        <td><?= $code[0]['maxDiscount'] ?></td>
                        <td><?= $voc->created_at ?></td>
                        <td><?= $code[0]['beginDate'] ?></td>
                        <td><?= $code[0]['endDate'] ?></td>
                      </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                  <?php // ======================== END Data Table ================================ ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->

        <?php //=================== Add Coupon Modal ==================== ?>
        <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Coupon Code</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(array('url' => 'master/coupon/create', 'class' => 'form-horizontal')) !!}
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('name', 'voucher', ['placeholder' => 'voucher', 'class' => 'form-control', 'id' => 'name']) !!}
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Code<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('code', null, ['class' => 'form-control', 'id'=>'code', 'maxlength' => 6]) !!}
                     </div>
                     <button id="generate" type="button" class="btn bg-olive">Generate</button>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Discount<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('disc', null, ['placeholder' => '0.5', 'class' => 'form-control', 'id' => 'disc']) !!}
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Max Discount<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('max-disc', null, ['placeholder' => '100000', 'class' => 'form-control', 'id' => 'max-disc']) !!}
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Begin Date<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                        {!! Form::text('begin-date', null, ['class' => 'form-control', 'id' => 'begin-date']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">End Date<font color="red">*</font></label>                       
                    <div class="col-sm-6">
                        {!! Form::text('end-date', null, ['class' => 'form-control', 'id' => 'end-date']) !!}
                    </div>
                  </div>

                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button id="add" type="button" class="btn btn-primary">Add</button>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>


@section('script')

	<script type="text/javascript">
      $(function () {
        $("#couponlist_table").DataTable();
      });

      $("#generate").click(function(){
        $("#code").val((Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 6)).toUpperCase());
      });

      var begin_date = new Date();
      var end_date = new Date();

      $('#begin-date').datepicker({
          format: 'dd/mm/yyyy',
          startDate: new Date(),
          autoclose: true
      });

      $('#end-date').datepicker({
            format: 'dd/mm/yyyy',
            startDate: new Date(begin_date),
            autoclose: true
      });

      $('#begin-date').change(function(){
        begin_date = $(this).datepicker('getDate'); 
        $('#end-date').data('datepicker').setDate(null);
        $('#end-date').data('datepicker').setStartDate(begin_date);
      });   

      $('#end-date').change(function(){
        end_date = $(this).datepicker('getDate'); 
      });

      $("input").on("keyup", function(){
        if($(this).val()!=""){
          $(this).parent().parent().removeClass("has-warning");
        }else if($(this).val()==""){
          $(this).parent().parent().addClass("has-warning");
        }
      });

      $("#add").click(function(){
        if( $("#name").val() =="" || $("#code").val() =="" || $("#disc").val() =="" || $("#max-disc").val() =="" || $("#begin-date").val() =="" || $("#end-date").val() ==""){
          alert('Harap mengisikan semua data' + $('#begin-date').val());
          return;
        }else{          
            $.ajax({
                url: 'coupon/create',
                type: "post",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {'name':$('#name').val(), 'code':$('#code').val(), 'disc':$('#disc').val(), 'maxdisc':$('#max-disc').val(), 'beginDate':$('#begin-date').val(), 'endDate':$('#end-date').val()},
                success: function(data){
                  window.location.href='{{url("/master/coupon")}}';
                },
                error: function(data){
                  alert('gagal menambahkan data');
                }
            });      
        }
      });
 
    </script>

    <script type="text/javascript">
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    </script>
@stop