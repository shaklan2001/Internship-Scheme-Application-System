<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internship Scheme | Department for Promotion of Industry and Internal Trade, MoCI, GoI</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!--<link href="http://10.246.120.247/css/app.css" rel="stylesheet">-->
    <link href="./fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="./mdbootstrap/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./DataTables/datatables.min.css">
    <!--<link href="http://10.246.120.247/css/default.css" rel="stylesheet">-->

    <link rel="stylesheet" href="css/cmxform.css">
    <link rel="stylesheet" href="css/cmxformTemplate.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    th {
        /* border-right: solid 1.5px #A4ADAD;*/
        border-right: none;
    }
    </style>
</head>

<body ondragstart="return false" ondrag="return false">
    <div class="loader-overlay"> </div>
    <div class="jumbotron jumbotron-fluid header text-header-1">
        <div class="container-fluid px-0"> <img src="http://10.246.120.247/images/rcp-header.png" alt="REGULATORY COMPLIANCE PORTAL" style="width:100%;"> </div>
    </div>
    <div class="container-fluid body-content p-0 px-4" id="divContainerBody">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-sm-auto mx-md-auto">
            <div class="container">
                <div class="row">
                    <div>
                        <!--<img src="https://grievance.dipp.gov.in/emblem-dark.png" />-->
                        <h3><strong>उद्योग संवर्धन और आंतरिक व्यापार विभाग</strong></h3>
                        <h4>Department for Promotion of Industry and Internal Trade</h4>
                    </div>
                    <br>
                    <form action="submit-internship-scheme.php" method="post" enctype="multipart/form-data" id="internshipSchemeForm">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name <span style="color:#FF0000;">*</span></label>
                                    <input type="text" class="form-control input-sm" name="name" id="name" maxlength="101" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_name" class="control-label">Father name <span style="color:#FF0000;">*</span></label>
                                    <input type="text" class="form-control input-sm" name="father_name" id="father_name" maxlength="101" autocomplete="off">
                                </div>
                            </div>    
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Date Of Birth <span style="color:#FF0000;">*</span></label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select class="month form-select " id="dob-month" name="dob_month" autocomplete="off">
                                                <option value="" selected="selected">Month</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="day form-select" id="dob-day" name="dob_day" autocomplete="off">
                                                <option value="" selected="selected">Day</option>
                                                <?php
                                                    $total_days = 31;
                                                    for($i = 1; $i <= $total_days; $i++)
                                                    { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="year form-select" id="dob-year" name="dob_year" autocomplete="off">
                                                <option value="" selected="selected">Year</option>
                                                <?php
                                                    $current_year = date("Y");
                                                    for($i = $current_year; $i >= 1985; $i--)
                                                    { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Address" class="col-sm-2 control-label">Address <span style="color:#FF0000;">*</span></label>
                                    <textarea class="form-control" rows="3" name="address" id="address" maxlength="251" autocomplete="off"></textarea>
                                </div>
                                <span>Only these (-:/#) special characters are allowed</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email <span style="color:#FF0000;">*</span></label>
                                    <input type="email" class="form-control input-sm" name="email" id="email_id" maxlength="101" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_number" class="control-label">Phone Number </label>
                                    <input type="number" class="form-control" name="contact_number" id="contact_number" maxlength="11" autocomplete="off">
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile_number" class="control-label">Mobile Number <span style="color:#FF0000;">*</span></label>
                                    <input type="number" class="form-control" name="mobile_number" id="mobile_number" maxlength="11" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area_interest" class="control-label">Area of Interest <span style="color:#FF0000;">*</span></label>
                                    <select id="area_interest" name="area_interest" class="form-select" autocomplete="off">
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="Engg">Engg</option>
                                        <option value="Management">Management</option>
                                        <option value="Law">Law</option>
                                        <option value="Economics">Economics</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Computers">Computers</option>
                                        <option value="Library">Library</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Period of Intership (From) <span style="color:#FF0000;">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="month form-select" id="from_dob_month" name="from_dob_month" autocomplete="off">
                                                <option value="" selected="selected">Month</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="day form-select" id="from_dob_day" name="from_dob_day" autocomplete="off">
                                                <option value="" selected="selected">Day</option>
                                                <?php
                                                    $total_days = 31;
                                                    for($i = 1; $i <= $total_days; $i++)
                                                    { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="year form-select" id="from_dob_year" name="from_dob_year" autocomplete="off">
                                                <option value="" selected="selected">Year</option>
                                                <?php
                                                    $current_year = date("Y");
                                                    ?>
                                                <option value="<?php echo $current_year; ?>"><?php echo $current_year; ?></option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <span>Choose intership period one month / two month / three month.</span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Period of Intership (To) <span style="color:#FF0000;">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="month form-select" id="to_dob_month" name="to_dob_month" autocomplete="off">
                                                <option value="" selected="selected">Month</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="day form-select" id="to_dob_day" name="to_dob_day" autocomplete="off">
                                                <option value="" selected="selected">Day</option>
                                                <?php
                                                    $total_days = 31;
                                                    for($i = 1; $i <= $total_days; $i++)
                                                    { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="year form-select" id="to_dob_year" name="to_dob_year" autocomplete="off">
                                                <option value="" selected="selected">Year</option>
                                                <?php
                                                    $current_year = date("Y");
                                                    ?>
												<option value="<?php echo $current_year; ?>"><?php echo $current_year; ?></option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <span>Period of intership is minimum - 4 weeks and maximum 3 months.</span>
                            </div>
                        </div>
                        </br>

                        <div>
                            <h3>Educational Qualification</h3>
                        </div>
                        <table class="col-md-12">
                            <thead>
                                <tr>
                                    <th>Qualification</th>
                                    <th>Passing Year</th>
                                    <th>Institute Name / Board / University</th>
                                    <th>Marks Obtained [%]</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>High School <span style="color:#FF0000;">*</span>
                                        <input type="hidden" name="high_school" id="high_school" value="High School" autocomplete="off">
                                    </td>
                                    <td>
                                        <select class="year form-select" id="high_year" name="high_year">
                                            <option value="" selected="selected">Year</option>
                                            <?php
                                                $current_year = date("Y");
                                                for($i = $current_year; $i >= 1985; $i--)
                                                { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="high_inst_board" id="high_inst_board" maxlength="101" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="high_mark_obtained" maxlength="3" id="high_mark_obtained" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="high_remarks" id="high_remarks" maxlength="101" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Intermediate <span style="color:#FF0000;">*</span>
                                        <input type="hidden" name="intermediate" id="intermediate" value="Intermediate" autocomplete="off">
                                    </td>
                                    <td>
                                        <select class="year form-select" id="inter_year" name="inter_year" autocomplete="off">
                                            <option value="" selected="selected">Year</option>
                                            <?php
                                                $current_year = date("Y");
                                                for($i = $current_year; $i >= 1985; $i--)
                                                { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="inter_inst_board" id="inter_inst_board" maxlength="101" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="inter_mark_obtained" id="inter_mark_obtained" maxlength="3" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="inter_remarks" id="inter_remarks" maxlength="101" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Graduation <span style="color:#FF0000;">*</span>
                                        <input type="hidden" name="graduation" id="graduation" value="Graduation" autocomplete="off">
                                    </td>
                                    <td>
                                        <select class="year form-select" id="grad_year" name="grad_year" autocomplete="off">
                                            <option value="" selected="selected">Year</option>
                                            <?php
                                                $current_year = date("Y");
                                                for($i = $current_year; $i >= 1985; $i--)
                                                { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="grad_inst_board" id="grad_inst_board" maxlength="101" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="grad_mark_obtained" maxlength="3" id="grad_mark_obtained" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="grad_remarks" id="grad_remarks" maxlength="101" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Post Graduation
                                        <input type="hidden" name="post_graduation" id="post_graduation" value="Post Graduation" autocomplete="off">
                                    </td>
                                    <td>
                                        <select class="year form-select" id="post_grad_year" name="post_grad_year" autocomplete="off">
                                            <option value="" selected="selected">Year</option>
                                            <?php
                                                $current_year = date("Y");
                                                for($i = $current_year; $i >= 1985; $i--)
                                                { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="post_grad_inst_board" id="post_grad_inst_board" maxlength="101" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="post_grad_mark_obtained" id="post_grad_mark_obtained" maxlength="3" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="post_grad_remarks" id="post_grad_remarks" autocomplete="off">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="checkbox" id="term_and_conditions" name="term_and_conditions" value="1" autocomplete="off"> &nbsp;
                                </div>
                                <p>I hereby verify that the information provided by me is true and correct to the best of my knowledge and my application will be summarily rejected if any particulars are found incorrect/false at any stage. Further, I have read the term and conditions for above assignment and understood them.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-10"> 
                                    <?php require_once('generate-captcha-image.php'); ?>
                                </div>
                            </div>
							
							<!-- <div valign="middle" style="padding:0px 5px;">
								<img id="CapImg" src="CaptchaSecurityImages.php?width=100&height=30&characters=6" style="margin-top:2px;"/>	
								&nbsp;&nbsp;									
								<a href="#" id="reload" align="center" onclick="document.getElementById('CapImg').src = 'CaptchaSecurityImages.php?sid=' + Math.random(); return false" style="font-size:12px;">
								<u>Refresh</u> 
								</a>
							</div>-->
                        </div>
                        <div class="col-lg-offset-2 col-lg-8 m-b-lg col-0" style="display:none1" id="enable_submit_button1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input id="btn_submit_ticket" type="submit" name="submit" class="btn btn-primary" value="Submit"> </div>
                                </div>
                            </div>
                        </div>
                <!-- </form>-->
                </form>
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <footer class="footer-padding">
        <div class="footer-bottom-wrapper" id="divFooter" style="background: #007670;">
            <div class="container footer-bottom-container">
                <div class="footer-content pt-3 pb-2 clearfix">
                    <div class="copyright-content"> Designed, Developed and Hosted by
                        <a class="text-light" href="http://www.nic.in/" title="NIC, External Link that opens in a new window" target="_blank"> <strong lang="hi">National Informatics Centre ( NIC )</strong> </a>
                        </br>Website Content Managed by <strong>Department for Promotion of Industry and Internal Trade, MoCI, GoI</strong> <span>Last Updated: 02-02-2021 </span> </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./fontawesome/js/all.min.js"></script>
    <script src="./fontawesome/js/fontawesome.min.js"></script>
    <script src="./mdbootstrap/js/mdb.min.js"></script>
    <script src="./DataTables/datatables.min.js"></script>
    <script src="./js/main.js"></script>
    
    <!-- Scripts -->
    <script>
	$.validator.setDefaults({
		submitHandler: function() {
			// alert("submitted!");
            return true;
		}
	});

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#internshipSchemeForm").validate({
			rules: {
				name: {
                    required: true,
                    maxlength: 100,
                    },
				father_name: {
                    required: true,
                    maxlength: 100,
                    },
                dob_month: "required",
                dob_day: "required",
                dob_year: "required",
                address: {
                    required: true,
                    maxlength: 250,
                    },
                contact_number: {
					minlength: 10,
					maxlength: 10,
					number: true,
                    },
                mobile_number: {
                    required: true,
					minlength: 10,
					maxlength: 10,
					number: true,
                    },
                area_interest: "required",
                from_dob_month: "required",
                from_dob_day: "required",
                from_dob_year: "required",
                to_dob_month: "required",
                to_dob_day: "required",
                to_dob_year: "required",
                photograph: "required",
                resume: "required",
                high_year: "required",
                high_inst_board: "required",
                high_mark_obtained: "required",
                high_remarks: "required",
                inter_year: "required",
                inter_inst_board: "required",
                inter_mark_obtained: "required",
                inter_remarks: "required",
                grad_year: "required",
                grad_inst_board: "required",
                grad_mark_obtained: "required",
                grad_remarks: "required",
                high_mark_obtained: {
                    required: true,
					minlength: 2,
					maxlength: 3,
					number: true,
                    },
                inter_mark_obtained: {
                    required: true,
					minlength: 2,
					maxlength: 3,
					number: true,
                    },
                grad_mark_obtained: {
                    required: true,
					minlength: 2,
					maxlength: 3,
					number: true,
                    },
                post_grad_mark_obtained: {
					minlength: 2,
					maxlength: 3,
					number: true,
                    },
                term_and_conditions: "required",
                captcha_input: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
                name: {
                    required: "Please enter your name",
                    maxlength: "Only allow 100 characters",
                    },
				father_name:{
                    required: "Please enter your father name",
                    maxlength: "Only allow 100 characters",
                    },
                dob_month: "Please select month",
                dob_day: "Please select day",
                dob_year: "Please select year",
                address:  {
                    required: "Please enter your address",
                    maxlength: "Only allow 250 characters",
                    },
                contact_number: {
                    minlength: "Please enter minimum 10 digits phone number",
                    maxlength: "Only enter 10 digits phone number",
                    number: "Please enter numeric number",
                    },
                mobile_number: {
                    required: "Please enter your mobile number",
                    minlength: "Please enter minimum 10 digits mobile number",
                    maxlength: "Only enter 10 digits mobile number",
                    number: "Please enter numeric number",
                    },
                area_interest: "Please select your area interest",
                from_dob_month: "Please select month",
                from_dob_day: "Please select day",
                from_dob_year: "Please select year",
                to_dob_month: "Please select month",
                to_dob_day: "Please select day",
                to_dob_year: "Please select year",
                photograph: "Please select photograph",
                resume: "Please select resume",
                high_year: "Please select year",
                term_and_conditions: "Please accept term and conditions",
                captcha_input: "Please enter your captcha code",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});
	});
	</script>   
    <script>
    $(document).ready(function() {
        $('#email_id').on('blur', function() {
            var email_value = $(this).val();
            // alert("Please click OK and wait for email confirmation message for sending verification code on your email.");

            function isEmail(email_value) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email_value);
            }
            if(!isEmail(email_value)) {
                alert('Please fill valid email');
                return false;
            } else if(email_value == '') {
                alert("Please fill email for email verification.");
                return false;
            } 
            else {
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "ajax_email_check.php",
                    data: 'email=' + email_value,
                    cache: false,
                    success: function(result) {

                        json = JSON.parse(result);

                        if(json.message == "register_already_done"){
                            alert('You are already registered so you can not register again');
                        }

                        if(json.id > 0){
                            alert("You have fill form but you did not upload files yet. Kindly upload files.");
                            window.location.href = 'http://localhost/yp/internship-scheme-files.php?hash_key='+json.hash_key;
                        }
                    }
                });
            }
            return false;
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('.dynamic_field').append('<tr id="row' + i + '"><td><input type="text" class="form-control name_list" name="orgn_inst[]" id="orgn_inst_' + i + '" /></td><td><input type="date" class="form-control name_list" name="period_from[]" id="period_from_' + i + '" /></td><td><input type="date" class="form-control name_list" name="period_to[]" id="period_to_' + i + '" /></td><td><input type="text" class="form-control name_list" name="nature_of_work[]" id="nature_of_work_' + i + '" /></td><td><input type="text" class="form-control name_list" name="remark[]" id="remark_' + i + '" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
    </script>

    <style>
        #commentForm {
            width: 500px;
        }
        #commentForm label {
            width: 250px;
        }
        #commentForm label.error, #commentForm input.submit {
            margin-left: 253px;
        }
        #signupForm {
            width: 670px;
        }
        #signupForm label.error {
            margin-left: 10px;
            width: auto;
            display: inline;
        }
        #newsletter_topics label.error {
            display: none;
            margin-left: 103px;
        }
    </style>
    <script type="text/javascript">
    $(document).ready(function () {

    $("#from_dob_month, #from_dob_day, #from_dob_year, #to_dob_month, #to_dob_day, #to_dob_year").change(function (event) {

        var from_dob_month = $("#from_dob_month").val();
        var from_dob_day = $("#from_dob_day").val();
        var from_dob_year = $("#from_dob_year").val();
        
        var to_dob_month = $("#to_dob_month").val();
        var to_dob_day = $("#to_dob_day").val();
        var to_dob_year = $("#to_dob_year").val();

        from_dob_year1 = parseInt(from_dob_year);
        from_dob_month1 = parseInt(from_dob_month);
        from_dob_day1 = parseInt(from_dob_day);

        to_dob_year2 = parseInt(to_dob_year);
        to_dob_month2 = parseInt(to_dob_month);
        to_dob_day2 = parseInt(to_dob_day);

        if((to_dob_year2 > 0) && (to_dob_month2 >0) && (to_dob_day2 >0)){
            let fromDate  = from_dob_year1+"-"+from_dob_month1+"-"+from_dob_day1;

            let toDate    = to_dob_year2+"-"+to_dob_month2+"-"+to_dob_day2;

            let diffInMs   = new Date(toDate) - new Date(fromDate)
            let diffInDays = diffInMs / (1000 * 60 * 60 * 24);
            console.log(diffInDays);

            if(diffInDays <= 28){
                alert("Your are in 28 days less");
                return false;
            }
            if(diffInDays > 90){
                alert("Not allowed for 90 days");
                return false;
            }
        }

    });

    });
    
    </script>

<script>
    $(document).ready(function() {

        /* Validate dob by NK (26-4-2021) */

        $("#dob-year,#dob-month,#dob-day").change(function(e){
            // var high_perc_mark = $(this).val();
            // high_perc_mark = parseInt(high_perc_mark);
            var month = $("#dob-month").val();
            month = parseInt(month);
            var day = $("#dob-day").val();
            day = parseInt(day);
            var year = $("#dob-year").val();
            year = parseInt(year);

            if ( (!isNaN(month) && !isNaN(day) && !isNaN(year) ) ){
                var dateString = month+'.'+day+'.'+year;
                var today = new Date();
                var birthDate = new Date(dateString); //format is mm.dd.yyyy
                var age = today.getFullYear() - birthDate.getFullYear();
                age = age - 1;
                if(age < 18 || age > 100)
                {
                    alert("Age "+age+" is restrict. Only allow 18 or 18+ age.");
                } 
                
            }
        });

        /* Validate form  by NK (19-4-2021) */
    
        $('body').on("cut copy paste", function (e) {
            e.preventDefault();
        });

        /* stop specical characters */

        $("#name,#father_name,#high_inst_board,#inter_inst_board,#grad_inst_board,#post_grad_inst_board,#orgn_inst_1,#nature_of_work_1,#captcha_input,#verify_code").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("p#NameError").html("");
            $("p#NameError").removeAttr("style").hide();

            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[a-zA-Z0-9 ]+$/;

            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            return isValid;
        });

        $("#address,#permanent_address, #high_remarks,#inter_remarks,#grad_remarks,#post_grad_remarks").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("p#NameError").html("");
            $("p#NameError").removeAttr("style").hide();

            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[a-zA-Z0-9 .]+$/;

            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            return isValid;
        });

        $("#high_mark_obtained,#inter_mark_obtained,#grad_mark_obtained,#post_grad_mark_obtained").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("p#NameError").html("");
            $("p#NameError").removeAttr("style").hide();
            var isValid = true;
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^(?!0)\d+$/;

            if($(this).val() == "") {
            //Validate TextBox value against the Regex.
            isValid = regex.test(String.fromCharCode(keyCode));
            }
            return isValid;
        });
        
        /* Validate form  by NK (19-4-2021) */

        $("#high_mark_obtained,#inter_mark_obtained,#grad_mark_obtained,#post_grad_mark_obtained").change(function(e){
            var high_mark_obtained = $(this).val();
            var inter_mark_obtained = $(this).val();
            var grad_mark_obtained = $(this).val();
            var prof_perc_mark = $(this).val();
            var post_grad_mark_obtained = $(this).val();
            if(high_mark_obtained > 100){
                alert("Percentage above 100 is not allowed.");
                $(this).val('');
            }else if(inter_mark_obtained > 100){
                alert("Percentage above 100 is not allowed.");
                $(this).val('');
            }else if(grad_mark_obtained > 100){
                alert("Percentage above 100 is not allowed.");
                $(this).val('');
            }else if(post_grad_mark_obtained > 100){
                alert("Percentage above 100 is not allowed.");
                $(this).val('');
            }
        });
    });
    </script>

<script>
    $(document).ready(function(){

        $("select#high_year").on('change', function(){
            var interYear = $("#inter_year").val();
            interYear = parseInt(interYear);
            var highYear = $(this).children("option:selected").val();
            highYear = parseInt(highYear);

            if(interYear !=""){
                if( highYear >= interYear || highYear+1 >= interYear){
                    alert('High school is always less than intermediate year and should have 2 years difference between both.');
                    $('#high_year').val('');
                }
            }

        });

        $("select#inter_year").on('change', function(){
            var highYear = $("#high_year").val();
            highYear = parseInt(highYear);
            var interYear = $(this).children("option:selected").val();
            interYear = parseInt(interYear);

            if(highYear !=""){
                if( highYear >= interYear || highYear+1 >= interYear){
                    alert('High school is always less than intermediate year and should have 2 years difference between both.');
                    $('#inter_year').val('');
                }
            }

        });

        $("select#grad_year").on('change', function(){
            var highYear = $("#high_year").val();
            highYear = parseInt(highYear);
            var interYear = $("#inter_year").val();
            interYear = parseInt(interYear);
            var gradYear = $(this).children("option:selected").val();
            gradYear = parseInt(gradYear);
            var yearCondition2 = parseInt(interYear)+3;

            if(highYear !="" || interYear !="" ){
                if( interYear >= gradYear || yearCondition2 > gradYear){
                    alert('Intermediate year is always less than graduation year and should have aleast 3 years difference.');
                    $('#grad_year').val('');
                }
            }
        });

        $("select#post_grad_year").on('change', function(){
            var highYear = $("#high_year").val();
            highYear = parseInt(highYear);
            var interYear = $("#inter_year").val();
            interYear = parseInt(interYear);
            var gradYear = $("#grad_year").val();
            gradYear = parseInt(gradYear);
            var postGradYear = $(this).children("option:selected").val();
            postGradYear = parseInt(postGradYear);
            var yearCondition4 = parseInt(gradYear)+3;

            if(highYear !="" || interYear !="" || gradYear !=""){
                if( gradYear >= postGradYear || yearCondition4 > postGradYear){
                    alert('Graduation year is always less than post graduation and should have aleast 3 years difference.');
                    $('#post_grad_year').val('');
                }
            }
        });
    });
    </script>
</body>

</html>