	<section class="register">
		<div class="container">
			<div class="row">
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
				<div class="col-lg-12">
				
					<div class="box" style="min-height:280px">
						<div class="col-lg-12">

							<form class="form-horizontal" role="GET" action="">
				              <div class="form-group">
				                <label class="col-sm-3 control-label">Nama Produk<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  <input type="email" class="form-control" id="prodname" name="prodname" placeholder="Baju Bekas">
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
				                <label for="inputPrice" class="col-sm-3 control-label">Harga<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="price_input" name="price_input" placeholder="$200">
				                </div>
				              </div>
				              <div class="form-group">
				                <label for="inputDesc" class="col-sm-3 control-label">Deskripsi<font color="red">*</font></label>
				                <div class="col-sm-6">
				                  <textarea rows=5 class="form-control" id="desc_input" name="desc_input" placeholder="Password">
				                  </textarea>
				                </div>
				              </div>
				              <div class="form-group">
							    <label class="col-sm-3 control-label" for="imageInputFile">Image</label>
							    {!! Form::file('image') !!}
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
			</div>
		</div>
	</section>