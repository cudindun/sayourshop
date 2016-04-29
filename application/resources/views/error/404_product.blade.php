    <!-- Content section -->		
    <section class="main">
              
        <!-- 404 -->
        <section class="404">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        <div class="box">
                            <div class="hgroup title">
                                <h3>ERROR: 404</h3>
                                <h5>Oh no! It looks like something has broken…</h5>
                            </div>

                            <div class="box-content">
                                <p>{{ $data['message'] }}.</p>
                            </div>

                            <div class="buttons">
                                <div class="pull-left">
                                    <a title="← Back home" href="{{url ('/') }}" class="btn btn-primary btn-small">
                                        <i class="icon-chevron-left"></i> &nbsp; Back to the homepage
                                    </a>
                                </div>
                            </div>
                        </div>
                     </div>

                </div>	
            </div>	
        </section>            
        <!-- End class="404" -->
                
    </section>
    <!-- End class="main" -->