<?php
//Databse connection file
include('config.php');
date_default_timezone_set('Asia/Kolkata');

$email = $_POST['email'];
// checking for duplicating user condition
$query = "SELECT id, photograph, resume FROM internship_scheme WHERE email = '".$email."'";

$result = mysqli_query($conn, $query);

// print_r($result->num_rows);
// echo mysqli_num_rows($result);

if(mysqli_num_rows($result) > 0){

  while($row =  mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $photograph = $row['photograph'];
    $resume = $row['resume'];
    if(empty($photograph) || empty($resume)){
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
        $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);    
        echo $post_data = json_encode(array('id' =>$id,'hash_key' => $encryption), JSON_FORCE_OBJECT);
        die;
    }else{
        echo $post_data = json_encode(array('message' =>'register_already_done'), JSON_FORCE_OBJECT);
        die;
    }
  }
}
?>