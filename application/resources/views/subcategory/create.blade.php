	<section class="content-header">
        <h1>
            Subcategory
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/master/subcategory')}}"><i class="fa fa-file"></i> Subcategory</a></li>
            <li><a href="{{url('/master/subcategory/create')}}"></i> Create</a></li>
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
						{!! Form::open(array('url' => '/master/subcategory/add', 'class' => 'form-horizontal', 'style' => 'margin-top:25px')) !!}
			              	<div class="form-group">
			                	<label class="col-sm-3 control-label">Nama Sub Category<font color="red">*</font></label>				                
			                	<div class="col-sm-6">
				            	{!! Form::text('subname', null, ['placeholder' => 'Apajalah', 'class' => 'form-control']) !!}
				           		</div>
				          	</div>

				            <div class="form-group">
				                <label class="col-sm-3 control-label">Kategori<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  {!! Form::select('category', $data['category_list'], null, ['class' => 'form-control']) !!}
				                </div>
				            </div>
				            
				            <div class="form-group">
				                <label for="inputPrice" class="col-sm-3 control-label">Nama Slug<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  {!! Form::text('slug', null, ['placeholder' => 'SLugma', 'class' => 'form-control']) !!}
				                </div>
				            </div>
				            
				            <div class="form-group">
				                <label for="inputDesc" class="col-sm-3 control-label">Properties</label>
				                <div class="col-sm-6">
				                  {!! Form::textarea('properties', null, ['size' => '30x5', 'class' => 'form-control']) !!}
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