<section class="user-dashboard">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php // ================== User sub description ================== ?>
					<div class="col-lg-3">
						<div class="box" style="min-height:250px">
							<div class="text-center">
								{!! Html::image('assets/image/user-image.png', 'image', array('class' => 'user-image')) !!}
							</div>
							<div class="text-center">
								<p class="user-name">{{ucwords($data['user']->first_name." ".$data['user']->last_name) }}</p>
								<p class="user-email"> {{$data['user']->email}} </p>
								<p>
								<form action="{{ url('tes_upload') }}">
									<input type="file" id="profile_image" name="profile_image">
									<button type="submit"> Submit</button>
								</form>
								</p>
							</div>
						</div>
					</div>
					<?php // ================== User Information ================== ?>
					<div class="col-lg-9">
						<div class="box" style="min-height:250px">
							<ul class="nav nav-tabs" role="tablist">
	    						<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profil</a></li>
	    						<li role="presentation"><a href="#order" aria-controls="order" role="tab" data-toggle="tab">Daftar Pesanan</a></li>
	    						<li role="presentation"><a href="#wish" aria-controls="order" role="tab" data-toggle="tab">Wish List</a></li>
	    					</ul>

	    					<div class="tab-content" style="background:white;color:black">
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
								<div role="tabpanel" class="tab-pane fade in active" id="profile">
								<form action="{{url('update')}}">
					              <div class="form-group">
					                <label class="col-sm-2 control-label" style="margin: 10px;">Nama Depan</label>
					                <div class="col-sm-8" style="padding: 5px;">
					                  <input type="text" class="form-control" id="first_name_input" name="first_name_input" value="{{$data['user']->first_name}}" required>
					                </div>
					              </div>

					              <div class="form-group">
					                <label class="col-sm-2 control-label" style="margin: 10px;">Nama Belakang</label>
					                <div class="col-sm-8" style="padding: 5px;">
					                  <input type="text" class="form-control" id="last_name_input" name="last_name_input" value="{{$data['user']->last_name}}" required>
					                </div>
					              </div>

					              <div class="form-group">
					                <label class="col-sm-2 control-label" style="margin: 10px;">No.Telepon</label>
					                <div class="col-sm-8" style="padding: 5px;">
					                  <input type="text" class="form-control" id="phone_input" name="phone_input" value="{{$data['user']->phone}}" required>
					                </div>
					              </div>



					              <div class="form-group">
					                <label class="col-sm-2 control-label" style="margin: 10px;">&nbsp;</label>
					                <div class="col-sm-8" style="padding: 5px;">
					                
					                	<button type="submit" class="btn btn-small btn-primary" >Submit</button>
						            	<a href="{{ url('form_ubah_pass')}}"> 
							              	<button type="button" class="btn btn-small btn-peterriver">
							              		Ubah Password
							              	</button>
						              	</a>
					                </div>
					              </div>

					            </form>
					            	<div class="col-sm-11">
						            	<div class="panel panel-success" style="margin: 20px 35px 0 10px;padding: 0px; ">
							            	<div class="panel-heading" style="margin: 0px;"><b>Rekening Bank</b></div>
							            	<div class="panel-body">
							            		<button class="btn btn-mini btn-primary">Tambah</button>
							            		<br><br>
							            		<table class="table table-responsive">
							            			<thead>
								            			<tr>
								            				<th>Bank</th>
								            				<th>No.Rekening</th>
								            				<th>Atas Nama</th>
								            				<th>Opsi</th>
								            			</tr>
							            			</thead>
							            			<tbody>
							            				<tr>
							            					<td>&nbsp;</td>
							            					<td>&nbsp;</td>
							            					<td>&nbsp;</td>
							            					<td><button class="btn btn-mini btn-alizarin">hapus</button></td>
							            				</tr>
							            			</tbody>
							            		</table>
							            	</div>
							            	<div class="panel-footer"></div>
							            </div>
							        </div>
								</div>


								<div role="tabpanel" class="tab-pane fade" id="order">
									<table class="table table-responsive">
										<thead>
											<tr>
												<th>Invoice</th>
												<th>Tanggal Pemesanan</th>
							                    <th>Total Harga</th>
							                    <th>Status</th>
							                    <th>No. Resi</th>
							                    <th>Opsi</th>
											</tr>
										</thead>
							            <tbody>
							            <tr>
							            	<td>&nbsp;</td>
							            	<td>&nbsp;</td>
							            	<td>&nbsp;</td>
							            	<td>&nbsp;</td>
							            	<td>&nbsp;</td>
							            	<td><button class="btn btn-mini btn-primary">Detail</button></td>
							            </tr>
							            </tbody>
									</table>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="wish">
									yeah
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>