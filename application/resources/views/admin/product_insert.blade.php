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
				        <label for="inputPrice" class="col-sm-3 control-label">Varian<font color="red">*</font><br><i>(saat ini memiliki 0 varian produk)</i></label>
				        <div class="col-sm-6">
				        	<input type="text" class="form-control" id="color" name="color" placeholder="Masukkan satu warna produk">
				            <label class="radio-inline"><input class="radiobtn" type="radio" name="optradio" id="automatic" value="automatic">Otomatis</label>
				            <label class="radio-inline"><input class="radiobtn" type="radio" name="optradio" id="costumize" value="costumize" >Kostumisasi</label>

				            <div class="checkbox">
				            	<label class="col-sm-2"><input id="s" name="0" type="checkbox" value="S">S</label>
				            	<input type="number" min="0" name="s_qty" id="s_qty" disabled="true" value="0"></input>
				            </div>
				            <div class="checkbox">
				              	<label class="col-sm-2"><input id="m" name="1" type="checkbox" value="M">M</label>
				              	<input type="number" min="0" name="m_qty" id="m_qty" disabled="true" value="0"></input>
				            </div>
				            <div class="checkbox">
				            	<label class="col-sm-2"><input id="l" name="2" type="checkbox" value="L">L</label>
				            	<input type="number" min="0" name="l_qty" id="l_qty" disabled="true" value="0"></input>
				            </div>
				            <div class="checkbox">
				            	<label class="col-sm-2"><input id="xl" name="3" type="checkbox" value="XL">XL</label>
				            	<input type="number" min="0" name="xl_qty" id="xl_qty" disabled="true" value="0"></input>
				            </div>
				            <div class="checkbox">
				            	<label class="col-sm-2"><input id="allsize" name="allsize" type="checkbox" value="allsize">All Size</label>
				            	<input type="number" min="0" id="allsize_qty" name="allsize_qty" disabled="true" value="0"></input>
				            </div>
				            <div class="checkbox">
				            <button type="button" class="btn btn-xs btn-info col-sm-3" id="varian" name="varian">Tambah varian</button>
				            </div>
				        </div>

				   </div>

				    <div class="form-group">
				        <label for="inputPrice" class="col-sm-3 control-label">Total<font color="red">*</font></label>
				        <div class="col-sm-6">
				        	<input type="text" class="form-control" id="quantity" name="quantity" min="0" value="0" disabled="true">
				        	<input type="hidden" class="form-control" id="quantity_tmp" name="quantity_tmp" min="0" >
				        </div>
				    </div>

				    <div class="form-group">
				        <label for="inputPrice" class="col-sm-3 control-label">Warna<font color="red">*</font></label>
				        <div class="col-sm-6">
				        	<input type="text" class="form-control" id="color" name="color" placeholder="merah,biru,hitam,dll">
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
	    		$('#varian').click(function()
		        {
		        	var indexID = "coba";  //nama indeksnya
		        	var temp = []; 
					temp[indexID] = ["stuff","lagi"]; //isi arraynya
					var size = "m";
					var array = ["stuff","lagi"];
		        	console.log(array);

		        	$.ajax({
		                url: "{!! url('add_variant') !!}",
		                data: {
		                	index: indexID,
		                	size: size
		                },
		                method:'POST',
		            }).done(function(data){
		                console.log("function")
		            });
		        });

	    		$('#automatic').click(function()
		        {
		        	$('input[type=number]').attr( 'disabled',true);
		            $('#s').prop( "checked",true);
		            $('#s_qty').val(5);
		            $('#s_qty_tmp').val(5);
		            $('#m').prop( "checked",true);
		            $('#m_qty').val(5);
		            $('#m_qty_tmp').val(5);
		            $('#l').prop( "checked",true);
		            $('#l_qty').val(5);
		            $('#l_qty_tmp').val(5);
		            $('#xl').prop( "checked",true);
		            $('#xl_qty').val(5);
		            $('#s_qty_tmp').val(5);
		            $('#allsize').prop( "checked",false);
		            $('#quantity').val(20);
		            $('#quantity_tmp').val(20);
		        });

		        $('#costumize').click(function()
		        {
		        	$('input[type=number]').attr( 'disabled',false);
		        	$('input[type=number]').val( 0);
		        });

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

		        function quantity(){
		        	$('#quantity').val(parseInt($('#s_qty').val())+ parseInt($('#m_qty').val()) + parseInt($('#l_qty').val()) + parseInt($('#xl_qty').val()) + parseInt($('#allsize_qty').val()) );
		        	$('#quantity_tmp').val(parseInt($('#quantity').val()));
		        	console.log($('#quantity_tmp').val());
		        }

		        $('#s').change(function()
		        {
		            var result = parseInt($('#quantity').val()) - parseInt($('#s_qty').val()) ;
		            var show = result.toString();
		            $('#automatic').prop("checked",false);
		            $('#costumize').prop("checked",true);
		            $('#allsize').prop("checked",false);
		            $('#allsize_qty').attr('disabled',true);
		            $('#allsize_qty').val(0);
		            if ($('#s').prop( "checked" )) {
		            	$('#s_qty').attr('disabled',false);
		            	$(function() {
							$('#s_qty').blur(function (){
							quantity();
						   });
						});
		            }else{ 
		            	$('#s_qty').attr('disabled',true);
		            	$('#s_qty').val(0);
		            	if (result = '') {
		            		$('#quantity').val(0);	
		            		$('#quantity_tmp').val(0);	
		            	}else{
		            		$('#quantity').val(show);
		            		$('#quantity_tmp').val(show);
		            	}
		            }
		        });
		        
		        $('#m').change(function()
		        {
		            var result = parseInt($('#quantity').val()) - parseInt($('#m_qty').val()) ;
		            var show = result.toString();
		            $('#automatic').prop("checked",false);
		            $('#costumize').prop("checked",true);
		            $('#allsize').prop("checked",false);
		            $('#allsize_qty').attr('disabled',true);
		            $('#allsize_qty').val(0);
		            if ($('#m').prop( "checked" )) {
		            	$('#m_qty').attr('disabled',false);
		            	$(function() {
							$('#m_qty').blur(function (){
							quantity();
						   });
						});
		            }else{ 
		            	$('#m_qty').attr('disabled',true);
		            	$('#m_qty').val(0);
		            	if (result = '') {
		            		$('#quantity').val(0);
		            		$('#quantity_tmp').val(0);	
		            	}else{
		            		$('#quantity').val(show);
		            		$('#quantity_tmp').val(show);
		            	}
		            }
		        });

		        $('#l').change(function()
		        {
		            var result = parseInt($('#quantity').val()) - parseInt($('#l_qty').val()) ;
		            var show = result.toString();
		            $('#automatic').prop("checked",false);
		            $('#costumize').prop("checked",true);
		            $('#allsize').prop("checked",false);
		            $('#allsize_qty').attr('disabled',true);
		            $('#allsize_qty').val(0);
		            if ($('#l').prop( "checked" )) {
		            	$('#l_qty').attr('disabled',false);
		            	$(function() {
							$('#l_qty').blur(function (){
							quantity();
						   });
						});
		            }else{ 
		            	$('#l_qty').attr('disabled',true);
		            	$('#l_qty').val(0);
		            	if (result = '') {
		            		$('#quantity').val(0);	
		            		$('#quantity_tmp').val(0);
		            	}else{
		            		$('#quantity').val(show);
		            		$('#quantity_tmp').val(show);
		            	}
		            }
		        });

		        $('#xl').change(function()
		        {
		            var result = parseInt($('#quantity').val()) - parseInt($('#xl_qty').val()) ;
		            var show = result.toString();
		            $('#automatic').prop("checked",false);
		            $('#costumize').prop("checked",true);
		            $('#allsize').prop("checked",false);
		            $('#allsize_qty').attr('disabled',true);
		            $('#allsize_qty').val(0);
		            if ($('#xl').prop( "checked" )) {
		            	$('#xl_qty').attr('disabled',false);
		            	$(function() {
							$('#xl_qty').blur(function (){
							quantity();
						   });
						});
		            }else{ 
		            	$('#xl_qty').attr('disabled',true);
		            	$('#xl_qty').val(0);
		            	if (result = '') {
		            		$('#quantity').val(0);	
		            		$('#quantity_tmp').val(0);
		            	}else{
		            		$('#quantity').val(show);
		            		$('#quantity_tmp').val(show);
		            	}
		            }
		        });

		        $('#allsize').change(function()
		        {
		            var result = parseInt($('#quantity').val()) - parseInt($('#allsize_qty').val()) ;
		            var show = result.toString();
		            $('#automatic').prop("checked",false);
		            $('#costumize').prop("checked",true);
		            if ($('#allsize').prop( "checked" )) {
		            	$('#allsize_qty').attr('disabled',false);
		            	$('#s').prop("checked",false);
		            	$('#s_qty').attr('disabled',true);
		            	$('#s_qty').val(0);
		            	$('#m').prop("checked",false);
		            	$('#m_qty').attr('disabled',true);
		            	$('#m_qty').val(0);
		            	$('#l').prop("checked",false);
		            	$('#l_qty').attr('disabled',true);
		            	$('#l_qty').val(0);
		            	$('#xl').prop("checked",false);
		            	$('#xl_qty').attr('disabled',true);
		            	$('#xl_qty').val(0);
		            	$(function() {
							$('#allsize_qty').blur(function (){
							quantity();
						   });
						});
		            }else{ 
		            	$('#allsize_qty').attr('disabled',true);
		            	$('#allsize_qty').val(0);
		            	if (result = '') {
		            		$('#quantity').val(0);	
		            		$('#quantity_tmp').val(0);
		            	}else{
		            		$('#quantity').val(show);
		            		$('#quantity_tmp').val(show);
		            	}
		            }
		        });
	    	});
	    </script>
    @stop
	