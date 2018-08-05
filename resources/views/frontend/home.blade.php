@extends('frontend.layouts.app')

@section('content')
<!-- Content -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="about_us">
                        <h4>Welcome to Indian</br> <span>Visa Online</span></h4>
                        <h3>e-Visa India</h3>
                        <p>All foreign nationals travelling to India must have a valid passport and a print out of the
                            Indian tourist visa approval sent to their email before leaving the country they are
                            travelling from. All tourist are requested to apply for visa to India through the online
                            e-tourist visa link.</br></br> <span>Important Note :</span></br> It is extremely important
                            to understand that once an application is initiated or submitted then you must not start or
                            submit another application against the same passport number.Any and all subsequent
                            applications shall be rejected by the Government of India due to redundancy/duplicity. It is
                            strictly advised to finish and complete only one application and not submit more than one
                            application. You shall not be granted any other visa against the same passport till the time
                            your previous visa is still valid even if any details are incorrect in the visa.</br></br>
                            Once an application is submitted or visa is granted against a passport, it cannot be
                            cancelled, amended or refunded. Applicants are advised to be utmost careful about the
                            details submitted in the applications and must review before finally making the payment. It
                            is strictly advised not submit more than one applications at the same time and only the same
                            application be completed that was initiated. If there is any query about
                            duplicity/redundancy then you must contact immediately on the 24X7 Customer care number and
                            get it checked before proceeding further to avoid any kind of hassle.</p>
                        <h5 class="terms_hd">Indian Visa Application Checklist:</h5>
                        <p>For obtaining the Visa for India, visitors would only need to upload a scanned copy of the
                            front page of the original passport and a digital photograph with white background which can
                            be taken at home with your digital camera or camera phone. It must be with a white
                            background. Please make sure your have these documents ready on your system, laptop, IPAD or
                            smart phone before you start filling the application form because you will be required to
                            upload them with the application. Visa fees are non-refundable.
                        </p>
                        <button class="btn-info about_read">Read More</button>
                    </div>


                    <div class="">
                        <h5 class="slide-toggle"> List of Countries eligible for Indian e Visa:
                            Click here to view the complete list </h5>

                        <div class="col-md-12 col-sm-12 col-xs-12">


                        </div>
                        <div class="box">
                            <div class="col-md-12 col-sm-12 col-xs-12">


                                <div class="clum_new">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="clum-left"><img
                                                    src="{{ URL::asset('img/frontend/images/arow.ico')}}"
                                                    class="img-responsive"><strong>Suriname</strong></div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="clum-left"><img
                                                    src="{{ URL::asset('img/frontend/images/arow.ico')}}"
                                                    alt="Micronesia"><strong>Swaziland</strong></div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="clum-left"><img
                                                    src="{{ URL::asset('img/frontend/images/arow.ico')}}"
                                                    alt="Micronesia"><strong>Sweden</strong></div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="clum-left"><img
                                                    src="{{ URL::asset('img/frontend/images/arow.ico')}}"
                                                    alt="Micronesia"><strong>Switzerland</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection