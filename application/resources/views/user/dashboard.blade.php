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
								<p class="user-name">Full Name</p>
								<p class="user-email"> Email@nanti_panjang.kok </p>
								<p>
									<button class="btn btn-primary">Change</button>
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
								<div role="tabpanel" class="tab-pane fade in active" id="profile">
									hai
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