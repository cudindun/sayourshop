<title>404 - not found</title>

{!! Html::style('assets/lib/bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('assets/css/style.css') !!}


<div class="bg-error">

    <div class="container">
        <div class="head-error">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">                          
                    <div class="logo">
                        <a href="{{url ('/') }}" title="&larr; Back home">
                            <img src="{{asset('assets/image/logo.png')}}" style="max-width: 100%;">
                        </a>
                    </div>
                </div>            
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="site-error">

            <div class="oops">
                <p>Oooppsss.... Sorry</p>
            </div>

            <div class="alert alert-danger">
                <?= nl2br('The page that you looking is not found') ?>
            </div>

            <p style="margin-left:15px">
                The above error occurred while the Web server was processing your request.
            </p>
            <p style="margin-left:15px">
                Please contact us if you think this is a server error. Thank you.
            </p>
            <p style="margin-left:15px">
                <a href="{!! URL::previous() !!}">Click Here</a> to Previous Page
            </p>

        </div>
    </div>
</div>