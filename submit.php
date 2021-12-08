<?php
session_start();
//Databse connection file
include('config.php');
$base_url = $url.'/yp/young-professional.php';
$redirect_url = $url.'/yp/young-professional-files.php';

$email = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['email']))));
// checking for duplicating user condition
$query = "SELECT id FROM user_information WHERE email = '".$email."'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

	echo "You are already registered so you will redirect in 5 second.";
	header('Refresh: 5; URL='.$redirect_url);
	//echo "<p><a href='".."'><button>Back to Page</button></a></p>";
die;
}else{
	
		if($_SESSION['captcha_string']==$_POST["captcha_input"])
		{
		$name = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['name']))));
		$father_name = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['father_name']))));
		$dob_month = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['dob_month']))));
		$dob_day = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['dob_day']))));
		$dob_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['dob_year']))));
		$date_of_birth = $dob_month. "-". $dob_day. "-". $dob_year;
		if ( (!empty($dob_month) && !empty($dob_day) && !empty($dob_year) ) ){
            $bday = "$dob_day-$dob_month-$dob_year";
            $today = new DateTime(date("Y-m-d"));
            // $bday = new DateTime("22-10-1993");
            $bday = new DateTime($bday);
            $interval = $today->diff($bday);
            $age = intval($interval->y);
            if( $age < 18 ){
                echo "Age $age is restrict. Only allow 18 or 18+ age.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                exit;
            }
        }
		
		$contact_number = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['contact_number']))));
		$email = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['email']))));
		$stream = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['stream']))));
		$mailing_address = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['mailing_address']))));
		$permanent_address = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['permanent_address']))));
		
		// High School
		$high_school = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_school']))));
		$high_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_board']))));
		$high_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_year']))));
		$high_mode = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_mode']))));
		$high_division = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_division']))));
		$high_perc_mark = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_perc_mark']))));
		if(!empty($high_division) && !empty($high_perc_mark)){
            if($high_perc_mark > 100){
                echo "Percentage above 100 is not allowed.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                exit;
            }
            if($high_division == "1st"){
                if($high_perc_mark < 60){
                    echo "Percentage should not be 60 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($high_division == "2nd"){
                if($high_perc_mark >= 60 || $high_perc_mark < 50){
                    echo "Percentage should not be 60 above and should be 50 equal or above.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($high_division == "3rd"){
                if($high_perc_mark >= 50){
                    echo "Percentage should be 50 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
        }
		// Intermediate
		$intermediate = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['intermediate']))));
		$inter_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_board']))));
		$inter_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_year']))));
		$inter_mode = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_mode']))));
		$inter_division = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_division']))));
		$inter_perc_mark = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_perc_mark']))));
		if(!empty($inter_division) && !empty($inter_perc_mark)){
            if($inter_perc_mark > 100){
                echo "Percentage above 100 is not allowed.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                exit;
            }
            if($inter_division == "1st"){
                if($inter_perc_mark < 60){
                    echo "Percentage should not be 60 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($inter_division == "2nd"){
                if($inter_perc_mark >= 60 || $inter_perc_mark < 50){
                    echo "Percentage should not be 60 above and should be 50 equal or above.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($inter_division == "3rd"){
                if($inter_perc_mark >= 50){
                    echo "Percentage should be 50 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
        }
		// Graduation
		$graduation = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['graduation']))));
		$grad_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_board']))));
		$grad_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_year']))));
		$grad_mode = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_mode']))));
		$grad_division = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_division']))));
		$grad_perc_mark = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_perc_mark']))));
		if(!empty($grad_division) && !empty($grad_perc_mark)){
            if($grad_perc_mark > 100){
                echo "Percentage above 100 is not allowed.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                exit;
            }
            if($grad_division == "1st"){
                if($grad_perc_mark < 60){
                    echo "Percentage should not be 60 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($grad_division == "2nd"){
                if($grad_perc_mark >= 60 || $grad_perc_mark < 50){
                    echo "Percentage should not be 60 above and should be 50 equal or above.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($grad_division == "3rd"){
                if($grad_perc_mark >= 50){
                    echo "Percentage should be 50 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
        }
		// Professional Qualification
		$professional_qualification = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['professional_qualification']))));
		$prof_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['prof_board']))));
		$prof_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['prof_year']))));
		$prof_mode = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['prof_mode']))));
		$prof_division = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['prof_division']))));
		$prof_perc_mark = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['prof_perc_mark']))));
		if(!empty($prof_division) && !empty($prof_perc_mark)){
            if($prof_perc_mark > 100){
                echo "Percentage above 100 is not allowed.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                exit;
            }
            if($prof_division == "1st"){
                if($prof_perc_mark < 60){
                    echo "Percentage should not be 60 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($prof_division == "2nd"){
                if($prof_perc_mark >= 60 || $prof_perc_mark < 50){
                    echo "Percentage should not be 60 above and should be 50 equal or above.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($prof_division == "3rd"){
                if($prof_perc_mark >= 50){
                    echo "Percentage should be 50 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
        }
		// Post Graduation
		$post_graduation = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_graduation']))));
		$post_grad_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_board']))));
		$post_grad_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_year']))));
		$post_grad_mode = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_mode']))));
		$post_grad_division = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_division']))));
		$post_grad_perc_mark = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_perc_mark']))));
		if(!empty($post_grad_division) && !empty($post_grad_perc_mark)){
            if($post_grad_perc_mark > 100){
                echo "Percentage above 100 is not allowed.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                exit;
            }
            if($post_grad_division == "1st"){
                if($post_grad_perc_mark < 60){
                    echo "Percentage should not be 60 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($post_grad_division == "2nd"){
                if($post_grad_perc_mark >= 60 || $post_grad_perc_mark < 50){
                    echo "Percentage should not be 60 above and should be 50 equal or above.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
            if($post_grad_division == "3rd"){
                if($post_grad_perc_mark >= 50){
                    echo "Percentage should be 50 below.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                    exit;
                }
            }
        }

		if(empty($high_year) || empty($inter_year) || empty($grad_year)){
			echo "High School, Intermediate, Graduation year are mandatory fields.";
			echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
			exit;
		}

		if($high_year >= $inter_year || $high_year+1 >= $inter_year){
			echo "High school is always less than intermediate year and should have 2 years difference between both.";
			echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
			exit;
		}

		if( $inter_year>= $grad_year || $inter_year+3 > $grad_year){
			echo "Intermediate year is always less than graduation year and should have aleast 3 years difference.";
			echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
			exit;
		}

		if(!empty($prof_year)){
			if( $grad_year>= $prof_year || $grad_year+2 > $prof_year){
				echo "Graduation year is always less than professional qualification year and should have aleast 2 years difference.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
				exit;
			}
		}

		if(!empty($prof_year) && !empty($post_grad_year)){
			if( $prof_year >= $post_grad_year || $prof_year+2 > $post_grad_year){
				echo "Professional qualification year is always less than post graduation and should have aleast 2 years difference.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
				exit;
			}
		}

		// Work Experience 1
		$count = count($_POST['orgn_inst']);
		$orgn_inst = $_POST['orgn_inst'];
		$period_from = $_POST['period_from'];
		$period_to = $_POST['period_to'];
		$nature_of_work = $_POST['nature_of_work'];
		$remark = $_POST['remark'];
		
		$term_and_cond = $_POST['term_and_conditions'];
		$verify_code = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['verify_code']))));

		//Fetch data query 
		$query = "select id, email, verification_code, created_at from verification_code where email = '".$email."'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			date_default_timezone_set('Asia/Kolkata');
			while($row =  mysqli_fetch_assoc($result)){

				$loginTime = $row['created_at'];
				
				$currentTime = date("Y-m-d H:i:s");

				$datetime1 = new DateTime($loginTime);

				$datetime2 = new DateTime($currentTime);

				$interval = $datetime1->diff($datetime2);

				$elapsed_days = $interval->format('%a');
				$elapsed_hours = $interval->format('%h');
				$elapsed_minutes = $interval->format('%i');

				$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');

				if(($elapsed_days > 0 || $elapsed_hours > 0) || ($elapsed_minutes >= 30)){
					echo "Your OTP verification code has been expired.";
					echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
					exit();
				}	
			}
		}
		
		if(!empty($name) && !empty($father_name) && !empty($dob_month) && !empty($dob_day) && !empty($dob_year) && !empty($contact_number) && !empty($email) && !empty($stream) && !empty($mailing_address) && !empty($permanent_address) && !empty($term_and_cond) && !empty($verify_code) && !empty($high_board) && !empty($high_year) && !empty($high_mode) && !empty($high_division) && !empty($high_perc_mark) && !empty($inter_board) && !empty($inter_year) && !empty($inter_mode) && !empty($inter_division) && !empty($inter_perc_mark) && !empty($grad_board) && !empty($grad_year) && !empty($grad_mode) && !empty($grad_division) && !empty($grad_perc_mark)){
			
			$sql0 = "SELECT id FROM verification_code WHERE verification_code = '".$verify_code."' AND email = '".$email."'";
			$result = mysqli_query($conn, $sql0);

			if(mysqli_num_rows($result) > 0) {

				$sql1 = "INSERT INTO user_information (name, father_name, date_of_birth, contact_number, email, stream, mailing_address, permanent_address, photograph, signature, term_and_conditions)
				VALUES ('".$name."', '".$father_name."', '".$date_of_birth."', '".$contact_number."', '".$email."', '".$stream."', '".$mailing_address."', '".$permanent_address."', '".$filename1."', '".$filename2."', '".$term_and_cond."')";

				mysqli_query($conn, $sql1);
				$user_info_id = mysqli_insert_id($conn);

				$sql2 = "INSERT INTO educational_qualification (user_info_id, high_school, high_board, high_year, high_mode, high_division, high_perc_mark, intermediate, inter_board, inter_year, inter_mode, inter_division, inter_perc_mark, graduation, grad_board, grad_year, grad_mode, grad_division, grad_perc_mark, professional_qualification, prof_board, prof_year, prof_mode, prof_division, prof_perc_mark, post_graduation, post_grad_board, post_grad_year, post_grad_mode, post_grad_division, post_grad_perc_mark)
				VALUES ('".$user_info_id."', '".$high_school."', '".$high_board."', '".$high_year."', '".$high_mode."', '".$high_division."', '".$high_perc_mark."', '".$intermediate."', '".$inter_board."', '".$inter_year."', '".$inter_mode."', '".$inter_division."', '".$inter_perc_mark."', '".$graduation."', '".$grad_board."', '".$grad_year."',  '".$grad_mode."', '".$grad_division."', '".$grad_perc_mark."', '".$professional_qualification."', '".$prof_board."', '".$prof_year."', '".$prof_mode."', '".$prof_division."', '".$prof_perc_mark."', '".$post_graduation."', '".$post_grad_board."', '".$post_grad_year."', '".$post_grad_mode."', '".$post_grad_division."', '".$post_grad_perc_mark."')";

				// Code add more for Work Experience
				if($count > 0)
				{
					for($i=0; $i < $count; $i++) {
						
						if(trim($_POST['orgn_inst'][$i] != '') && trim($_POST['period_from'][$i] != '') && trim($_POST['period_to'][$i] != '') && trim($_POST['nature_of_work'][$i] != '') && trim($_POST['remark'][$i] != ''))
						{
							$insert_data = mysqli_query($conn, "INSERT INTO work_experience(user_info_id,orgn_inst,period_from,period_to,nature_of_work,remark) VALUES ('$user_info_id', '$orgn_inst[$i]', '$period_from[$i]', '$period_to[$i]', '$nature_of_work[$i]', '$remark[$i]')");
						}
					}
				}

				if (mysqli_query($conn, $sql2)) {

				// For delete verification record after verify code.
				$sql4 = "DELETE FROM verification_code WHERE verification_code = '".$verify_code."' AND email = '".$email."' LIMIT 1";
				mysqli_query($conn, $sql4);

				// Store a string into the variable which
					// need to be Encrypted
					$simple_string = $user_info_id;
					
					// Store the cipher method
					$ciphering = "AES-128-CTR";
					
					// Use OpenSSl Encryption method
					$iv_length = openssl_cipher_iv_length($ciphering);
					$options = 0;
					
					// Non-NULL Initialization Vector for encryption
					$encryption_iv = '1234567891011121';
					
					// Store the encryption key
					$encryption_key = "123456abcde";
					
					// Use openssl_encrypt() function to encrypt the data
					$encryption = openssl_encrypt($simple_string, $ciphering,
								$encryption_key, $options, $encryption_iv);

					header("URL=".$redirect_url."?hash_key=".$encryption);
					//header('URL='.$redirect_url);
					/* Redirect browser */
					exit();	
				// echo "New record created successfully.";
				} else {
				echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
				}
				
				mysqli_close($conn);

			}else{
				
				echo "Verification code has not matched. Kindly fill correct verification code.";
				echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
				exit;
			}
			
		}else{
			
			echo "Kindly fill all fields.";
			echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
			exit;
		}
	}else{
		echo "Sorry captcha did not match. Try again";
		echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
		exit;
	}
	unset($_SESSION['captcha_string']);
	//header('URL='.$redirect_url);
}
?>