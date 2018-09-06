@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <h4 class="text-center">Port of arrival :{{ $visa->p1_port_arrival }}</h4>
            <h4 class="text-center">Application Type : {{ $visa->p1_app_type }}</h4>
            <h4 class="text-center">Data saved Successfully.Please note down the Temporary Application ID:  {{ $visa->visa_no }}</h4>
            <div class="row">
                <div class="form-outer">
                    <div class="title">
                        <div class="form-group">
                            <div class="col-sm-8 col-xs-12">

                                <h3>Details of Visa Sought</h3>

                            </div>
                            <div class="col-sm-4 col-xs-12">

                                <h3> 	Help</h3>

                            </div>

                        </div>
                    </div>

                        {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process4']) }}
                        {{ Form::hidden('evpuid', $visa->visa_no ) }}
                        {{ Form::hidden('ps', 10004 ) }}

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of Visa</label>
                            <div class="col-sm-4 col-xs-12">
                                {{$visa->p1_visa_type}}
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Select Visa Type You are Applying For
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Duration of Visa (in Days)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" type="text" disabled="disabled" value="60" />
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Duration of Visit (in Days)
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>No. of Entries</label>
                            <div class="col-sm-4 col-xs-12">

                                <select name="visa_entry_id" class="form-control" id="old_visa_type_id">
                                    <option value="Double" selected="selected">Double</option>
                                </select >
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                No. of Entries
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Port of Arrival in India</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_port_arrival }}
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Port of Arrival in India
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Expected Port of Exit from India</label>
                            <div class="col-sm-4 col-xs-12">
                                @if(!empty($port_arrival))
                                    {{ Form::select('p4_expected_port_exit', $port_arrival, $visa->p4_expected_port_exit, ['class' => 'form-control select2 box-size', 'id' => 'p4_expected_port_exit']) }}
                                @else
                                    {{ Form::select('p4_expected_port_exit', $port_arrival, 0, ['class' => 'form-control select2 box-size', 'id' => 'p4_expected_port_exit']) }}
                                @endif
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Expected Port of Exit from India
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Places Likely To Be Visited</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{$visa->p4_place_likely_visit}}" placeholder="Places likely to be Visited" id="p4_place_likely_visit" name="p4_place_likely_visit" />
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Places to be Visited
                            </div>
                        </div>


                    <div class="form-group">
                                <div class="col-sm-8 col-xs-12 title">
                                    <h3>Previous Visa/Currently valid Visa Details</h3>
                                </div>
                    </div>


                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span>Have You Ever Visited India Before?</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="radio" value="Yes"  id="p4_visit_india_before1" name="p4_visit_india_before"   {{ $visa->p4_visit_india_before == 'Yes' ? 'checked="checked"' : '' }}/><span>Yes</span>
                                <input  type="radio" value="No" id="p4_visit_india_before2" name="p4_visit_india_before" {{ $visa->p4_visit_india_before == 'No' ? 'checked="checked"' : '' }}  /><span>No</span>
                            </div>
                            <div class="col-sm-4 col-xs-12">If Yes Please Give Details</div>
                        </div>

                        <div id="prev_visa_details">
                            <div class="form-group" >
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Address </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Address" value="{{$visa->p4_address1}}" placeholder="Address" id="p4_address1" name="p4_address1"/>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Enter The Address of Stay During Your Last Visit
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Cities Previously Visited in India  </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" value="{{$visa->p4_city_prev_visit}}" placeholder="Cities Previously Visited in India" class="form-control" id="p4_city_prev_visit" name="p4_city_prev_visit" >
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Cities in India visited (comma separated)
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Last Indian Visa No/Currently Valid Indian Visa No</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" value="{{$visa->p4_last_curr_visa_no}}"  placeholder="Last Indian Visa No/Currently Valid Indian Visa No" class="form-control" id="p4_last_curr_visa_no" name="p4_last_curr_visa_no" >
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Last Indian Visa No / Currently valid Visa no
                                </div>
                            </div>
                            <!--	<div class="form-group">
                               <input class="form-control" placeholder="House No./Street"  id="perm_address1" name="perm_address1" />
                               </div>-->
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of Visa</label>
                                <div class="col-sm-4 col-xs-12">
                                    @if(!empty($visatype))
                                        {{ Form::select('p4_type_visa', $visatype, $visa->p4_type_visa, ['class' => 'form-control select2 box-size', 'id' => 'p4_type_visa']) }}
                                    @else
                                        {{ Form::select('p4_type_visa', $visatype, 0, ['class' => 'form-control select2 box-size', 'id' => 'p4_type_visa']) }}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Type of Visa
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Place of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Place of Issue" id="p4_place_issue"  value="{{$visa->p4_place_issue}}" name="p4_place_issue"/>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Place of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Date of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{$visa->p4_date_issue}}"   id="p4_date_issue" name="p4_date_issue" placeholder="Date of Issue" type="text"/>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Date of Issue
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Has Permission To Visit Or To Extend Stay in India Previously Been Refused?
                                Yes  / No  </label>
                            <div class="col-sm-4 col-xs-12">
                                Yes <input  type="radio" {{ $visa->p4_permission_visit == 'Yes' ? 'checked="checked"' : ''}} name="p4_permission_visit"  value="Yes"  id="p4_permission_visit1"  />
                                No  <input  type="radio" value="No"  {{ $visa->p4_permission_visit == 'No' ? 'checked="checked"' : ''}} name="p4_permission_visit"  id="p4_permission_visit2"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Refuse Details Yes /No
                            </div>
                        </div>
                        <div class="form-group" id="perm">
                            <label class="form-check-label col-sm-4 col-xs-12">	If So, When And By Whom (Mention Control No. and Date Also)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{$visa->p4_permission_visit_details}}" placeholder="By Whom" name="p4_permission_visit_details"  id="p4_permission_visit_details"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-xs-12 title">
                            <h3>Other Information</h3>
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Countries visited in last 10 years	</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{$visa->p4_country_visited_last_10_y}}"  placeholder="Countries Visited in Last 10 Years" id="p4_country_visited_last_10_y" name="p4_country_visited_last_10_y" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Countries Visited in Last 10 Years (Comma Separated)
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-xs-12 title">
                            <h3>SAARC Country Visit Details</h3>
                        </div>
                    </div>


                    <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Have You Visited SAARC Countries (Except Your Own Country) during last 3 years?</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio" {{$visa->p4_saarc_countries_flag == 'Yes' ? 'checked="checked"' : ''}}  id="p4_saarc_countries_flag1" name="p4_saarc_countries_flag"  value="Yes"/><span>yes</span>
                                <input type="radio"  {{$visa->p4_saarc_countries_flag == 'No' ? 'checked="checked"' : ''}} id="p4_saarc_countries_flag2" name="p4_saarc_countries_flag"  value="No"/><span>No</span>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Have you visited "South Asian Association for Regional Cooperation" (SAARC) countries (except your own country) during last 3 years? Yes /No
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-xs-12 title">
                            <h3>Reference</h3>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Name or Hotel Name in India</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="{{$visa->p4_r_name}}" placeholder="Reference Name or Hotel Name in India" id="p4_r_name" name="p4_r_name" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Reference Name or Hotel Name in India
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Address or Hotel Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{$visa->p4_r_address}}" placeholder="Reference Address or Hotel Address" id="p4_r_address" name="p4_r_address" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> City</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Reference City" value="{{$visa->p4_r_city}}" id="p4_r_city" name="p4_r_city" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> State</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="{{$visa->p4_r_state}}" placeholder="Reference State" id="p4_r_state" name="p4_r_state" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Country </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Reference country" id="p4_r_country" value="{{$visa->p4_r_country}}" name="p4_r_country" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> ZIP Code / POST Code</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{$visa->p4_r_pincode}}" placeholder="Postal code" id="p4_r_pincode" name="p4_r_pincode" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>  Phone no</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{$visa->p4_r_phone}}"  placeholder="Reference Phone no" id="p4_r_phone" name="p4_r_phone" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Name in Home Country</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Reference Country" id="p4_r_h_name" value="{{$visa->p4_r_h_name}}"  name="p4_r_h_name" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Reference Name and Address in Home Country
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{$visa->p4_r_h_address1}}" placeholder="Address" id="p4_r_h_address1" name="p4_r_h_address1" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Address
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Phone</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="{{$visa->p4_r_h_phone}}" placeholder="Phone" id="p4_r_h_phone" name="p4_r_h_phone" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Phone no
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12">
                                    <h4> To upload Photo click "Browse" .Click "Save and Continue" to directly proceed without photo upload</h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 col-xs-12"> </div>
                                <div class="col-sm-4 col-xs-12 picture">
                                    <img id="blah" src="{{ URL::asset('img/frontend/images/photo_not_available.png')}}">
                                </div>
                                <div class="col-sm-4 col-xs-12 picture">
                                    <img id="blah" src="{{ URL::asset('img/frontend/images/second.png')}}">

                                </div>
                                <div class="col-sm-2 col-xs-12"> </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 col-xs-12">
                                </div>
                                <div class="col-sm-10 col-xs-12">
                                    <!-- <input type="file" class="btn-primary" name="file" id="image" >   -->
                                    <p style="color: #f00;font-size: 18px;">Click Your Own Picture Using A Camera Phone Or Digital Camera Upload Here</p>
<span class="btn btn-default btn-file">
				Browse <input  onchange="readURL(this);" type="file" value="photo_not_available.png" name="p4_photo_name" id="image">
</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" ></label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="submit" name="submit" value="Save And Continue"  class="btn-primary submit-btn2">
                                    <input type="submit"  name="submit" value="Save and Temporarily Exit"   class="btn-primary submit-btn2">
                                </div>
                            </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            $("#p4_visit_india_before1").change(function() {;
                if ($("#p4_visit_india_before1").is(":checked")) {
                    $("#prev_visa_details").show();
                    $("#p4_address1").attr("disabled", false);
                    $("#p4_city_prev_visit").attr("disabled", false);
                    $("#p4_last_curr_visa_no").attr("disabled", false);
                    $("#p4_type_visa").attr("disabled", false);
                    $("#p4_place_issue").attr("disabled", false);
                    $("#p4_date_issue").attr("disabled", false);
                }
            }).trigger('change');

            $("#p4_visit_india_before2").change(function() {
                if ($("#p4_visit_india_before2").is(":checked")) {
                    $("#prev_visa_details").hide();
                    $("#p4_address1").attr("disabled", true);
                    $("#p4_city_prev_visit").attr("disabled", true);
                    $("#p4_last_curr_visa_no").attr("disabled", true);
                    $("#p4_type_visa").attr("disabled", true);
                    $("#p4_place_issue").attr("disabled", true);
                    $("#p4_date_issue").attr("disabled", true);
                }
            }).trigger('change');
            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection