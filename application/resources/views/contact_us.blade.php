<!-- Content section -->		
            <section class="main">
                
                <!-- Static page 1 -->
                <section class="static_page_1">


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            @if(session('success'))
                              <br/>
                              <div class="alert alert-success">
                                  {{session('success')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              @endif
                              @if(session('error'))
                              <br/>
                              <div class="alert alert-danger">
                                  {{session('error')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              @endif
                                <section class="static-page">
                                    <div class="row-fluid">
                                        <div class="col-lg-10">
                                            <div class="content">
                                                <h1>Get in touch!</h1>
                                                <p class="lead">Our opening hours are Monday to Friday &mdash; 9:00 to 18:00 GMT</p>
                                                <p>For <strong>hosting</strong> and <strong>support</strong>, please visit our <a href="http://laboutique.ticksy.com" target="_blank">support board</a>. Oh and don’t forget to check out our amazing <a href="http://themeforest.net/user/Tfingi" target="_blank"><strong>La Boutique <em>Pro</em></strong></a> theme.</p>
                                                <hr />
                                                <h3>Kontak Kami</h3>
                                                <div class="map" style="height: 320px; width: 100%; background-color: #F0F0F0;" data-address="16 Clocktower Mews, Newmarket, CB8 8LL, UK" data-zoom="12">&nbsp;</div>
                                                <hr />
                                                <div class="row-fluid">
                                                    <div class="col-md-4">
                                                        <h5><em class="icon-map-marker icon-larger"></em> La Boutique</h5>
                                                        <p>Clocktower Mews<br />Newmarket CB8 8LL<br />United Kingdom</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5><em class="icon-phone icon-larger"></em> Call us</h5>
                                                        <p>Well, don't really call us as we do not offer telephone support :)<br /><strong>+44 1234 567 890</strong></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5><em class="icon-medkit icon-larger"></em> Support</h5>
                                                        <p>A dedicated team provides timely and effective <a href="http://laboutique.ticksy.com" target="_blank">support</a> whenever you need a hand getting things right.</p>
                                                    </div>
                                                </div>
                                                <hr />

                                                <form id="form" enctype="multipart/form-data" action="{{url('contact')}}" role="POST" />
                                                    
                                                    <h3>Send us a message</h3>

                                                    <div class="row-fluid">
                                                        <div class="col-lg-6">
                                                            <div class="control-group">
                                                                <label for="name" class="control-label">Name</label>
                                                                <div class="controls">
                                                                    <input type="text" name="name" id="name" value="<?= Sentinel::check() ? Sentinel::getUser()->first_name." ".Sentinel::getUser()->last_name : "" ?>" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="control-group">
                                                                <label for="email" class="control-label">Email</label>
                                                                <div class="controls">
                                                                    <input type="text" name="email" id="email" value="<?= Sentinel::check() ? Sentinel::getUser()->email : "" ?>" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="col-lg-6">
                                                            <div class="control-group">
                                                                <label for="subject" class="control-label">Subject</label>
                                                                <div class="controls">
                                                                    <input type="text" name="subject" id="subject" value="" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="control-group">
                                                                <label for="order_no" class="control-label">Inquiry</label>
                                                                <div class="controls">
                                                                    <select id="inquiry" class="form-control">
                                                                        <option value="saran">Saran</option>
                                                                        <option value="pertanyaan">Pertanyaan</option>
                                                                        <option value="keluhan">Keluhan</option>
                                                                        <option value="lainnya">Lainnya</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="text" id="any-else" value="lainnya..." class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="col-lg-12">
                                                            <div class="control-group">
                                                                <label for="message" class="control-label">Message</label>
                                                                <div class="controls">
                                                                    <textarea rows=5 name="message" id="message" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="col-lg-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                Send message
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>							
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>


                </section>    
                <!-- End Static page 1 -->
                
            </section>
            <!-- End class="main" -->


    @section('script')
        <script type='text/javascript'>
        $("#any-else").hide();
            $("#inquiry").change(function(){
                if($(this).val()=='lainnya'){
                    $("#any-else").show();
                }else{
                    $("#any-else").hide();
                }
            });
        </script>
    @stop