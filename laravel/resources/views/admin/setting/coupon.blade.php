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
              <br/><br/>
              <div class="alert alert-success">
                  {{session('success')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif
              @if(session('error'))
              <br/><br/>
              <div class="alert alert-danger">
                  {{session('error')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
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
                        <th>Discount (%)</th>
                        <th>Max Discount</th>
                        <th>Date Active</th>
                        <th>Date Expired</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($data['kupon'] as $voc): $code = unserialize($voc->meta_value); ?>
                      <?php $i=1; foreach($code as $code):?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?= $code['code'] ?></td>
                        <td><?= $code['discount'] ?></td>
                        <td><?= $code['maxDiscount'] ?></td>
                        <td><?= $code['beginDate'] ?></td>
                        <td><?= $code['endDate'] ?></td>
                        <td>
                          <a href="#" id="view" data-toggle="modal" data-target="#view-coupon-modal" value="<?= $i-1 ?>"><i class="fa fa-eye"></i></a>
                          <a href="#" id="edit-coupon" data-toggle="modal" data-target="#edit-coupon-modal" value="<?= $i-1 ?>"><font color="orange"><i class="fa fa-pencil"></i></font></a>
                          <a href="#" id="delete" value="<?= $i-1 ?>" method="post"><font color="red"><i class="fa fa-remove"></i></font></a>
                        </td>
                      </tr>
                      <?php $i++; endforeach; ?>
                      <?php endforeach; ?>
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
                    <label class="col-sm-3 control-label">Discount (%)<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('disc', null, ['placeholder' => '10', 'class' => 'form-control', 'id' => 'disc']) !!}
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

        <?php //=================== Edit Coupon Modal ==================== ?>
        <div class="modal fade" id="edit-coupon-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Coupon Code</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(array('url' => 'master/coupon/create', 'class' => 'form-horizontal')) !!}
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('edit-name', 'voucher', ['placeholder' => 'voucher', 'class' => 'form-control', 'id' => 'name']) !!}
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Code<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('edit-code', null, ['class' => 'form-control', 'id'=>'code', 'maxlength' => 6]) !!}
                     </div>
                     <button id="edit-generate" type="button" class="btn bg-olive">Generate</button>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Discount<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('edit-disc', null, ['placeholder' => '0.5', 'class' => 'form-control', 'id' => 'disc']) !!}
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Max Discount<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                     {!! Form::text('edit-max-disc', null, ['placeholder' => '100000', 'class' => 'form-control', 'id' => 'max-disc']) !!}
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Begin Date<font color="red">*</font></label>                       
                     <div class="col-sm-6">
                        {!! Form::text('edit-begin-date', null, ['class' => 'form-control', 'id' => 'edit-begin-date']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">End Date<font color="red">*</font></label>                       
                    <div class="col-sm-6">
                        {!! Form::text('edit-end-date', null, ['class' => 'form-control', 'id' => 'edit-end-date']) !!}
                    </div>
                  </div>

                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button id="edit" type="button" class="btn btn-primary" value="0">Edit</button>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>

        <?php //=================== View Coupon Modal ==================== ?>
        <div class="modal fade" id="view-coupon-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Coupon Code</h4>
              </div>
              <div class="modal-body">
                  <table id="distributor_table" class="table table-hover">
                      <tr>
                        <th>ID</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Code Coupon</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Discount (%)</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Max Discount</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Begin Date</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th>End Date</th>
                        <td></td>
                      </tr>
                  </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
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

      $("#edit-generate").click(function(){
        $("input[name=edit-code]").val((Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 6)).toUpperCase());
      });

      $("input").on("keyup", function(){
        if($(this).val()!=""){
          $(this).parent().parent().removeClass("has-warning");
        }else if($(this).val()==""){
          $(this).parent().parent().addClass("has-warning");
        }
      });

      <?php // =================== Date Picker Control =========================== ?>

      var begin_date = new Date();
      var end_date = new Date();

      $('#begin-date').datepicker({
          format: 'yyyy-mm-dd',
          startDate: new Date(),
          autoclose: true
      });

      $('#end-date').datepicker({
            format: 'yyyy-mm-dd',
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

      $('#edit-begin-date').datepicker({
          format: 'yyyy-mm-dd',
          startDate: new Date(),
          autoclose: true
      });

      $('#edit-end-date').datepicker({
            format: 'yyyy-mm-dd',
            startDate: new Date(begin_date),
            autoclose: true
      });

      $('#edit-begin-date').change(function(){
        begin_date = $(this).datepicker('getDate'); 
        $('#edit-end-date').data('datepicker').setDate(null);
        $('#edit-end-date').data('datepicker').setStartDate(begin_date);
      });   

      $('#edit-end-date').change(function(){
        end_date = $(this).datepicker('getDate'); 
      });


      <?php // =================== Option Tool Control =========================== ?>

      $("a#view").click(function(){
        //alert($(this).parents('tr').children('td:eq(1)').text());
        $("#view-coupon-modal").find("tr:eq(0) > td").html($(this).attr("value"));
        $("#view-coupon-modal").find("tr:eq(1) > td").html($(this).parents('tr').children('td:eq(1)').text());
        $("#view-coupon-modal").find("tr:eq(2) > td").html($(this).parents('tr').children('td:eq(2)').text() * 100 + "%");
        $("#view-coupon-modal").find("tr:eq(3) > td").html("Rp. " + $(this).parents('tr').children('td:eq(3)').text());
        $("#view-coupon-modal").find("tr:eq(4) > td").html($(this).parents('tr').children('td:eq(4)').text());
        $("#view-coupon-modal").find("tr:eq(5) > td").html($(this).parents('tr').children('td:eq(5)').text());
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
                  window.location.href='{{url("/master/setting/coupon")}}';
                },
                error: function(data){
                  alert('gagal menambahkan data');
                }
            });      
        }
      });

      $("a#edit-coupon").click(function(){
        var code = $(this).parents('tr').children('td:eq(1)').text();
        var value = $(this).attr("value");
        //alert($(this).parents('tr').children('td:eq(2)').text());
        $("#edit-coupon-modal").find("#code").val(code)
        $("#edit-coupon-modal").find("#disc").val($(this).parents('tr').children('td:eq(2)').text())
        $("#edit-coupon-modal").find("#max-disc").val($(this).parents('tr').children('td:eq(3)').text())
        //$("#edit-coupon-modal").find("#edit-begin-date").val($(this).parents('tr').children('td:eq(4)').text())
        //$("#edit-coupon-modal").find("#edit-end-date").val($(this).parents('tr').children('td:eq(5)').text())
        $('#edit-begin-date').data('datepicker').setDate($(this).parents('tr').children('td:eq(4)').text());
        $('#edit-begin-date').data('datepicker').setStartDate($(this).parents('tr').children('td:eq(4)').text());
        $('#edit-end-date').data('datepicker').setDate($(this).parents('tr').children('td:eq(5)').text());
        $('#edit-end-date').data('datepicker').setStartDate($(this).parents('tr').children('td:eq(4)').text());

        $("#edit").attr("value", value);

      });

      $("#edit").click(function(){
        if($("input[name=edit-name]").val() =="" || $("input[name=edit-code]").val() =="" || $("input[name=edit-disc]").val() =="" || $("input[name=edit-max-disc]").val() =="" || $("input[name=edit-begin-date]").val() =="" || $("input[name=edit-end-date]").val() ==""){
          alert('Harap mengisikan semua data');
          return;
        }else{          
            $.ajax({
                url: 'coupon/edit/' + $(this).attr("value"),
                type: "post",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {'name':$('input[name=edit-name]').val(), 'code':$('input[name=edit-code]').val(), 'disc':$('input[name=edit-disc]').val(), 'maxdisc':$('input[name=edit-max-disc]').val(), 'beginDate':$('#edit-begin-date').val(), 'endDate':$('#edit-end-date').val()},
                success: function(data){
                  window.location.href='{{url("/master/setting/coupon")}}';
                },
                error: function(data){
                  alert('gagal mengubah data');
                }
            });      
        }
      });

      $('a#delete').click(function(){
        r = confirm("Are You Sure Want to Remove This Item?");

        if (r == true) {
           window.location.href='{{url("/master/setting/coupon")}}/'+$(this).attr("value");
        }

      });
 
    </script>

    <script type="text/javascript">
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    </script>
@stop