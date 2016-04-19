<section class="content-header">
    <h1>
        Product
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-shopping-bag"></i> Product</a></li>
        <li><a href="#"></i> Create</a></li>
    </ol>
</section>
<section class="content">
	@if(session('completed'))
		<div class="alert alert-success">
  			{{session('completed')}}
		</div>
	@endif
	@if(session('failed'))
		<div class="alert alert-danger">
  			{{session('failed')}}
		</div>
	@endif
	<div class="box">
		<div class="box-body">
			<div class="col-lg-12">
				{!! Form::open(array('url'=>'master/produk/tambah','method'=>'POST', 'files'=>true, 'class'=>'form-horizontal', 'style'=> 'margin-top:25px')) !!}
				<?php
					print_r($data['array']);
				?>
		        	<div class="form-group">
			            <label class="col-sm-3 control-label">Nama Produk<font color="red">*</font></label>				                
			           	<div class="col-sm-6">
				           	<input type="text" class="form-control" id="prodname" name="prodname" placeholder="Baju Bekas">
			       		</div>
		          	</div>

				    <div class="form-group">
			            <label class="col-sm-3 control-label">Kategori<font color="red">*</font></label>
				        <div class="col-sm-6">
				            <select class="form-control" id="category" name="category">
				                <option value=""> -- Kategori -- </option>
				                @foreach($data['category'] as $category)
				                  	<option value="{{$category->id}}">{{$category->name}}</option>
				                @endforeach
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="col-sm-3 control-label">Subkategori<font color="red">*</font></label>
				        <div class="col-sm-6">
				          	<select class="form-control" id="subcategory" name="subcategory">
				          	</select>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="col-sm-3 control-label">Berat<font color="red">*</font></label>
				        <div class="col-sm-6">
				       		<input type="text" class="form-control" id="weight" name="weight" placeholder="200" min="1">
				        </div>
				    </div>

				    <div class="form-group">
				        <label for="inputPrice" class="col-sm-3 control-label">Harga<font color="red">*</font></label>
				        <div class="col-sm-6">
				        	<input type="text" class="form-control" id="price_input" name="price_input" placeholder="100000">
				        </div>
				    </div>

				    <div class="form-group">
				        <label for="inputDesc" class="col-sm-3 control-label">Deskripsi<font color="red">*</font></label>
				        <div class="col-sm-6">
				        	<textarea rows=5 class="form-control" id="desc_input" name="desc_input"></textarea>
				        </div>
				    </div>

				    <div class="form-group">
	    				<label class="col-sm-3 control-label" for="imageInputFile">Gambar Produk</label>
				    	<div class="col-sm-6">
				    		<font color="red"><i>(maksimal ukuran 1MB dengan format gambar jpeg/jpg, png)</i></font>
				    		<?php 
				    			for ($i=0; $i < 5; $i++) { 
				    		?>
				    		<input type="file" name="tes_{{$i}}" accept="image/*"></input>
				    		<?php
				    			}
				    		?>
				    	</div>
					</div>

					<br/><br/>

				    <div class="form-group">
				      	<div class="col-lg-12">
				     		<p class="text-right">
				      			<button type="submit" class="btn btn-small btn-belizehole pull-right" id="submit" >Submit</button>
				      		</p>
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
			$(document).ready(function()
	    	{
	    		$('#category').change(function()
		        {
		            var id = $('#category').val();
		            $.ajax({
		                url: "{!! url('konten_kategori') !!}",
		                data: {id: id},
		                method:'GET',
		            }).done(function(data){
		                $('#subcategory').html(data);
		            });
		        });
	    	});
	    </script>
    @stop
	