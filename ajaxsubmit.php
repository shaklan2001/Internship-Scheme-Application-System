<?php
//Databse connection file
include('config.php');
date_default_timezone_set('Asia/Kolkata');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

$email = $_POST['email'];
$random_code = mt_rand(1,99999);

// checking for duplicating user condition
$query = "SELECT id, photograph, signature FROM user_information WHERE email = '".$email."'";

$result = mysqli_query($conn, $query);

// print_r($result->num_rows);
// echo mysqli_num_rows($result);

if(mysqli_num_rows($result) > 0){

  while($row =  mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $photograph = $row['photograph'];
    $signature = $row['signature'];
    if(empty($photograph) || empty($signature)){

		// Store a string into the variable which
		// need to be Encrypted
		$simple_string = $id;
		
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
		echo $post_data = json_encode(array('id' =>$id,'hash_key' => $encryption), JSON_FORCE_OBJECT);
    }else{

      echo $post_data = json_encode(array('message' =>'register_already_done'), JSON_FORCE_OBJECT);
    die;
    }
  }
}else{

  //Fetch data query 
  $query = "SELECT id, email, verification_code, created_at FROM verification_code WHERE email = '".$email."'";

  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) > 0){
    while($row =  mysqli_fetch_assoc($result)){

        $loginTime = $row['created_at'];
        $currentTime = date("Y-m-d H:i:s");

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
            // passing true in constructor enables exceptions in PHPMailer
            $mail = new PHPMailer(true);
        
            try {
                // Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
        
                $mail->Username = 'piyushchandradubey@gmail.com'; // YOUR gmail email
                $mail->Password = 'vdDubey@05'; // YOUR gmail password
        
                // Sender and recipient settings
                $mail->setFrom('piyushchandradubey@gmail.com', 'DPIIT');
                $mail->addAddress("$email", "Receiver Email: $email");
                $mail->addReplyTo("$email", "Sender Email: $email"); // to set the reply to
        
                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "Verification code for Department for Promotion of Industry and Internal Trade(DPIIT)";
                $mail->Body = 'Your Verification code is : '.$random_code;
                $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
        
                if($mail->send()) {
                //Insert query
                $created_at = date("Y-m-d H:i:s");
                $update_data = mysqli_query($conn, "UPDATE verification_code SET verification_code = '$random_code', created_at = '$created_at' WHERE email = '$email' LIMIT 1");
                echo $post_data = json_encode(array('message' =>'verification_code_sent_again'), JSON_FORCE_OBJECT);
                /// echo "Verification code has been sent on your authorised email succesfully again.";
                }else{
                  echo $post_data = json_encode(array('message' =>'Message_failed'), JSON_FORCE_OBJECT);
                  // echo "Message failed";
                  }
                  // echo "Email message sent.";
                } catch (Exception $e) {
                  echo $post_data = json_encode(array('message' =>'sending_failed'), JSON_FORCE_OBJECT);
                  //  echo "Error in sending email";
                    // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                  }
          }else{
            echo $post_data = json_encode(array('message' =>'otp_session_time'), JSON_FORCE_OBJECT);
            // echo "Check your authorised mail for old OTP. Your old OTP vaild only 30 miniute.";
            exit();
          }
      }
  }else{
    

  // passing true in constructor enables exceptions in PHPMailer
  $mail = new PHPMailer(true);

  try {
      // Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      $mail->Username = 'naresh90122@gmail.com'; // YOUR gmail email
      $mail->Password = ''; // YOUR gmail password

      // Sender and recipient settings
      $mail->setFrom('naresh90122@gmail.com', 'DPIIT');
      $mail->addAddress("$email", "Receiver Email: $email");
      $mail->addReplyTo("$email", "Sender Email: $email"); // to set the reply to

      // Setting the email content
      $mail->IsHTML(true);
      $mail->Subject = "Verification code for Department for Promotion of Industry and Internal Trade(DPIIT)";
      $mail->Body = 'Your Verification code is : '.$random_code;
      $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

      if($mail->send()) {
      //Insert query
    $insert_data = mysqli_query($conn, "insert into verification_code (verification_code, email) values ('$random_code', '$email')");
    echo $post_data = json_encode(array('message' =>'verification_code_sent'), JSON_FORCE_OBJECT);
    // echo "Verification code has been sent on your authorised email succesfully.";
    }else{
      echo $post_data = json_encode(array('message' =>'Message_failed'), JSON_FORCE_OBJECT);
      // echo "Message failed";
      }
      // echo "Email message sent.";
    } catch (Exception $e) {
      echo $post_data = json_encode(array('message' =>'sending_failed'), JSON_FORCE_OBJECT);
      // echo "Error in sending email";
        // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
      }	
    }

  mysqli_close($conn); // Connection Closed */
}
?> 