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
    <link href="http://10.246.120.247/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cmxform.css">
    <link rel="stylesheet" href="css/cmxformTemplate.css">
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
                    <form action="submit-internship-scheme-files.php" method="post" enctype="multipart/form-data" id="internshipSchemeForm">

                        <div class="row">
                        <input type="hidden" name="hash_key" value="<?php echo $_REQUEST['hash_key'];?>">
                            <div class="col-md-6">
                                <div class="form-group" id="vis_selfhelp_suggest_div">
                                    <label for="photograph" class="control-label">Photograph <span style="color:#FF0000;">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control required" type="file" id="photograph" name="photograph" accept="image/jpg,image/jpeg,image/png" autocomplete="off">
                                    </div>
                                    <span>Only passport size photo. Maximum upload size is 800 KB.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="vis_selfhelp_suggest_div">
                                    <label for="resume" class="control-label">Resume <span style="color:#FF0000;">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control required" type="file" id="resume" name="resume" accept="application/pdf" autocomplete="off">
                                    </div>
                                    <span>Only valid files (pdf ) format.</span>
                                </div>
                            </div>
                        </div>
                        </br>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <?php require_once('generate-captcha-image.php'); ?>
                                </div>
                            </div>
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
				
                photograph: "required",
                resume: "required",
                captcha_input: "required",
			},
			messages: {
                
                photograph: "Please select photograph",
                resume: "Please select resume",
                captcha_input: "Please enter your captcha code",
			}
		});
	});
	</script>   
    <script>
    $(document).ready(function() {
        $('#email_id_1').on('blur', function() {
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
            // else {
            //     // AJAX Code To Submit Form.
            //     $.ajax({
            //         type: "POST",
            //         url: "ajaxsubmit.php",
            //         data: 'email=' + email_value,
            //         cache: false,
            //         success: function(result) {
            //             alert(result);
            //             if(result != '' && result != "Error in sending email") {
            //                 $("#enable_submit_button").show();
            //             }
            //         }
            //     });
            // }
            return false;
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

    <script>
    $(document).ready(function() {

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
                $('#high_mark_obtained').val('');
            }else if(inter_mark_obtained > 100){
                alert("Percentage above 100 is not allowed.");
                $('#inter_mark_obtained').val('');
            }else if(grad_mark_obtained > 100){
                alert("Percentage above 100 is not allowed.");
                $('#grad_mark_obtained').val('');
            }else if(post_grad_mark_obtained > 100){
                alert("Percentage above 100 is not allowed.");
                $('#post_grad_mark_obtained').val('');
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