<?php
session_start();
include('config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Internship | Department for Promotion of Industry and Internal Trade, MoCI, GoI</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!--<link href="http://10.246.120.247/css/app.css" rel="stylesheet">-->
    <link href="./fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="./mdbootstrap/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./DataTables/datatables.min.css">
	<link href="./css/style.css" rel="stylesheet">
    <style>
    th {
        /* border-right: solid 1.5px #A4ADAD;*/
        border-right: none;
    }
    label.error {
        color:red;
    }


    .center {
    margin: auto;
    width: 1%;

    padding: 5px;
}

.right {
    margin: auto;
    width: 1%;

    padding: 1px;
}


    </style>
</head>

<body ondragstart="return false" ondrag="return false">
    <div class="loader-overlay"> </div>
    
    <div class="container-fluid body-content" id="divContainerBody">
            <div class="container">
                <div class="row">
                    <div class="text-center pb-2 m-2">
                        <!--<img src="ttps://grievance.dipp.gov.in/emblem-dark.png" />-->
                        <h1 class="logo">
							<img class="national_emblem" src="https://dipp.gov.in/sites/all/modules/cmf/cmf_content/assets/images/emblem-dark.png" alt="national emblem">
						</h1>
                        <h5><strong>Government of India</strong> | <strong>Ministry of Commerce & Industry</strong></h5>
                        <h3><strong>उद्योग संवर्धन और आंतरिक व्यापार विभाग</strong></h3>
                        <h4><strong>Department for Promotion of Industry and Internal Trade</strong></h4>
                        <h4><strong> Internship Applicant List  </strong></h4>

                       <!-- <hr size="4" noshade>-->
                    </div>
                <br>
                <form action="" method="get" enctype="multipart/form-data" id="internshipSchemeForm">
             
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name" class="control-label" style="text-align:left" >Name </label>
                                    <input type="text" class="form-control input-sm" name="name" id="name" maxlength="101" autocomplete="off" value="<?php echo (empty($_SESSION['name']))? '':$_SESSION['name'];?>">
                                </div>
                            </div> 

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="email" class="control-label" style="text-align:left" >Email </label>
                                    <input type="email" class="form-control input-sm" name="email" id="email_id" maxlength="101" autocomplete="off" value="<?php echo (empty($_SESSION['email']))? '':$_SESSION['email'];?>"title=" Email (format: xxx@xxx.xxx)" 
    pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*">Email (format: xxx@xxx.xxx)
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="area_interest" class="control-label" style="text-align:left" >Area of Interest</label>
                                    <select id="area_interest" name="area_interest" class="form-select" autocomplete="off" >
                                        <option value="" selected="selected">- Select -</option>
                                        <?php $areaquery = "SELECT * FROM area_interest where is_active = '1'";
                                        $result = mysqli_query($conn, $areaquery);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row =  mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row['id']; ?>" <?php if(@$_SESSION['area_interest'] == $row['id']) { echo "selected";}?>><?php echo $row['area_interest_name']; ?></option>
                                        <?php } }?>
                                    </select>
                                </div>
                            </div>
                             
                            <div class="col-md-3">
                                    <label for="mobile_number" class="control-label" style="text-align:left">Phone Number</label>
                                <div class="input-group form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>+91</strong></span>
                                    <input type="number" class="form-control" name="mobile_number" id="mobile_number" pattern="^\d{10}$" value="Phone Number"  maxlength="10" autocomplete="off" value="<?php echo (empty($_SESSION['mobile_number']))? '':$_SESSION['mobile_number'];?>">Must contain numbers only(format: xxxxxxxxxx)                          
                                </div>
                            </div>
                       
                            <div class="col-md-3">
                                <label for="age" class="control-label" style="text-align:left"> Age </label>
                                <div class="input-group form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>From</strong></span>
                                    <input type="number" class="form-control" name="fromage" id="age"  min="0" max="100" maxlength="3" autocomplete="off"value="<?php echo (empty($_SESSION['fromage']))? '':$_SESSION['fromage'];?>">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>To</strong></span>
                                    <input type="number" class="form-control" name="toage" id="age" min="0" max="100" maxlength="3" autocomplete="off" value="<?php echo (empty($_SESSION['toage']))? '':$_SESSION['toage'];?>">
                                </div>
                            </div>
                        </div>
                    <div class="container">
                        <div class="col-md-3">
                            <table>
                                <td>
                                    <table class=table table table-bordered table-striped table-hover>
                                    <div class="col-md-4">
                                        <tr>
                                            <th>Educational Qualification</th>
                                            <th>Comparision Operators</th>
                                            <th>Marks Obtained[%]</th>
                                            <th></th>
                                            
                                        </tr>
                              
                                
                                        <tr>
                                            <td>High School 
                                            <input type="hidden" name="high_school" id="high_school" value="High School" autocomplete="off">
                                        </td>
                                        <td><select id="highfilter" name="highfilter" class="form-select" autocomplete="off" >
                                            <option value="" selected="selected">- Select -</option>
                                            <option value=">" <?php if(@$_SESSION['highfilter'] == '>') { echo "selected";}?>>></option>
                                            <option value=">="<?php if(@$_SESSION['highfilter'] == '>=') { echo "selected";}?>>>=</option>
                                            <option value="=="<?php if(@$_SESSION['highfilter'] == '==') { echo "selected";}?>>==</option>
                                            <option value="<="<?php if(@$_SESSION['highfilter'] == '<=') { echo "selected";}?>><=</option>
                                            <option value="<"<?php if(@$_SESSION['highfilter'] == '<') { echo "selected";}?>><</option>
                                            <option value="!="<?php if(@$_SESSION['highfilter'] == '!=') { echo "selected";}?>>!=</option>
                                        </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="high_mark_obtained" maxlength="3" id="high_mark_obtained" autocomplete="off" value="<?php echo (empty($_SESSION['high_mark_obtained']))? '':$_SESSION['high_mark_obtained'];?>">
                                        </td>
                                        </tr>
                                    
                                        <tr>
                                    
                                        <td>Intermediate Year
                                            <input type="hidden" name="intermediate" id="intermediate" value="Intermediate" autocomplete="off">
                                        </td>
                                    

                                    
                                        <td>
                                        <select id="interfilter" name="interfilter" class="form-select" autocomplete="off" value="<?php echo (empty($_SESSION['interfilter']))? '':$_SESSION['interfilter'];?>">
                                            <option value="" selected="selected">- Select -</option>
                                            <option value=">"<?php if(@$_SESSION['interfilter'] == '>') { echo "selected";}?>>></option>
                                            <option value=">="<?php if(@$_SESSION['interfilter'] == '>=') { echo "selected";}?>>>=</option>
                                            <option value="=="<?php if(@$_SESSION['interfilter'] == '==') { echo "selected";}?>>==</option>
                                            <option value="<="<?php if(@$_SESSION['interfilter'] == '<=') { echo "selected";}?>><=</option>
                                            <option value="<"<?php if(@$_SESSION['interfilter'] == '<') { echo "selected";}?>><</option>
                                            <option value="!="<?php if(@$_SESSION['interfilter'] == '!=') { echo "selected";}?>>!=</option>
                                        </select>
                                        </td>
                                    
                                    
                                        <td>
                                            <input type="text" class="form-control" name="inter_mark_obtained" id="inter_mark_obtained" maxlength="3" autocomplete="off" value="<?php echo (empty($_SESSION['inter_mark_obtained']))? '':$_SESSION['inter_mark_obtained'];?>">
                                        </td>
                                    </div>

                                        <td></td>
                                        <td></td>
                                        </tr>
                             
                                    </table>
                                </td>
                                
<br>
<br>
                                <td>
                        
                        
                                    <table class=table table table-bordered table-striped table-hover>
                                    <div class="col-md-4">        
                                        <tr>
                                            <th>Educational Qualification</th>
                                            <th>Comparision Operators</th>
                                            <th>Marks Obtained[%]</th>
                                       
                                        </tr>
                              
                                
                                        <tr>
                                            <td>Graduation
                                            <input type="hidden" name="graduation" id="graduation" value="Graduation" autocomplete="off">
                                        </td>
                                            <td><select id="gradfilter" name="gradfilter" class="form-select" autocomplete="off" value="<?php echo (empty($_SESSION['gradfilter']))? '':$_SESSION['gradfilter'];?>">
                                            <option value="" selected="selected">- Select -</option>
                                            <option value=">"<?php if(@$_SESSION['gradfilter'] == '>') { echo "selected";}?>>></option>
                                            <option value=">="<?php if(@$_SESSION['gradfilter'] == '>=') { echo "selected";}?>>>=</option>
                                            <option value="=="<?php if(@$_SESSION['gradfilter'] == '==') { echo "selected";}?>>==</option>
                                            <option value="<="<?php if(@$_SESSION['gradfilter'] == '<=') { echo "selected";}?>><=</option>
                                            <option value="<"<?php if(@$_SESSION['gradfilter'] == '<') { echo "selected";}?>><</option>
                                            <option value="!="<?php if(@$_SESSION['gradfilter'] == '!=') { echo "selected";}?>>!=</option>
                                        </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="grad_mark_obtained" maxlength="3" id="grad_mark_obtained" autocomplete="off" value="<?php echo (empty($_SESSION['grad_mark_obtained']))? '':$_SESSION['grad_mark_obtained'];?>">
                                        </td>
                                        </tr>
                                    
                                        <tr>
                                   
                                        <td>Post Graduation
                                            <input type="hidden" name="post_graduation" id="post_graduation" value="Post Graduation" autocomplete="off">
                                        </td>
                                        

                                        
                                        <td>
                                        <select id="postfilter" name="postfilter" class="form-select" autocomplete="off" value="<?php echo (empty($_SESSION['postgradfilter']))? '':$_SESSION['postgradfilter'];?>">
                                            <option value="" selected="selected">- Select -</option>
                                            <option value=">"<?php if(@$_SESSION['postfilter'] == '>') { echo "selected";}?>>></option>
                                            <option value=">="<?php if(@$_SESSION['postfilter'] == '>=') { echo "selected";}?>>>=</option>
                                            <option value="=="<?php if(@$_SESSION['postfilter'] == '==') { echo "selected";}?>>==</option>
                                            <option value="<="<?php if(@$_SESSION['postfilter'] == '<=') { echo "selected";}?>><=</option>
                                            <option value="<"<?php if(@$_SESSION['postfilter'] == '<') { echo "selected";}?>><</option>
                                            <option value="!="<?php if(@$_SESSION['postfilter'] == '!=') { echo "selected";}?>>!=</option>
                                        </select>
                                        </td>
                                        
                                        
                                        <td>
                                            <input type="text" class="form-control" name="post_grad_mark_obtained" id="post_grad_mark_obtained" maxlength="3" autocomplete="off" value="<?php echo (empty($_SESSION['post_grad_mark_obtained']))? '':$_SESSION['post_grad_mark_obtained'];?>">
                                        
        
                                            </td>
                                           

                                        </tr>
                                    </div>   
                                    </table>
                                </td>
                                <br>
                                <td>
                                <br>
                                
                                
                                     <table>
                                        
                                        <tr>
                                        <div class="center">
                                        <div class="col-lg-offset-2 col-lg-8 m-b-lg col-0" style="display:none1" id="enable_submit_button1">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                        <div class="col-sm-6">
                                        <input id="btn_submit_ticket" type="submit" name="submit" class="btn btn-primary" value="Submit"> </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>              
                                        <div class="center">
                                            <div class=" col-lg-offset-2 col-lg-8 m-b-lg col-0" style="display:none1" id="enable_reset_button">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                            <div class="col-sm-6">
                                            <!--<input id="btn_reset_ticket" type="button" name="reset" class="btn btn-primary" value="Reset"> </div>-->
                                            <a href="session.php" class="btn btn-primary">Reset</a>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                        
                                           

                                           
                                                
                                        </tr>
                                    </table>
                                </td> 
                                <br>
                            
                                <td>
                                    <br>
                                    
                                    <table>

                                    <br>
                                        <tr>
                                    
                                        <td>  
                                        <div class="col-md-20">
                                            <div class="right">
                                            <a href="csv2.php" class="btn btn-success"> export to excel</a>
                                            </div>
                                        <div>
                                        </td>
                                   
                                        
                                       
                                        </tr>
                                        <tr>   
                                        <td>  
                                        <div class="col-md-20">
                                            <div class="right">
                                            <a href="plugins/index.php" class="btn btn-success"> export to pdf</a>
                                            </div>
                                        </div>
                                        </td>         
                                        </tr>
                                    </table>
                                 </td>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
    </div>

    


                 <table class="table table-bordered table-striped table-hover table-border-grey rounded applicant-user-table">
                    <thead class="bg-custom-light-teal font-weight-bold">
                        <tr>
                            <td>Registration Number</td>
                            <td>Name</td>
                            <td>Date of Birth</td>
                            <td>Phone Number</td>
                            <td>Email</td>
                            <td>Area of Interest </td>
                        </tr>
                    </thead>
                    <?php 
                    if($_GET){
                    $_SESSION['Query'] = $_GET;
                        //print_r($_SESSION['Query']);

                    }

                    $query = "SELECT  internship_scheme.*,area_interest.area_interest_name FROM internship_scheme INNER JOIN area_interest on internship_scheme.area_interest = area_interest.id";
                    if(@$_GET['high_mark_obtained'] || @$_GET['inter_mark_obtained'] || @$_GET['grad_mark_obtained'] || @$_GET['post_grad_mark_obtained'] ){
                        $query = $query." INNER JOIN internship_scheme_educational_qualification on internship_scheme.id = internship_scheme_educational_qualification.internship_scheme_id ";
                    }
                     $query = $query." where term_and_conditions = '1'";
                    if(@$_GET['email'])
                    {
                        $query = $query." And email = '".$_GET['email']."'";
                    }
                    
                    if(@$_GET['mobile_number']){ 
                        $_SESSION['mobile_number'] = $_GET['mobile_number'];
                        $query = $query." And mobile_number = '".$_GET['mobile_number']."'";
                    }

                    if(@$_GET['name']) {
                        $_SESSION['name'] = $_GET['name'];

                        $query = $query." And name like '%".$_GET['name']."%'";
                    }
                    //echo query
                    if(@$_GET['area_interest']) {
                        $_SESSION['area_interest'] = $_GET['area_interest'];
                        $query = $query." And area_interest ='".$_GET['area_interest']."'";
                    }

                   
                    
                     if(@$_GET['fromage']){
                        $_SESSION['fromage']= $_GET['fromage'];
                    $query = $query. "And DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(),`dob`)),'%Y')+0 >= '".$_GET['fromage']."'";
                     }
//echo $query;
                   if(@$_GET['toage']){
                    $_SESSION['toage']= $_GET['toage'];
                   $query = $query. "And DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(),`dob`)),'%Y')+0 <='".$_GET['toage']."'";
}
                   if(@$_GET['high_mark_obtained']){
                    $_SESSION['high_mark_obtained']= $_GET['high_mark_obtained'];
                    $_SESSION['highfilter']= $_GET['highfilter'];
                    $query = $query." And high_mark_obtained ".$_GET['highfilter']." '".$_GET['high_mark_obtained']."'";
                }
                if(@$_GET['inter_mark_obtained']){
                    $_SESSION['inter_mark_obtained']= $_GET['inter_mark_obtained'];
                    $_SESSION['interfilter']= $_GET['interfilter'];
                    $query = $query." And inter_mark_obtained ".$_GET['interfilter']." '".$_GET['inter_mark_obtained']."'";
                }
                
                if(@$_GET['grad_mark_obtained']){
                    $_SESSION['grad_mark_obtained']= $_GET['grad_mark_obtained'];
                    $_SESSION['gradfilter']= $_GET['gradfilter'];
                    $query = $query." And grad_mark_obtained" .$_GET['gradfilter']." '".$_GET['grad_mark_obtained']."'";
                }

                if(@$_GET['post_grad_mark_obtained']){
                    $_SESSION['post_grad_mark_obtained']= $_GET['post_grad_mark_obtained'];
                    $_SESSION['postgradfilter']= $_GET['postgradfilter'];
                    $query = $query." And post_grad_mark_obtained" .$_GET['postgradfilter']." '".$_GET['post_grad_mark_obtained']."'";
                }
                
//echo $query;
                    $result = mysqli_query($conn, $query);
                

                    if(mysqli_num_rows($result) > 0) {
                        while ($row =  mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><a href="#"  title="Click here to view detail.">view</a></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['contact_number'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['area_interest_name'];?></td>
                            </tr>
                            <?php  
                        }
                    } ?>


                </table>

                
        <!-- /.col-md-12 -->
    </div>

       

 
    <footer class="footer-padding">
        <div class="footer-bottom-wrapper" id="divFooter" style="background: #007670;">
            <div class="container footer-bottom-container">
                <div class="footer-content pt-3 pb-2 clearfix">
                    <div class="copyright-content"> Designed, Developed and Hosted by
                        <a class="text-light" href="http://www.nic.in/" title="NIC, External Link that opens in a new window" target="_blank"> <strong lang="hi">National Informatics Centre ( NIC )</strong> </a>
                        </br>Website Content Owned and  Managed by <strong>Department for Promotion of Industry and Internal Trade, Ministry of Commerce & Industry, Government of India</strong>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/additional-methods.min.js"></script>
    <script src="./fontawesome/js/all.min.js"></script>
    <script src="./fontawesome/js/fontawesome.min.js"></script>
    <script src="./mdbootstrap/js/mdb.min.js"></script>
    <script src="./DataTables/datatables.min.js"></script>
    <script src="./js/main.js"></script>
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
		$('.applicant-user-table').DataTable({
			"pageLength": 20,
			'info': true,
			"order": [
				[0, "asc"]
			],
			lengthChange: false,
			//buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
		});
	</script>
    <script>
    
        // $('#btn_reset_ticket').click(function(){
        //     <?php //session_destroy(); ?>
        //    window.location = window.location.pathname;
        // })
    </script>
</body>
</html>