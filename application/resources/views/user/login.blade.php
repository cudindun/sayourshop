@extends('template/layout')

@section('content')

	<section class="login">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="box" style="min-height:280px">
					<p> Please insert following information for login</p>
						<div class="col-lg-6 r-border">
							<form class="form-horizontal">
				              <div class="form-group">
				                <label class="col-sm-3 control-label">Email</label>
				                <div class="col-sm-9">
				                  <input type="text" class="form-control" id="email_input" placeholder="Example@email.com">
				                </div>
				              </div>
				              <div class="form-group">
				                <label for="inputPassword" class="col-sm-3 control-label">Password</label>
				                <div class="col-sm-9">
				                  <input type="password" class="form-control" id="pass_input" placeholder="Password">
				                </div>
				              </div>
				              <p class="pull-right"><a href="<?=url()?>/register">Haven't account yet?</a> / <a href="<?=url()?>/forgot">I Forgot my password</a> / <a href="#">Resend Email Confirmation</a></p>
				              <button type="submit" class="btn btn-small btn-belizehole pull-right">Login</button>
				            </form>
			            </div>
			            <div class="col-lg-6">
							<p>Login With anything</p>
			            </div>
			            <div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop