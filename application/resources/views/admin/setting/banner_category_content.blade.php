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
		      		{!! Form::open(['url' => 'insert_category_banner', 'id' => 'form_banner', 'files' => true, 'class' => 'form-inline']) !!}
		      		<h4>{{$key}}</h4>
		      		<input type="hidden" name="key" value="{{$key}}">
		      		<div class="form-group inline pull-left">
			      		<input class="form-control" type="file" data-toggle="tooltip" title="Tambah Gambar" id="add_banner" name="images" accept="image/*"></input>
			      		<button type="submit" class="form-control btn btn-xs btn-primary" id="submit" name="submit" value="{{$data['category']->slug}}" >Simpan</button>
		      		</div>
		      		{!! Form::close() !!}
		      	</td>
		      	<td>
			    @if($value != '')
			    	<img class="panel panel-primary" src="{{url('application/storage/photo_banner/'.$value)}}" width="20%">
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
        url: "{!! url('delete_banner') !!}",
        data: {
            name: name
          },
        method:'POST',

      }).done(function(data){
      	alert('Banner telah dihapus');
        location.reload();
      });
	});
</script>