	<section class="content-header">
        <h1>
            Category
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/master/category')}}"><i class="fa fa-folder"></i> Category</a></li>
            <li><a href="{{url('/master/category/create')}}"></i> Create</a></li>
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
						{!! Form::open(array('url' => '/master/category/add', 'class' => 'form-horizontal', 'style' => 'margin-top:25px')) !!}
			              	<div class="form-group">
			                	<label class="col-sm-3 control-label">Nama Kategori<font color="red">*</font></label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('name', null, ['placeholder' => 'Apalah', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>

				          	<div class="form-group">
			                	<label class="col-sm-3 control-label">Nama Slug<font color="red">*</font></label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('slug', null, ['placeholder' => 'suglma', 'class' => 'form-control']) !!}
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