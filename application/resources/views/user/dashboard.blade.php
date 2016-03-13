<section class="user-dashboard">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php // ================== User sub description ================== ?>
					<div class="col-lg-3">
						<div class="box" style="min-height:250px">
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
							@if($data['user']->image == "")
								<div class="text-center">
									<img src="assets/image/user-image.png" class="user-image">
								</div>
							@else
								<div class="text-center">
									<img src="photo_profile/{{$data['user']->image}}" class="user-image">
								</div>
							@endif
							
							<div class="text-center">
								<p class="user-name">{{ucwords($data['user']->first_name." ".$data['user']->last_name) }}</p>
								<p class="user-email"> {{$data['user']->email}} </p>
								<p>
						        	{!! Form::open(array('url'=>'upload_photopic','method'=>'POST', 'files'=>true)) !!}
						        		<div class="control-group">
						        			<div class="controls">
						        				{!! Form::file('image') !!}
												{!! Form::submit('Submit', array('class'=>'send-btn')) !!}
						        			</div>
						        		</div>		
						      		{!! Form::close() !!}
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
							            		<button type="button" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#myModal">Tambah</button>
							            		<br><br>
							            		@if(session('add'))
												<div class="alert alert-success">
							  						{{session('add')}}
												</div>
												@endif
												@if(session('fail'))
												<div class="alert alert-danger">
							  						{{session('fail')}}
												</div>
												@endif
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
							            					<td>tes bank statis</td>
							            					<td>tes rekening statis</td>
							            					<td>atas nama statis</td>
							            					<td><button class="btn btn-mini btn-alizarin">hapus</button></td>
							            				</tr>
							            			</tbody>
							            		</table>
							            	</div>
							            	<div class="panel-footer"></div>
							            </div>
							        </div>
							        <!-- Modal -->
									<div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <form action="{{url('tambah_rek')}}" method="GET">
										    <div class="modal-content">
										      	<div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Modal Header</h4>
										      	</div>
										      	<div class="modal-body">
											      	<div class="form-group">
										                <label class="control-label">Bank</label>
										                <input type="text" class="form-control" id="bank" name="bank" required>
									              	</div>

									              	<div class="form-group">
										                <label class="control-label">Nomor Rekening</label>
										                <input type="text" class="form-control" id="bank_account" name="bank_account" required>
									              	</div>

									              	<div class="form-group">
										                <label class="control-label">Atas Nama</label>
										                <input type="text" class="form-control" id="account_name" name="account_name" required>
									              	</div>
										      	</div>
										      	<div class="modal-footer">
										      		<button type="submit" class="btn btn-primary">Tambah</button>
										        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										      	</div>
										    </div>
									    </form>

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