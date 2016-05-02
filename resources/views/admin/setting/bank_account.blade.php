<section class="content-header">
    <h1>
        Bank Account
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{url('/master/category')}}"><i class="fa fa-folder"></i> Bank Account</a></li>
        <li><a href="{{url('/master/category/create')}}"></i> Create</a></li>
    </ol>
</section>
<section class="content">
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
	<div class="box">
		<div class="box-body">
			<div class="col-lg-12">
				<form class="form-horizontal" role="GET" action="{{url('master/setting/bank_account/add')}}" style="margin-top:25px">
		            <div class="form-group">
			            <label class="col-sm-3 control-label">Nama Bank<font color="red">*</font></label>				                
			            <div class="col-sm-6">
				            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="BRI, Mandiri, dll">
				        </div>
				    </div>
				    <div class="form-group">
			            <label class="col-sm-3 control-label">Nomor Rekening<font color="red">*</font></label>				                
			            <div class="col-sm-6">
				            <input type="text" class="form-control" id="bank_account" name="bank_account" placeholder="1234567789">
				       	</div>
				    </div>
				    <div class="form-group">
			            <label class="col-sm-3 control-label">Nama Pemilik Rekening<font color="red">*</font></label>
			            <div class="col-sm-6">
				            <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Nama Lengkap">
				       	</div>
				    </div>
				    <div class="form-group">
			            <label class="col-sm-3 control-label"></label>
			            <div class="col-sm-6">
			            	<button type="submit" class="btn btn-small btn-primary">Tambah</button>
				       	</div>
				    </div>
					<br/><br/>
				</form>
			</div>
			<div class="clear"></div>
			<table class="table table-bordered table-hover" id="account_table">
				<thead>
					<tr>
						<th>Bank</th>
						<th>No.Rekening</th>
						<th>Atas Nama</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $bank_account = unserialize($data['bank_account']->meta_value)?>
					@foreach( $bank_account as $key => $account)
						<tr>
							@foreach($account as $value)
								<td>{{$value}}</td>
							@endforeach
								<td><a href="{{url('master/setting/bank_account/'.$key)}}"><button type="button" class="btn btn-danger">Hapus</button></a></td>
						</tr>
					@endforeach			            				
				</tbody>
			</table>
		</div>
	</div>
</section>
@section('script')
	<script>
      $(function () {
        $("#account_table").DataTable();
      });
    </script>
@stop