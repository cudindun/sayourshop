
		<section class="content-header">
          <h1>
            Banner
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/master')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-file"></i> Banner</a></li>
            <li><a href="{{url('/master/product/list')}}"></i> List</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="box box-warning">
            @if(session('success'))
              <div class="alert alert-success">
                {{session('success')}}
              </div>
            @endif
            @if(session('fail'))
              <div class="alert alert-danger">
            {{session('fail')}}
              </div>
            @endif
            <div class="box-header with-border">
              <h3>List Banner</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" id="home_banner" name="home_banner"><h4>Homepage</h4></button>
              @foreach($data['categories'] as $category)
                <button class="btn btn-primary category_banner" id="category_banner" name="{{$category->slug}}"><h4>{{ucwords($category->name)}}</h4></button>
              @endforeach
              <hr>
              <div id="banner_content"></div>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          
        </section><!-- /.content -->
@section('script')
  <script>
    $('#home_banner').click(function(){
      $.ajax({
        url: "{!! url('home_banner') !!}",
        method:'GET',
      }).done(function(data){
        $('#banner_content').html(data);
      });
    });

    $('.category_banner').click(function(){
      var name = this.name;
      $.ajax({
        url: "{!! url('category_banner') !!}",
        data: {
         name: name, 
        },
        method:'GET',
      }).done(function(data){
        $('#banner_content').html(data);
      });
    });
  </script>
@stop