<div class="ratings-items">
                                            @foreach($data['review'] as $reviews)
                                            <article class="rating-item">
                                                <div class="row-fluid">
                                                    <div class="span1">
                                                        @if($reviews->user->image != '')
                                                        <img src="{{url('application/storage/photo_profile/'.$reviews->user->image)}}" class="gravatar" width="55px" alt="" />
                                                        @else
                                                        <img src="{{asset('assets/image/user-image.png')}}" class="user-image" width="55px">
                                                        @endif
                                                    </div>
                                                    <div class="span11">
                                                        <h6>
                                                            {{ucwords($reviews->user->first_name)}} {{ucwords($reviews->user->last_name)}} <small><i>({{ date_format(date_create($reviews->created_at), "d M Y")}})</i></small>
                                                        </h6>
                                                        <p>{{$reviews->review}}</p>
                                                        <br>
                                                        <div class="rating">
                                                            <?php 
                                                                for ($i=0; $i < $reviews->rating ; $i++) { 
                                                            ?>
                                                            <i class="fa fa-star" style="color: #1abc9c;"></i>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            @endforeach
                                                    <div align="center">
                                                        {!! $data['review']->render(); !!}    
                                                    </div>
                                        </div>
                                        <script type="text/javascript">
    $('.pagination a').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var product_id = $('input[name=id]').val();
        $.ajax({
            url: url,
            data: {
                product_id: product_id
            },
            method:'POST',
        }).done(function(data){
            $('#ratings').html(data);
        });
    });

</script>