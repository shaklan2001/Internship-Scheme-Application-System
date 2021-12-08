<?php
session_start();
//Databse connection file
include('config.php');
$base_url = $url.'/internship-scheme.php';
$redirect_url = $url.'/internship-scheme-files.php';

if($_SESSION['captcha_string']==$_POST["captcha_input"])
    {
        // Period of Intership (From)
        $from_dob_month = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['from_dob_month']))));
        $from_dob_day = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['from_dob_day']))));
        $from_dob_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['from_dob_year']))));
        $from_internship_date = $from_dob_year. "/". $from_dob_month. "/". $from_dob_day;

        // Period of Intership (To)
        $to_dob_month = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['to_dob_month']))));
        $to_dob_day = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['to_dob_day']))));
        $to_dob_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['to_dob_year']))));
        $to_internship_date = $to_dob_year. "/". $to_dob_month. "/". $to_dob_day;

        $startTimeStamp = strtotime($from_internship_date);
        $endTimeStamp = strtotime($to_internship_date);
        
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        
        $numberDays = $timeDiff/86400;  // 86400 seconds in one day
        
        // and you might want to convert to integer
        $numberDays = intval($numberDays);

        if($numberDays <= 28){
            echo "Your are in 28 days less";
            echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
            exit;
        }
        if($numberDays > 90){
            echo "Not allowed for 90 days";
            echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
            exit;
        }

        $email = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['email']))));
        $sql = "SELECT id FROM internship_scheme WHERE email = '".$email."' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

            echo "This email (<strong>'".$email."'</strong>) have already exists.";
            echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
            exit;
         }

        $name = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['name']))));
        $father_name = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['father_name']))));
        $dob_month = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['dob_month']))));
        $dob_day = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['dob_day']))));
        $dob_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['dob_year']))));
        $date_of_birth = $dob_year. "/". $dob_month. "/". $dob_day;

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
        $address = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['address']))));
        $email = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['email']))));
        $contact_number = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['contact_number']))));
        $mobile_number = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['mobile_number']))));
        $area_interest = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['area_interest']))));

        // High School
        $high_school = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_school']))));
        $high_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_year']))));
        $high_inst_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_inst_board']))));
        $high_mark_obtained = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_mark_obtained']))));
        $high_remarks = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['high_remarks']))));
        // Intermediate
        $intermediate = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['intermediate']))));
        $inter_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_year']))));
        $inter_inst_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_inst_board']))));
        $inter_mark_obtained = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_mark_obtained']))));
        $inter_remarks = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['inter_remarks']))));
        // Graduation
        $graduation = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['graduation']))));
        $grad_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_year']))));
        $grad_inst_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_inst_board']))));
        $grad_mark_obtained = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_mark_obtained']))));
        $grad_remarks = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['grad_remarks']))));

        // Post Graduation
        $post_graduation = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_graduation']))));
        $post_grad_year = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_year']))));
        $post_grad_inst_board = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_inst_board']))));
        $post_grad_mark_obtained = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_mark_obtained']))));
        $post_grad_remarks = addslashes(htmlspecialchars(strip_tags(trim($_REQUEST['post_grad_remarks']))));
        
        // Term and Conditions
        $term_and_cond = isset($_REQUEST['term_and_conditions'])?$_REQUEST['term_and_conditions']: '';

        if(!empty($name) && !empty($father_name) && !empty($dob_month) && !empty($dob_day) && !empty($dob_year) && !empty($mobile_number) && !empty($email) && !empty($area_interest) && !empty($address) && !empty($high_year) && !empty($high_inst_board)  && !empty($high_mark_obtained) && !empty($high_remarks) && !empty($inter_year) && !empty($inter_inst_board) && !empty($inter_mark_obtained) && !empty($inter_remarks) && !empty($grad_year) && !empty($grad_inst_board) && !empty($grad_mark_obtained) && !empty($grad_remarks) && !empty($term_and_cond)){

            // Check if the form was submitted

            $sql1 = "INSERT INTO internship_scheme (name, father_name, dob, address, email, contact_number, mobile_number, area_interest, from_internship_date, to_internship_date, term_and_conditions)
            VALUES ('".$name."', '".$father_name."', '".$date_of_birth."', '".$address."', '".$email."', '".$contact_number."', '".$mobile_number."', '".$area_interest."', '".$from_internship_date."', '".$to_internship_date."', '".$term_and_cond."')";

            mysqli_query($conn, $sql1);
            $internship_id = mysqli_insert_id($conn);
            
            $sql2 = "INSERT INTO internship_scheme_educational_qualification (internship_scheme_id, high_school, high_year, high_inst_board, high_mark_obtained, high_remarks, intermediate, inter_year, inter_inst_board, inter_mark_obtained, inter_remarks, graduation, grad_year, grad_inst_board, grad_mark_obtained, grad_remarks, post_graduation, post_grad_year, post_grad_inst_board, post_grad_mark_obtained, post_grad_remarks)
            VALUES ('".$internship_id."', '".$high_school."', '".$high_year."', '".$high_inst_board."', '".$high_mark_obtained."', '".$high_remarks."', '".$intermediate."', '".$inter_year."', '".$inter_inst_board."', '".$inter_mark_obtained."', '".$inter_remarks."',  '".$graduation."', '".$grad_year."', '".$grad_inst_board."', '".$grad_mark_obtained."', '".$grad_remarks."', '".$post_graduation."', '".$post_grad_year."', '".$post_grad_inst_board."', '".$post_grad_mark_obtained."', '".$post_grad_remarks."')";

            if (mysqli_query($conn, $sql2)) {
                // Store a string into the variable which
					// need to be Encrypted
					$string = $internship_id;
					
					// Store the cipher method
					// $ciphering = "AES-128-CTR";
					
					// // Use OpenSSl Encryption method
					// $iv_length = openssl_cipher_iv_length($ciphering);
					// $options = 0;
					
					// // Non-NULL Initialization Vector for encryption
					// $encryption_iv = '1234567891011121';
					
					// // Store the encryption key
					// $encryption_key = "123456abcde";
					
					// // Use openssl_encrypt() function to encrypt the data
					// $encryption = openssl_encrypt($simple_string, $ciphering,
					// 			$encryption_key, $options, $encryption_iv);
                    $hasvalue = md5($string);
                    echo "<script>location='".$redirect_url."?hash_key=".$string."U".$hasvalue."B'</script>";
					//header("Location: $redirect_url?hash_key=".$encryption); /* Redirect browser */
					exit();	
            // echo "New record created successfully.";
            } else{
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
                exit;
            }
            
            mysqli_close($conn);
            
        }else{
            
            echo "Kindly fill all fields.";
            echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
            exit;
        }
    }
    else
    {
        echo "Sorry captcha did not match. Try again";
        echo "<p><a href='".$base_url."'><button>Back to Page</button></a></p>";
        exit;
    }
    unset($_SESSION['captcha_string']);