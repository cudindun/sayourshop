{!! Form::open(array('url'=>'save_photo','method'=>'POST', 'files'=>true)) !!}
						        		<div class="control-group">
						        			<div class="controls">
						        				{!! Form::file('image') !!}
												{!! Form::submit('Submit', array('class'=>'send-btn')) !!}
						        			</div>
						        		</div>		
						      		{!! Form::close() !!}