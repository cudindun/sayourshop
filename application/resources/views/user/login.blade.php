<section class="login">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<div class="box" style="min-height:280px">

						<div class="col-lg-6">
						<p>Login User</p>
							<form role="POST" action="{{url('login')}}">
					            <div class="box-content">
					                <div class="row-fluid">
					                    <div class="span6">
					                        <div class="control-group">
					                            <label class="control-label" for="login_email">Email</label>
					                            <div class="controls">
					                                <input class="span12" id="email" type="text" name="email" value="" />
					                            </div>
					                        </div>
					                    </div>
					                    <div class="span6">	
					                        <div class="control-group">					
					                            <label class="control-label" for="login_password">Password</label>
					                            <div class="controls">
					                                <input class="span12" id="password" type="password" name="password" />
					                            </div>
					                        </div>
					                    </div>
					                </div>	
					            </div>

					            <div class="buttons">
					            	<p class="pull-right"><a href="{{url('daftar')}}">Daftar Akun</a></p>
					                <div class="pull-left">
					                    <button type="submit" class=" btn btn-small btn-primary ">Login</button>
					                    <button type="submit" class=" btn btn-small btn-belizehole ">Lupa Password</button>
					                    
					                </div>
					            </div>
					            <br>
					            <br>
				            </form>
			            </div>
			            
			            <div class="col-lg-6">
							<p>Login With anything</p>
					            <div style="padding:20px;">
					                <button type="button" class="btn-group-justified btn btn-small btn-primary ">Instagram</button>
					                <button type="button" class="btn-group-justified btn btn-small btn-primary ">Facebook</button>
					                <button type="button" class="btn-group-justified btn btn-small btn-primary ">Gmail</button>
					                <button type="button" class="btn-group-justified btn btn-small btn-primary ">Twitter</button>
					            </div>    
			            </div>
			            <div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	