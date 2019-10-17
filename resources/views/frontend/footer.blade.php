<!-- main content -->
<section class="wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="">
        <div class="row bord-main">
            <div class="clearfix main-ser">
                <!-- Why you should apply here -->

                <?php
                function isMobileDevice() {
                    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
                }

                ?>
				
				
                <div class="provide_ser">
				<div class="container">
				<div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="ser_inner_main">
                         
                            <img src="{{ URL::asset('img/frontend/images/bag.png')}}" alt="indian e visa application guide" title="indian e visa application guide" class="img-responsive"/>
							   <h4>Service Provided By E-Visa India</h4>
                            <p>
                            <div class="col-xs-1"><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class=""><span><b>Customer Care:</b> </span> We provide 24X7 customer service through chat and email. Feel free to contact us anytime.
                            </div>
                            </p>
                            <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class=""><span><b>Processing:</b> </span> The maximum processing time taken by us is 4-7 days.
                            </div>
                            </p>
                            <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class=""><span><b>Quality Check:</b> </span> To achieve maximum approval request ratio, we focus on the quality check. We verify and do the required correction against all the information and documents provided in the application.
                            </div>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="ser_inner_main">
                           
                            <img src="{{ URL::asset('img/frontend/images/hand.png')}}" alt="e visa india online application" title="e visa india online application" class="img-responsive"/>
							 <h4>5-Reasons to choose E-Visa India</h4>
                            <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class=""><span><b>Hassle-free:</b> </span> Innovative services and easy processes, you simply have to fill the form, attach the documents and submit online.
                            </div>
                            </p>
                            <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class=""><span><b>Convenient:</b> </span>We provide convenient service in travel domain for selective nationality.
                            </div>
                            </p>
                           {{-- <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class=""><span><b>Cheaper:</b> </span> Fixed fees, no hidden
                                charges.
                            </div>
                            </p>--}}
                            <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class=""><span><b>Accessibility:</b> </span> Very simple and easy method to apply for a visa online
                            </div>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="ser_inner_main">
                           
                            <img src="{{ URL::asset('img/frontend/images/dig.png')}}" alt="e-Visa - Indian Visa Online"  title="e-Visa - Indian Visa Online" class="img-responsive"/>
							 <h4>E-VISA INDIA LASTEST NEWS</h4>
                            <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class="">Tourist arrivals on E-Visa increases by more than 700%.
                            </div>
                            </p>
                            <p>
                            <div class=""><i class="fa fa-check" aria-hidden="true"></i></div>
                            <div class="">In 2017, India saw the biggest jump in foreign tourists.</div>
                            </p>
                        </div>
                    </div>
                </div> 
				</div> 
				</div>

                <!-- E-Visa Process Flow -->
				<div class="container">
                <div class="clearfix in-pages-sectn">
                    <div class="process-sec">
                            <h2><span><b>Easy Application Process</b></span></h2>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 visastep-1">
                                    <!-- <figure><img src="images/evisa-step-1.jpg" alt="evisa-step-1"></figure>-->
                                    <span>1</span>
                                    <h3>Apply online</h3>
                                    <p>Upload Recent Colored Photo and Passport Page</p>
                                    @if(!isMobileDevice())
                                    <img src="{{ URL::asset('img/frontend/images/arrow.png')}}" alt="arrow" class="arrow-pos-evisa">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 visastep-1">
                                    <!-- <figure><img src="images/evisa-step-2.jpg" alt="evisa-step-2"></figure>-->
                                    <span>2</span>
                                    <h3>Pay e-Visa fee online</h3>
                                    <p>Using Credit / Debit card / Payment Wallet</p>
                                    @if(!isMobileDevice())
                                    <img src="{{ URL::asset('img/frontend/images/arrow.png')}}" alt="arrow" class="arrow-pos-evisa">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 visastep-1">
                                    <!--<figure><img src="images/evisa-step-3.jpg" alt="evisa-step-3"></figure>-->
                                    <span>3</span>
                                    <h3>Receive ETA Online</h3>
                                    <p>Electronic Travel Authorization/ETA Will be sent to your e-mail</p>
                                    @if(!isMobileDevice())
                                    <img src="{{ URL::asset('img/frontend/images/arrow.png')}}" alt="arrow" class="arrow-pos-evisa">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 visastep-1">
                                    <!--<figure><img src="images/evisa-step-4.jpg" alt="evisa-step-4"></figure>-->
                                    <span>4</span>
                                    <h3>Fly To India</h3>
                                    <p>Print ETA and present at Immigration Check Post where eVisa will be stamped on passport. </p>
                                </div>
                            </div>
                    </div>
                    </div>

                    <div class="clearfix in-pages-sectn">

                        <div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.main-footer')