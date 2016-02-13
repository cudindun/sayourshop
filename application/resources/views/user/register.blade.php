	<section class="register">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="box" style="min-height:280px">
						<div class="col-lg-12">
							<p> Please insert following information for register</p>
							<form class="form-horizontal">
				              <div class="form-group">
				                <label class="col-sm-2 control-label">Email</label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="email_input" placeholder="Example@email.com">
				                </div>
				              </div>
				              <div class="form-group">
				                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
				                <div class="col-sm-6">
				                  <input type="password" class="form-control" id="pass_input" placeholder="Password">
				                </div>
				              </div>
				              <div class="form-group">
				                <label for="inputPassword" class="col-sm-2 control-label">Re-Password</label>
				                <div class="col-sm-6">
				                  <input type="password" class="form-control" id="re_pass_input" placeholder="Password">
				                </div>
				              </div>

				              <?php // ========================== Line Sparator ============================ ?>
				              <div class="col-lg-8">
				              	<hr/>
				              </div>
				              <div class="clear"></div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label">Full Name</label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="full_name_input" placeholder="Johny van Hawk">
				                </div>
				              </div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label">Province</label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="province_input" placeholder="Guenos Anguela">
				                </div>
				              </div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label">City</label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="city_input" placeholder="New York">
				                </div>

				              </div><div class="form-group">
				                <label class="col-sm-2 control-label">District</label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="district_input" placeholder="Cimahpar">
				                </div>
				              </div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label">Address</label>
				                <div class="col-sm-6">
				                  <textarea rows="5" class="form-control" id="address_input" ></textarea>
				                </div>
				              </div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label">Phone</label>
				                <div class="col-sm-6">
				                  <input type="text" class="form-control" id="phone_input" placeholder="2245222980">
				                </div>
				              </div>

				              <div class="col-lg-8 col-lg-offset-1">
					              <div class="checkbox">
								    <label>
								      <input type="checkbox" id="accept"> Saya setuju dengan <a href="#" style="color:blue">syarat dan ketentuan</a> yang berlaku dan berjanji tidak akan melanggar
								    </label>
								  </div>
							  </div>

							  <br/><br/>

				              <div class="form-group">
				              	<div class="col-lg-8">
				              	<p class="text-right"><a href="<?=url()?>/login">Already have account?</a> / <a href="<?=url()?>/forgot">I Forgot my password</a> / <a href="#">Resend Email Confirmation</a></p>
				              		<button type="submit" class="btn btn-small btn-belizehole pull-right" id="register_btn" disabled>Register</button>
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

@section('script')
	<script>
		$("#phone_input").on("keydown", function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});

		$("input[id=accept]").click(function(){
			if ($("input[id=accept]").is(":checked")) {
				$("#register_btn").prop("disabled",false);
			}else{
				$("#register_btn").prop("disabled",true);
			}
		});
	</script>
@stop