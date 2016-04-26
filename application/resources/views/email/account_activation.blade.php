<body>
    <p>CLick the following URL to activated your account : </p><br/>

    <p>{{ url('/account-activation/'.$id.'&key='.$key) }}</p>

    <p>{{ $data['email'] }}</p>
    <p>{{ $data['password'] }}</p>
    <p>{{ $data['first_name'] }}</p>
    <p>{{ $data['last_name'] }}</p>

</body>