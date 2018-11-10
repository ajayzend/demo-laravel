@extends('frontend.layouts.app2')
@section('content')
    <section class="wrapper">
        <div class="container">
            <div class="title"><p class="text-center">e-Visa (eTV) Application</p></div>
            <p class="text-center"><strong>Please note down the Temporary Application ID:</strong> <span class="bred">{{ $visa->visa_no }}</span></p>
            <p class="text-center">Your information will be saved if you click save button or continue to next page. If you exit without doing either of that, your information will be lost.</p>
            <p class="text-center"><strong>Application Type :</strong> <span class="bred">{{ substr($visa->p1_app_type, 0, 17) }}</span></p>
            <div class="row">
                <div class="form-outer">
				
				  <div class="title2">
						<div class="col-md-8" >Details of Visa Sought</div>
						<div class="col-md-4">Help</div>
					</div>
				
                   
					

                        {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process4', 'enctype' => 'multipart/form-data']) }}
                        {{ Form::hidden('evpuid', $visa->visa_no ) }}
                        {{ Form::hidden('ps', 10004 ) }}

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Type of Visa</label>
                            <div class="col-sm-4 col-xs-12">
                                {{$visa->p1_visa_type}}
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                Select Visa Type You are Applying For
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Duration of Visa (in Days)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" type="text" disabled="disabled" value="60" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
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
                            <div class="col-sm-4 col-xs-12 des" >
                                No. of Entries
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Port of Arrival in India</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_port_arrival }}
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
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
                            <div class="col-sm-4 col-xs-12 des" >
                                Expected Port of Exit from India
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Places Likely To Be Visited</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_place_likely_visit}}" placeholder="Places likely to be Visited" id="p4_place_likely_visit" name="p4_place_likely_visit" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des" >
                                Places to be Visited
                            </div>
                        </div>

					<div class="title"><p>Previous Visa/Currently valid Visa Details</p></div>
                 


                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label"> <span>Have You Ever Visited India Before?</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="radio" value="Yes"  id="p4_visit_india_before1" name="p4_visit_india_before"   {{ $visa->p4_visit_india_before == 'Yes' ? 'checked="checked"' : '' }}/><span>Yes</span>
                                <input  type="radio" value="No" id="p4_visit_india_before2" name="p4_visit_india_before" {{ $visa->p4_visit_india_before == 'No' ? 'checked="checked"' : '' }}  /><span>No</span>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">If Yes Please Give Details</div>
                        </div>

                        <div id="prev_visa_details">
                            <div class="form-group" >
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Address </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Address" value="{{$visa->p4_address1}}" placeholder="Address" id="p4_address1" name="p4_address1"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Enter The Address of Stay During Your Last Visit
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Cities Previously Visited in India  </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" value="{{$visa->p4_city_prev_visit}}" placeholder="Cities Previously Visited in India" class="form-control" id="p4_city_prev_visit" name="p4_city_prev_visit" >
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Cities in India visited (comma separated)
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Last Indian Visa No/Currently Valid Indian Visa No</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" type="text" value="{{$visa->p4_last_curr_visa_no}}"  placeholder="Last Indian Visa No/Currently Valid Indian Visa No" class="form-control" id="p4_last_curr_visa_no" name="p4_last_curr_visa_no" >
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
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
                                <div class="col-sm-4 col-xs-12 des">
                                    Type of Visa
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Place of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Place of Issue" id="p4_place_issue"  value="{{$visa->p4_place_issue}}" name="p4_place_issue"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Place of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Date of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_date_issue}}"   id="p4_date_issue" name="p4_date_issue" placeholder="Date of Issue" type="text"/>
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
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
                            <div class="col-sm-4 col-xs-12 des">
                                Refuse Details Yes /No
                            </div>
                        </div>
                        <div class="form-group" id="p4_permission_visit_details_id">
                            <label class="form-check-label col-sm-4 col-xs-12">	If So, When And By Whom (Mention Control No. and Date Also)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="{{$visa->p4_permission_visit_details}}" placeholder="By Whom" name="p4_permission_visit_details"  id="p4_permission_visit_details"  />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                If Yes, when and by whom (mention Control no and date)
                            </div>
                        </div>
<div class="title"><p>Other Information</p></div>


                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Countries visited in last 10 years	</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="text" class="form-control" value="{{$visa->p4_country_visited_last_10_y}}"  placeholder="Countries Visited in Last 10 Years" id="p4_country_visited_last_10_y" name="p4_country_visited_last_10_y" />
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Countries Visited in Last 10 Years (Comma Separated)
                            </div>
                        </div>

<div class="title"><p>SAARC Country Visit Details</p></div>

                    <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Have You Visited SAARC Countries (Except Your Own Country) during last 3 years?</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio" {{$visa->p4_saarc_countries_flag == 'Yes' ? 'checked="checked"' : ''}}  id="p4_saarc_countries_flag1" name="p4_saarc_countries_flag"  value="Yes"/><span>yes</span>
                                <input type="radio"  {{$visa->p4_saarc_countries_flag == 'No' ? 'checked="checked"' : ''}} id="p4_saarc_countries_flag2" name="p4_saarc_countries_flag"  value="No"/><span>No</span>
                            </div>
                            <div class="col-sm-4 col-xs-12 des">
                                Have you visited "South Asian Association for Regional Cooperation" (SAARC) countries (except your own country) during last 3 years? Yes /No
                            </div>
                    </div>

                    {{--start saved value populated--}}
                    <div id="saarc_data_saved">
                        <?php
                            if($visa->p4_saarc_country_year_visit != '') {
                        foreach($visa->p4_saarc_country_year_visit as $key=>$rows) {?>
                        <div  class="fieldRow clearfix">
                            <div class="col-md-3 col-md-offset-1">
                                <div  class="form-group">
                                    <label for="id_saarc_2_country" class="control-label  requiredField">
                                        Name of SAARC country<span class="star">*</span>
                                    </label><div class="controls ">
                                        <select required class="select form-control" id="saarc_country_saved_<?php echo $key;?>" name="saarc_country_saved[]">
                                            {{-- <option value="" selected="selected">Select</option>--}}
                                            <option <?php if($rows['saarc_country'] == 'AFGHANISTAN') echo 'selected="selected"' ?> value="AFGHANISTAN" title="AFGHANISTAN"> AFGHANISTAN</option>
                                            <option <?php if($rows['saarc_country'] == 'BHUTAN') echo 'selected="selected"' ?> value="BHUTAN" title="BHUTAN"> BHUTAN</option>
                                            <option <?php if($rows['saarc_country'] == 'PAKISTAN') echo 'selected="selected"' ?> value="PAKISTAN" title="PAKISTAN"> PAKISTAN</option>
                                            <option <?php if($rows['saarc_country'] == 'MALDIVES') echo 'selected="selected"' ?> value="MALDIVES" title="MALDIVES"> MALDIVES</option>
                                            <option <?php if($rows['saarc_country'] == 'BANGLADESH') echo 'selected="selected"' ?> value="BANGLADESH" title="BANGLADESH"> BANGLADESH</option>
                                            <option <?php if($rows['saarc_country'] == 'SRI LANKA') echo 'selected="selected"' ?> value="SRI LANKA" title="SRI LANKA"> SRI LANKA</option>
                                            <option <?php if($rows['saarc_country'] == 'NEPAL') echo 'selected="selected"' ?> value="NEPAL" title="NEPAL"> NEPAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div id="div_id_saarc_2_year" class="form-group">
                                    <label for="id_saarc_2_year" class="control-label  requiredField">
                                        Year<span class="star">*</span>
                                    </label><div class="controls ">
                                        <select required class="select form-control" id="saarc_year_saved_<?php echo $key;?>" name="saarc_year_saved[]">
                                            {{-- <option value="" selected="selected">Select</option>--}}
                                            <option <?php if($rows['saarc_year'] == '2018') echo 'selected="selected"' ?> value="2018">2018</option>
                                            <option <?php if($rows['saarc_year'] == '2017') echo 'selected="selected"' ?> value="2017">2017</option>
                                            <option <?php if($rows['saarc_year'] == '2016') echo 'selected="selected"' ?> value="2016">2016</option>
                                            <option <?php if($rows['saarc_year'] == '2015') echo 'selected="selected"' ?> value="2015">2015</option>
                                            <option <?php if($rows['saarc_year'] == '2014') echo 'selected="selected"' ?> value="2014">2014</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div id="div_id_saarc_2_visit" class="form-group">
                                    <label for="id_saarc_2_visit" class="control-label  requiredField">
                                        No. of visits<span class="star">*</span>
                                    </label><div class="controls ">
                                        <input  class="numberinput form-control" required value="<?php echo $rows['saarc_visit']; ?>" id="saarc_visit_saved_<?php echo $key;?>" name="saarc_visit_saved[]" step="0.01" type="number" /> </div>
                                </div>
                            </div>
                        </div>
                        <?php } }?>
                    </div>
                    {{--end saved value populated--}}
                    <div id="saarcContainer">
                        <div id="first">
                            <div class="recordset">
                                <div class="fieldRow clearfix">
                                    <div class="col-md-3 col-md-offset-1">
                                        <div id="div_id_saarc_1_country" class="form-group">
                                            <label for="id_saarc_1_country" class="control-label  requiredField">
                                                Name of SAARC country<span class="star">*</span>
                                            </label><div class="controls ">
                                                <select required class="select form-control" id="id_saarc_1_country" name="saarc_1_country">
                                                    <option value="" selected="selected">Select</option>
                                                    <option value="AFGHANISTAN" title="AFGHANISTAN"> AFGHANISTAN</option>
                                                    <option value="BHUTAN" title="BHUTAN"> BHUTAN</option>
                                                    <option value="PAKISTAN" title="PAKISTAN"> PAKISTAN</option>
                                                    <option value="MALDIVES" title="MALDIVES"> MALDIVES</option>
                                                    <option value="BANGLADESH" title="BANGLADESH"> BANGLADESH</option>
                                                    <option value="SRI LANKA" title="SRI LANKA"> SRI LANKA</option>
                                                    <option value="NEPAL" title="NEPAL"> NEPAL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div id="div_id_saarc_1_year" class="form-group">
                                            <label for="id_saarc_1_year" class="control-label  requiredField">
                                                Year<span class="star">*</span>
                                            </label><div class="controls ">
                                                <select required class="select form-control" id="id_saarc_1_year" name="saarc_1_year">
                                                    <option value="" selected="selected">Select</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div id="div_id_saarc_1_visit" class="form-group">
                                            <label for="id_saarc_1_visit" class="control-label  requiredField">
                                                No. of visits<span class="star">*</span>
                                            </label><div class="controls ">
                                                <input class="numberinput form-control" required id="id_saarc_1_visit" name="saarc_1_visit" step="0.01" type="number" /> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-8 col-xs-12">
                            <h3></h3>
                        </div>
                    </div>

              
					<div class="title"><p>Reference</p></div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Name or Hotel Name in India</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"  value="{{$visa->p4_r_name}}" placeholder="Reference Name or Hotel Name in India" id="p4_r_name" name="p4_r_name" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Reference Name or Hotel Name in India
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Address or Hotel Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_address}}" placeholder="Reference Address or Hotel Address" id="p4_r_address" name="p4_r_address" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> City</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Reference City" value="{{$visa->p4_r_city}}" id="p4_r_city" name="p4_r_city" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> State</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"  value="{{$visa->p4_r_state}}" placeholder="Reference State" id="p4_r_state" name="p4_r_state" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Country </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Reference country" id="p4_r_country" value="{{$visa->p4_r_country}}" name="p4_r_country" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> ZIP Code / POST Code</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_pincode}}" placeholder="Postal code" id="p4_r_pincode" name="p4_r_pincode" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>  Phone no</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_phone}}"  placeholder="Reference Phone no" id="p4_r_phone" name="p4_r_phone" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span>Reference Name in Home Country</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Reference Country" id="p4_r_h_name" value="{{$visa->p4_r_h_name}}"  name="p4_r_h_name" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Reference Name and Address in Home Country
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_h_address1}}" placeholder="Address" id="p4_r_h_address1" name="p4_r_h_address1" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Address
                                </div>
                            </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label"></label>
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" class="form-control" value="{{$visa->p4_r_h_address2}}" placeholder="City & State" id="p4_r_h_address2" name="p4_r_h_address2" />
                        </div>
                        <div class="col-sm-4 col-xs-12">

                        </div>
                    </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label"><span class="star">*</span> Phone</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" value="{{$visa->p4_r_h_phone}}" placeholder="Phone" id="p4_r_h_phone" name="p4_r_h_phone" />
                                </div>
                                <div class="col-sm-4 col-xs-12 des">
                                    Phone no
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="text-center"> To upload Photo click "Browse" .Click "Save and Continue" to directly proceed without photo upload</h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12 picture text-center">
                                    <img height="220" width="220" id="profileimg" src="{{ Storage::disk('public')->url('img/visaprofile/' . $visa->p4_photo_name) }}">
                                    {{--<img id="profileimg" height="220" width="220" src="{{ URL::asset('img/frontend/images/photo_not_available.png')}}">--}}
                                    <img id="blah" height="220" width="220" src="{{ URL::asset('img/frontend/images/second.png')}}">
                                </div>
                               
                            </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-xs-12"> </div>
                        <div class="col-sm-8 col-xs-12 picture">
                            <p style="color: #f00;font-size: 18px;">Click Your Own Picture Using A Camera Phone Or Digital Camera Upload Here</p>
                        </div>
                        <div class="col-sm-2 col-xs-12"> </div>
                    </div>
                            {{--<div class="form-group">
                                <div class="col-sm-2 col-xs-12">
                                </div>
                                <div class="col-sm-10 col-xs-12">
                                    <!-- <input type="file" class="btn-primary" name="file" id="image" >   -->
                                    <p style="color: #f00;font-size: 18px;">Click Your Own Picture Using A Camera Phone Or Digital Camera Upload Here</p>
<span class="btn btn-default btn-file">
				Browse <input  onchange="readURL(this);" type="file" value="photo_not_available.png" name="p4_photo_name" id="image">
</span>
                                </div>
                            </div>--}}


                    <div class="form-group">
                        {{--{{ Form::label('logo', trans('validation.attributes.backend.settings.sitelogo'), ['class' => 'col-lg-2 control-label']) }}--}}
                        <div class="col-sm-4 col-xs-12"> </div>
                        <div class="col-lg-4">

                            <div class="custom-file-input">
                                {!! Form::file($visa->p4_photo_name ? 'p4_photo_name4' : 'p4_photo_name', array('class'=>'form-control inputfile inputfile-1', 'onchange'=>"readURL(this)")) !!}
                                <label for="logo">
                                    <i class="fa fa-upload"></i>
                                    <span>Choose a file</span>
                                </label>
                            </div>
                        </div>
                        <!--col-lg-10-->

                        <div class="col-sm-4 col-xs-12"> </div>
                    </div>
                    <!--form control-->


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
            $("#p4_visit_india_before1").change(function() {
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


            $("#p4_permission_visit1").change(function() {
                if ($("#p4_permission_visit1").is(":checked")) {
                    $("#p4_permission_visit_details_id").show();
                }
            }).trigger('change');

            $("#p4_permission_visit2").change(function() {
                if ($("#p4_permission_visit2").is(":checked")) {
                    $("#p4_permission_visit_details_id").hide();
                }
            }).trigger('change');

            $("#p4_saarc_countries_flag1").change(function() {
                if ($("#p4_saarc_countries_flag1").is(":checked")) {
                    $("#saarc_data_saved").show();
                    $("#btnPlus").show();

                    if(!$("#saarc_country_saved_0").val())
                        $("#btnPlus").click();

                    $("#btnMinus").hide();
                    $("#saarcContainer").show();
                }
            }).trigger('change');

            $("#p4_saarc_countries_flag2").change(function() {
                if ($("#p4_saarc_countries_flag2").is(":checked")) {
                    $(".minusclick").click();
                    $("#saarc_data_saved").hide();
                    $("#btnPlus").hide();
                    $("#saarcContainer").hide();
                }
            }).trigger('change');

            // To Use Select2
            // Backend.Select2.init();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profileimg')
                            .attr('src', e.target.result)
                            .width(220)
                            .height(220);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#saarcContainer").czMore();
    </script>
@endsection