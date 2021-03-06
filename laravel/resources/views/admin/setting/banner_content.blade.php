<div class="panel panel-primary">
    <div class="panel-heading">
      	<h4>{{ucwords($data['title'])}}</h4>
    </div>
    <div class="panel-body">
      	<table class="table table-responsive table-bordered">
      		<?php $banner = unserialize($data['banner']->meta_value);?>
      		@foreach($banner as $key => $value)
    		<tr>
		    	<td>
		      		{!! Form::open(['url' => 'insert_banner', 'id' => 'form_banner', 'files' => true, 'class' => 'form-inline']) !!}
		      		<h4>{{$key}}</h4>
		      		<input type="hidden" class="key" name="key" value="{{$key}}">
		      		<div class="form-group inline pull-left">
		      			@if($key == "slider1" || $key == "slider2")
			      			<input class="form-control" type="file" data-toggle="tooltip" title="Tambah Gambar" id="add_banner" name="images[]" accept="image/*" multiple="true"></input>
			      		@else
			      			<input class="form-control" type="file" data-toggle="tooltip" title="Tambah Gambar" id="add_banner" name="images[]" accept="image/*"></input>
			      		@endif
			      		<button type="submit" class="form-control btn btn-xs btn-primary" id="submit" >Simpan</button>
		      		</div>
		      		{!! Form::close() !!}
		      	</td>
		      	<td>
		      	@if($value != '' && is_array($value))
			      	@foreach($value as $slide)
			        <img class="panel panel-primary" src="{{url('photo_banner/'.$slide)}}" width="20%">
			        <a href="#" id="{{$slide}}" name="{{$slide}}" method="post" class="delete"><font color="red"><i class="fa fa-remove" data-toggle="tooltip" title="Hapus Gambar" style="margin: 5px;"></i></font></a>
			        @endforeach
			    @elseif($value != '')
			    	<img class="panel panel-primary" src="{{url('photo_banner/'.$value)}}" width="20%">
			        <a href="#" id="{{$value}}" name="{{$value}}" method="post" class="delete"><font color="red"><i class="fa fa-remove" data-toggle="tooltip" title="Hapus Gambar" style="margin: 5px;"></i></font></a>
			    @else
			    	Banner belum tersedia
			    @endif
		      </td>
		    </tr>
		    @endforeach
		</table>
    </div>
<div class="panel-footer"></div>
<script type="text/javascript">
	$('.delete').click(function(){
		var name = this.name;
		$.ajax({
        url: "{!! url('delete_home_banner') !!}",
        data: {
            name: name
          },
        method:'POST',
      }).done(function(data){
        $.get("{!! url('home_banner') !!}",function(result){
				$('#banner_content').html(result);
			});
      });
	});
</script>