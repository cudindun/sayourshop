<body>
	<div class="container">
		<div class="row">
			<div style="background-color:#aaa;padding:4px">
				<div style="background-color:white;padding:15px">
				    <p>CLick the following URL to activated your account : </p>

				    <p>{{ url('/account-activation/'.$id.'&key='.$key) }}</p>

				    <p>Your Secret Information : </p>

				    <table class="table table-hover" style="width:90%;padding:8px">
					    <tr>
					    	<th style="width:10%;text-align:left">Email</th>
					    	<td style="width:40%">{{ $data['email'] }}</td>
					    </tr>
					    <tr>
					    	<th style="width:10%;text-align:left">Password</th>
					    	<td style="width:40%">{{ $data['password'] }}</td>
					    </tr><tr>
					    	<th style="width:10%;text-align:left">First Name</th>
					    	<td style="width:40%">{{ $data['first_name'] }}</td>
					    </tr><tr>
					    	<th style="width:10%;text-align:left">Last Name</th>
					    	<td style="width:40%">{{ $data['last_name'] }}</td>
					    </tr>
					    <tr>
					    	<th style="width:10%;text-align:left">phone</th>
					    	<td style="width:40%">{{ $data['phone'] }}</td>
					    </tr>
				    </table>

				    <p><font style="color:red">*Your Password are encrypted in our database!</font></p>

			    </div>
		    </div>
	    </div>
    </div>

</body>