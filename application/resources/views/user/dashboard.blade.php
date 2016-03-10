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
								<p class="user-name">{{$data['user']->first_name." ".$data['user']->last_name }}</p>
								<p class="user-email"> {{$data['user']->email}} </p>
								<p>
									<button class="btn btn-primary">Upload</button>
								</p>
							</div>
						</div>
					</div>
					<?php // ================== User Information ================== ?>
					<div class="col-lg-9">
						<div class="box" style="min-height:250px">
							<ul class="nav nav-tabs" role="tablist">
	    						<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
	    						<li role="presentation"><a href="#order" aria-controls="order" role="tab" data-toggle="tab">Order List</a></li>
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

								</div>

								<div role="tabpanel" class="tab-pane fade" id="order">
									juga
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