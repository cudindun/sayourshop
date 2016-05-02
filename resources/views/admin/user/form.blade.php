<?php
	if(Request::segment(3) == 'edit'){ 
		$link = '/master/user/edit/' . $data['user']->id;
		$activity = 'Edit';
	}else{
	 	$link = '/master/user/create';
	 	$activity = 'Create';
	}
?>

	<section class="content-header">
        <h1>
            User
            <small><?= $activity ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/master/user/list')}}"><i class="fa fa-users"></i> User</a></li>
            <li><a href="{{url('/master/user/create')}}"></i> <?= $activity ?></a></li>
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
			                	<label class="col-sm-3 control-label">Email<font color="red">*</font></label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('email', Request::segment(3) == 'edit' ? $data['user']->email : null, ['placeholder' => 'lol@yeah.com', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>

				          	<div class="form-group">
			                	<label class="col-sm-3 control-label">Password<font color="red">*</font></label>				                
			                	<div class="col-sm-6">
				            	{!! Form::password('pass', ['placeholder' => 'password', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>

				          	<div class="form-group">
			                	<label class="col-sm-3 control-label">First Name</label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('first_name', Request::segment(3) == 'edit' ? $data['user']->first_name : null, ['placeholder' => 'Johny', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>

				          	<div class="form-group">
			                	<label class="col-sm-3 control-label">Last Name</label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('last_name', Request::segment(3) == 'edit' ? $data['user']->last_name : null, ['placeholder' => 'Vanhawk', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>

				          	<div class="form-group">
			                	<label class="col-sm-3 control-label">Phone</label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('phone', Request::segment(3) == 'edit' ? $data['user']->phone : null, ['placeholder' => '+62 ...', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>

				          	<div class="form-group">
			                	<label class="col-sm-3 control-label">Status<font color="red">*</font></label>				                
			                	<div class="col-sm-6">
					            	{!! Form::radio('status', '1') !!} 1<br>
									{!! Form::radio('status', '0') !!} 0
				           		</div>
				          	</div>

				          	<div class="form-group">
			                	<label class="col-sm-3 control-label">Permisions</label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('permis', Request::segment(3) == 'edit' ? $data['user']->phone : null, ['placeholder' => '', 'class' => 'form-control']) !!}
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