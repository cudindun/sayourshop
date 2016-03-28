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
						<form class="form-horizontal" role="GET" action="" style="margin-top:25px">
			              	<div class="form-group">
			                	<label class="col-sm-3 control-label">Nama Sub Category<font color="red">*</font></label>				                <div class="col-sm-6">
				            	<input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Baju Bekas">
				           		</div>
				          	</div>

				            <div class="form-group">
				                <label class="col-sm-3 control-label">Kategori<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  <select class="form-control">
				                  	<option> -- Kategori -- </option>
				                  	<option> 1 </option>
				                  	<option> 2 </option>
				                  </select>
				                </div>
				            </div>
				            
				            <div class="form-group">
				                <label for="inputPrice" class="col-sm-3 control-label">Nama Slug<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="slug_name" name="slug_name" placeholder="slugma teaa">
				                </div>
				            </div>
				            
				            <div class="form-group">
				                <label for="inputDesc" class="col-sm-3 control-label">Properties<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  <textarea rows=5 class="form-control" id="desc_input" name="desc_input">
				                  </textarea>
				                </div>
				            </div>

							  <br/><br/>

				            <div class="form-group">
				              	<div class="col-lg-12">
				              	<p class="text-right">
				              		<button type="submit" class="btn btn-small btn-belizehole pull-right" id="register_btn" >Submit</button>
				              	</div>
				            </div>
				        </form>
			        </div>
			        <div class="clear"></div>
				</div>
			</div>
	</section>