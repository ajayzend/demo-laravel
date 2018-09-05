@extends('frontend.layouts.app2')

@section('content')
    <section class="wrapper">
        <div class="container">
            <h4 class="text-center">Port of arrival :{{ $visa->p1_port_arrival }}</h4>
            <h4 class="text-center">Application Type : {{ $visa->p1_app_type }}</h4>
            <h4 class="text-center">Data saved Successfully.Please note down the Temporary Application ID:  {{ $visa->visa_no }}</h4>
            <div class="row">
                <div class="form-outer">
                    <h3 class="text-center"> Applicant's Address Details</h3>
                        {{ Form::model($visa, ['route' => ['frontend.visas.update', $visa], 'class' => 'form-horizontal', 'method' => 'PATCH',  'id' => 'process4']) }}
                        {{ Form::hidden('evpuid', $visa->visa_no ) }}
                        {{ Form::hidden('ps', 10004 ) }}
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"><span class="star">*</span>Type of Visa</label>

                            <div class="col-sm-4 col-xs-12" >
                                Select Visa Type You are Applying For
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"><span class="star">*</span>Duration of Visa (in Days)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" type="text" disabled="disabled" value="60" />
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Duration of Visit (in Days)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"><span class="star">*</span>No. of Entries</label>
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
                            <label class="col-sm-4 col-xs-12"><span class="star">*</span>Port of Arrival in India</label>
                            <div class="col-sm-4 col-xs-12">
                                {{ $visa->p1_app_type }}

                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Port of Arrival in India
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12">Expected Port of Exit from India</label>
                            <div class="col-sm-4 col-xs-12">
                                <select name="exit_pointxx" class="form-control" id="exit_pointxx">
                                    <option value="0" selected="selected">Select.....</option>
                                    <?php foreach($port_arrival as $arriv){?>

                                    <option <?php  if($unids){  if($exit_pointxx[0]==$arriv->arrival) echo 'selected="selected"';  }  ?>value="<?php echo $arriv->arrival ;?>"><?php echo $arriv->arrival ;?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Expected Port of Exit from India
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"><span class="star">*</span>Places Likely To Be Visited</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="<?php if($unids){echo  $placelikelyvisited ;}?>" placeholder="Places likely to be Visited" id="placelikelyvisited" name="placelikelyvisited" />
                            </div>
                            <div class="col-sm-4 col-xs-12" >
                                Places to be Visited
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12"> <span>Have You Ever Visited India Before?</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <input  type="radio"   id="oldvisa" name="oldvisa" value="Yes"  <?php if($oldvisa=='Yes'){ echo 'checked="checked"'; } ?>/><span>Yes</span>
                                <input  type="radio" value="No"  <?php if($oldvisa=='No'){echo 'checked="checked"'; } ?>  id="oldvisas" name="oldvisa" /><span>No</span>
                            </div>
                            <div class="col-sm-4 col-xs-12">If Yes Please Give Details</div>
                        </div>
                        <div id="visa_details">
                            <div class="form-group" >
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Address </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Address" value="<?php if($unids){echo  $prv_visit_add1 ;}?>" placeholder="Address" id="prv_visit_add1" name="prv_visit_add1"/>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Enter The Address of Stay During Your Last Visit
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Cities Previously Visited in India  </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" value="<?php if($unids){echo  $visited_city ;}?>" placeholder="Cities Previously Visited in India" class="form-control" id="visited_city" name="visited_city" >
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Cities in India visited (comma separated)
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Last Indian Visa No/Currently Valid Indian Visa No</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" value="<?php if($unids){echo  $old_visa_no  ;}?>"  placeholder="Last Indian Visa No/Currently Valid Indian Visa No" class="form-control" id="old_visa_no" name="old_visa_no" >
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Last Indian Visa No / Currently valid Visa no
                                </div>
                            </div>
                            <!--	<div class="form-group">
                               <input class="form-control" placeholder="House No./Street"  id="perm_address1" name="perm_address1" />
                               </div>-->
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Type of Visa</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select name="old_visa_type_id" class="form-control" id="old_visa_type_id">
                                        <option value="0" selected="selected">Select Type of Visa</option>

                                        <option <?php if($old_visa_type_id == 'ART SURROGACY VISA') echo'Selected="Selected"'?> value="ART SURROGACY VISA"> ART SURROGACY VISA</option>
                                        <option  <?php if($old_visa_type_id == 'BUSINESS VISA') echo'Selected="Selected"'?>  value="BUSINESS VISA"> BUSINESS VISA</option>
                                        <option <?php if($old_visa_type_id == 'BUSINESS VISA DEPENDENTS') echo'Selected="Selected"'?>  value="BUSINESS VISA DEPENDENTS"> BUSINESS VISA DEPENDENTS</option>
                                        <option <?php if($old_visa_type_id == 'BUSINESS VISA TRANSFER') echo'Selected="Selected"'?>  value="BUSINESS VISA TRANSFER"> BUSINESS VISA TRANSFER</option>
                                        <option <?php if($old_visa_type_id == 'CONFERENCE/SEMINARS VISA') echo'Selected="Selected"'?>  value="CONFERENCE/SEMINARS VISA"> CONFERENCE/SEMINARS VISA</option>
                                        <option <?php if($old_visa_type_id == 'DIPLOMATIC DEPENDENT VISA') echo'Selected="Selected"'?>  value="DIPLOMATIC DEPENDENT VISA"> DIPLOMATIC DEPENDENT VISA</option>
                                        <option <?php if($old_visa_type_id == 'DIPLOMATIC VISA') echo'Selected="Selected"'?>  value="DIPLOMATIC VISA"> DIPLOMATIC VISA</option>
                                        <option <?php if($old_visa_type_id == 'EMPLOYMENT  VISA') echo'Selected="Selected"'?>  value="EMPLOYMENT  VISA"> EMPLOYMENT  VISA</option>
                                        <option <?php if($old_visa_type_id == 'EMPLOYMENT VISA DEPENDENTS') echo'Selected="Selected"'?> value="EMPLOYMENT VISA DEPENDENTS"> EMPLOYMENT VISA DEPENDENTS</option>
                                        <option <?php if($old_visa_type_id == 'EMPLOYMENT VISA TRANSFER') echo'Selected="Selected"'?>  value="EMPLOYMENT VISA TRANSFER"> EMPLOYMENT VISA TRANSFER</option>
                                        <option <?php if($old_visa_type_id == 'ENTRY VISA') echo'Selected="Selected"'?>  value="ENTRY VISA"> ENTRY VISA</option>
                                        <option <?php if($old_visa_type_id == 'ENTRY VISA TRANSFER') echo'Selected="Selected"'?>  value="ENTRY VISA TRANSFER"> ENTRY VISA TRANSFER</option>
                                        <option <?php if($old_visa_type_id == 'JOURNALIST VISA') echo'Selected="Selected"'?>  value="JOURNALIST VISA"> JOURNALIST VISA</option>
                                        <option <?php if($old_visa_type_id == 'MEDICAL ATTENDANT') echo'Selected="Selected"'?>  value="MEDICAL ATTENDANT"> MEDICAL ATTENDANT</option>
                                        <option <?php if($old_visa_type_id == 'MEDICAL VISA') echo'Selected="Selected"'?>  value="MEDICAL VISA"> MEDICAL  VISA</option>
                                        <option <?php if($old_visa_type_id == 'MEDICAL VISA TRANSFER') echo'Selected="Selected"'?>  value="MEDICAL VISA TRANSFER"> MEDICAL VISA TRANSFER</option>
                                        <!-- <option value="MISSIONARY VISA"> MISSIONARY VISA</option>
                                         <option value="MOUNTAINEERING VISA"> MOUNTAINEERING VISA</option>
                                         <option value="OFFICIAL DEPENDENT VISA"> OFFICIAL DEPENDENT VISA</option>
                                         <option value="OFFICIAL VISA"> OFFICIAL VISA</option>
                                         <option value="PILGRIMES VISA"> PILGRIMES VISA</option>
                                         <option value="PROJECT VISA"> PROJECT VISA</option>
                                         <option value="RESEARCH VISA"> RESEARCH VISA</option>
                                         <option value="RESEARCH VISA DEPENDENTS"> RESEARCH VISA DEPENDENTS</option>
                                         <option value="RESEARCH VISA TRANSFER"> RESEARCH VISA TRANSFER</option>
                                         <option value="SOUTH ASIAN UNIVERSITY"> SOUTH ASIAN UNIVERSITY</option>
                                         <option value="SPORTS"> SPORTS</option>
                                         <option value="STUDENT VISA"> STUDENT VISA</option>
                                         <option value="STUDENT VISA DEPENDENTS"> STUDENT VISA DEPENDENTS</option>
                                         <option value="STUDENT VISA TRANSFER"> STUDENT VISA TRANSFER</option>
                                         <option value="TOURIST VISA"> TOURIST VISA</option>
                                         <option value="TOURIST VISA TRANSFER"> TOURIST VISA TRANSFER</option>
                                         <option value="TRANSIT VISA"> TRANSIT VISA</option>
                                         <option value="UN OFFICIAL"> UN OFFICIAL</option>
                                         <option value="VISIT VISA"> VISIT VISA </option>-->
                                    </select>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Type of Visa
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Place of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Place of Issue" id="oldvisaissueplace"  value="<?php if($unids){ echo $oldvisaissueplace; }?>" name="oldvisaissueplace"/>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Place of Issue
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Date of Issue </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="<?php if($unids){ echo $date_fouth; }?>"   id="date" name="date" placeholder="Date of Issue" type="text"/>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Date of Issue
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12">Has Permission To Visit Or To Extend Stay in India Previously Been Refused?
                                Yes  / No  </label>
                            <div class="col-sm-4 col-xs-12">
                                Yes <input  type="radio" <?php if($permission=='Yes') echo 'checked="checked"'; ?> name="permission"  value="Yes"  id="permission"  />
                                No  <input  type="radio" value="No"  <?php if($permission=='No') echo 'checked="checked"'; ?> name="permission"  id="permissions"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Refuse Details Yes /No
                            </div>
                        </div>
                        <div class="form-group" id="perm">
                            <label class="form-check-label col-sm-4 col-xs-12">	If So, When And By Whom (Mention Control No. and Date Also)</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="<?php if($unids){echo  $refuse_details ;}?>" placeholder="By Whom" name="refuse_details"  id="refuse_details"  />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12">Countries visited in last 10 years	</label>
                            <div class="col-sm-4 col-xs-12">
                                <input class="form-control" value="<?php if($unids){echo  $country_visited ;}?>"  placeholder="Countries Visited in Last 10 Years" id="country_visited" name="country_visited" />
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Countries Visited in Last 10 Years (Comma Separated)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12">Have You Visited SAARC Countries (Except Your Own Country) during last 3 years?</label>
                            <div class="col-sm-4 col-xs-12">
                                <input type="radio" <?php if($saarc=='Yes') echo 'checked="checked"'; ?>  id="saarc" name="saarc"  value="Yes"/><span>yes<span>
                  <input type="radio"  <?php if($saarc=='No') echo 'checked="checked"'; ?> id="saarcs" name="saarc"  value="No"/><span>No<span>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                Have you visited "South Asian Association for Regional Cooperation" (SAARC) countries (except your own country) during last 3 years? Yes /No
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Reference Name or Hotel Name in India</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="<?php if($unids){echo  $nameofsponsor_ind ;}?>" placeholder="Reference Name or Hotel Name in India" id="nameofsponsor_ind" name="nameofsponsor_ind" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Reference Name or Hotel Name in India
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Reference Address or Hotel Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="<?php if($unids){echo  $referanceaddress ;}?>" placeholder="Reference Address or Hotel Address" id="referanceaddress" name="referanceaddress" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span> City</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Reference City" value="<?php if($unids){echo  $referancecity ;}?>" id="referancecity" name="referancecity" />
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span> State</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control"  value="<?php if($unids){echo  $referacnestate ;}?>" placeholder="Reference State" id="referacnestate" name="referacnestate" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span> Country </label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Reference country" id="referancecountry" value="<?php if($unids){echo  $referancecountry ;}?>" name="referancecountry" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span> ZIP Code / POST Code</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="<?php if($unids){echo  $referacnepostalcode ;}?>" placeholder="Postal code" id="referacnepostalcode" name="referacnepostalcode" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>  Phone no</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="<?php if($unids){echo  $phoneofsponsor_ind ;}?>"  placeholder="Reference Phone no" id="phoneofsponsor_ind" name="phoneofsponsor_ind" />
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span>Reference Name in Home Country</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" placeholder="Reference Country" id="refcountry" value="<?php if($unids){echo  $refcountry ;}?>"  name="refcountry" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Reference Name and Address in Home Country
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span> Address</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="<?php if($unids){echo  $add1ofsponsor_msn ;}?>" placeholder="Address" id="add1ofsponsor_msn" name="add1ofsponsor_msn" />
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    Address
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12"><span class="star">*</span> Phone</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input class="form-control" value="<?php if($unids){echo  $phoneofsponsor_msn ;}?>" placeholder="Phone" id="phoneofsponsor_msn" name="phoneofsponsor_msn" />
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
                                    <img id="blah" src="<?php echo base_url() ?>application/images/photo_not_available.png">
                                </div>
                                <div class="col-sm-4 col-xs-12 picture">
                                    <img src="<?php echo base_url() ?>application/images/second.png">

                                </div>
                                <div class="col-sm-2 col-xs-12"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-xs-12">
                                </div>
                                <div class="col-sm-10 col-xs-12">

                                    </span>
                                    <!-- <input type="file" class="btn-primary" name="file" id="image" >   -->
                                    <p style="color: #f00;font-size: 18px;">Click Your Own Picture Using A Camera Phone Or Digital Camera Upload Here</p>
<span class="btn btn-default btn-file">
				Browse <input  onchange="readURL(this);" type="file" value="photo_not_available.png" name="file" id="image">
</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-xs-12"></div>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="submit" name="upload" value="Save and Continue" class="btn-primary submit-btn2">
                                    <input type="submit" onclick="show2();" name="exit" value="Save and Temporarily Exit" class="btn-primary submit-btn2">
                                </div> <div class="col-sm-2 col-xs-12"></div>
                            </div>
                        </div>

                    </form>
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

            // To Use Select2
            // Backend.Select2.init();
        });
    </script>
@endsection