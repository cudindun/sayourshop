{!! Form::open(array('url'=>'save_photo','method'=>'POST', 'files'=>true)) !!}
						        		<div class="control-group">
						        			<div class="controls">
						        				{!! Form::file('image1') !!}
						        				{!! Form::file('image2') !!}
						        				{!! Form::file('image3') !!}
						        				{!! Form::file('image4') !!}
						        				{!! Form::file('image5') !!}
												{!! Form::submit('Submit', array('class'=>'send-btn')) !!}
						        			</div>

						        		</div>		
						      		{!! Form::close() !!}