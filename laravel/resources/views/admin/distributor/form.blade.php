<?php
	if(Request::segment(3) == 'edit'){ 
		$link = '/master/distributor/edit/' . $data['distributor']->id;
		$activity = 'Edit';
	}else{
	 	$link = '/master/distributor/create';
	 	$activity = 'Create';
	}
?>

	<section class="content-header">
        <h1>
            Distributor
            <small><?= $activity ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/master/distributor/list')}}"><i class="fa fa-file"></i> Distributor</a></li>
            <li><a href="{{url('/master/distributor/create')}}"></i> <?= $activity ?></a></li>
        </ol>
    </section>

	<section class="content">
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

			<div class="box">
				<div class="box-body">
					<div class="col-lg-12">
						{!! Form::open(array('url' => $link, 'class' => 'form-horizontal', 'style' => 'margin-top:25px')) !!}
			              	<div class="form-group">
			                	<label class="col-sm-3 control-label">Nama Distributor<font color="red">*</font></label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('name', Request::segment(3) == 'edit' ? $data['distributor']->name : null, ['placeholder' => 'John vanHawk', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>
				            
				            <div class="form-group">
				                <label for="inputPrice" class="col-sm-3 control-label">Email</label>
				                <div class="col-sm-6">
				                  {!! Form::text('email', Request::segment(3) == 'edit' ? $data['distributor']->email : null, ['placeholder' => 'pajadah@lol.com', 'class' => 'form-control']) !!}
				                </div>
				            </div>
				            
				            <div class="form-group">
				                <label for="inputDesc" class="col-sm-3 control-label">Address</label>
				                <div class="col-sm-6">
				                  {!! Form::textarea('address', Request::segment(3) == 'edit' ? $data['distributor']->address : null, ['size' => '30x5', 'class' => 'form-control']) !!}
				                </div>
				            </div>

				            <div class="form-group">
				                <label for="inputPrice" class="col-sm-3 control-label">Phone</label>
				                <div class="col-sm-6">
				                  {!! Form::text('phone', Request::segment(3) == 'edit' ? $data['distributor']->phone : null, ['placeholder' => '1234-1234', 'class' => 'form-control', 'maxlength' => 20]) !!}
				                </div>
				            </div>

							  <br/><br/>

				            <div class="form-group">
				              	<div class="col-lg-12">
				              	<p class="text-right">
				              		<?= Form::submit('Submit', ['class' => 'btn btn-small btn-belizehole pull-right', 'id' => 'submit_btn']); ?>
				              	</div>
				            </div>
				        {!! Form::close() !!}
			        </div>
			        <div class="clear"></div>
				</div>
			</div>
	</section>

	@section('script')

	<script type="text/javascript">
		$("input[name=phone]").on("keydown", function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
	</script>

	@stop