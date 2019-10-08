<!-- footer -->
<footer class="sec-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <span><a href="/"><strong>Home</strong> |</a></span>
            <span><a href="/visas/urgent-visa"><strong>Apply Urgent Visa</strong> |</a></span>
            <span><a href="/visas/tourist-visa"><strong>Apply Tourist Visa</strong> |</a></span>
            <span><a href="/document"><strong>Document Requirement</strong> |</a></span>
            <span><a href="/blog"><strong>Blog</strong> |</a></span>
            <span><a href="/about-us"><strong>About Us</strong> |</a></span>
            <span><a href="/contact-us"><strong>Contact Us</strong></a></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="links">
                    <h3>Disclaimer</h3>
                    <hr class="hrline">
                    <p><a href="/"><strong>This</strong></a> is the website to obtain the <a href="/"><strong>Official India e-Visa</strong></a>. This is a commercial website and you will be charged a fee for using our services. Read the Terms and Conditions carefully before submitting the <a href="/visas/create"><strong>"Indian Visa Online Application"</strong></a>.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="links">
                    <h3>Quick Links</h3>
                    <hr class="hrline">
                    <ul class="list-unstyled">
                        <li><a href="/visas/urgent-visa">Apply Urgent e Visa India</a></li>
                        <li><a href="/evisa-fee">e-Visa Fee</a></li>
                        <li><a href="/instruction">Instruction For Applicant</a></li>
                        <li><a href="/document">Document Requirement</a></li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="/contact-us">Contact US</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/sitemap">SiteMap</a></li>
                        {{-- <li><a href="#">Faq-sbi Payment Related</a></li>
                         <li><a href="#">Faq Axis Payment Related</a></li>--}}
                    </ul>
                </div>
            </div>


            <div class="col-md-4">
                <div class="address">
                    <h3>Contact Us</h3>
                    <hr class="hrline">
                    {{--<p><i class="fa fa-phone" aria-hidden="true"></i> +91 -88888888888888</p>--}}
                    {{ Form::open(['route' => 'frontend.contactus', 'class' => 'form-horizontal', 'id' => 'footer_contact-us']) }}

                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <input id="cu_name" type="text" value="" class="form-control" placeholder="Name" name="cu_name" autocomplete="off"/>
                        </div>
                    </div>

<br>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <input id="cu_email" value="" type="text" class="form-control" placeholder="Email" name="cu_email" autocomplete="off"/>
                            <input style="display: none;" id="cu_phone" value="" type="text" class="form-control" placeholder="Email" name="cu_phone" autocomplete="off"/>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <textarea name="cu_query" rows="2" cols="3" id="cu_query" class="form-control" placeholder="Query"></textarea>
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" ></label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit" id="footer_contact-us_submit"   value="Submit"   class="btn-primary submit-btn2">
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer">
        <p>Copyright © {{date('Y')}} All Rights Reserved. I Nine Technologies</p>
    </div>
</footer>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5bccae26b9993f2ada150a0c/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();

    $("#footer_contact-us_submit").click(function() {
        var f_cu_name = $("#cu_name").val();
        var f_cu_email = $("#cu_email").val();
        var f_cu_query = $("#cu_query").val();
        var return_bool = false;
        if (f_cu_name == "") {
            alert("Name can not be empty.");
            $("#cu_name").focus();
            return_bool = false;
        }

        else if (f_cu_email == "") {
            alert("Email can not be empty.");
            $("#cu_email").focus();
            return_bool = false;
        }

        else if (!fisEmail(f_cu_email)) {
                alert("Please enter valid email address.");
                $("#cu_email").focus();
                return_bool = false;
        }

        else if (f_cu_query == "") {
            alert("Query can not be empty.");
            $("#cu_query").focus();
            return_bool = false;
        }
        else {
            return_bool = true;
        }

        return return_bool;
    });

    function fisEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
</script>
<!--End of Tawk.to Script-->