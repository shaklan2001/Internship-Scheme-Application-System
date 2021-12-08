<?php
session_start();
//Databse connection file
include('config.php');
$base_url = $url.'/young-professional-files.php';
$main_url = $url.'/yp/young-professional.php';

$encryption = $_REQUEST['hash_key'];

if(empty($encryption)){
    echo "You are not authorized registered user.";
    echo "<p><a href='".$main_url."'><button>Back to Main Page</button></a></p>";
    exit();
}

if($_SESSION['captcha_string']==$_POST["captcha_input"]) {

    $encryption = $_REQUEST['hash_key'];

    // Store the cipher method
    $ciphering = "AES-128-CTR";
    
    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for decryption
    $decryption_iv = '1234567891011121';
    
    // Store the decryption key
    $decryption_key = "123456abcde";

    // PHP program to illustrate mime_content_type function
    $photograph = $_FILES["photograph"];
    $valid_photograph_file = mime_content_type($photograph["tmp_name"]);

    $signature = $_FILES["signature"];
    $valid_signature_file = mime_content_type($signature["tmp_name"]);

    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");

    if(!in_array($valid_photograph_file, $allowed) || !in_array($valid_signature_file, $allowed)){
        echo "You can not upload that files because there are no valid file format.";
        echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
        exit;
    }
    
    // Use openssl_decrypt() function to decrypt the data
    $decryption_id = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
    $decryption_id = trim($decryption_id);

    $query = "SELECT id, email, photograph, signature FROM user_information WHERE id = '".$decryption_id."'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        while($row =  mysqli_fetch_assoc($result)){	

            $photograph = $row['photograph'];
            $signature = $row['signature'];

            if(!empty($photograph) && !empty($signature)){
                echo "You have already uploaded files. You are not allowed to upload files again.";
                echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                exit();
            }

                // For File
                $photograph = $_FILES['photograph'];
                $signature = $_FILES['signature'];
                
                if(!empty($_FILES["photograph"]["name"]) && !empty($_FILES["signature"]["name"])){

                        // Check if the form was submitted
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $filename1 = "";
                            $filename2 = "";
                            // Check if file was uploaded without errors
                            if(isset($_FILES["photograph"]) && $_FILES["photograph"]["error"] == 0){
                                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
                                $filename1 = $_FILES["photograph"]["name"];
                                $filename1 = time()."_".$filename1;
                                $filetype = $_FILES["photograph"]["type"];
                                $filesize = $_FILES["photograph"]["size"];
                            
                                // Verify file extension
                                $ext = pathinfo($filename1, PATHINFO_EXTENSION);
                                if(!array_key_exists($ext, $allowed)){
                                    echo "Error: Please select a valid file format ( jpg, jpeg, png ) for photograph.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            
                                // Verify file size - 160KB maximum
                                $maxsize = 160 * 1024;
                                if($filesize > $maxsize) {
                                    echo "Error: File size is larger than the allowed limit ( 160KB maximum ) for photograph.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            
                                // Verify MYME type of the file
                                if(in_array($filetype, $allowed)){
                                    // Check whether file exists before uploading it
                                    if(file_exists("upload/" . $filename1)){
                                        echo $filename1 . " is already exists.";
                                        echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                        exit;
                                    } else{
                                        move_uploaded_file($_FILES["photograph"]["tmp_name"], "upload/" . $filename1);
                                    } 
                                } else{
                                    echo "Error: There was a problem uploading your file for photograph. Please try again."; 
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            } else{
                                // echo "Error: " . $_FILES["photograph"]["error"];
                            }
                            
                            // Check if file was uploaded without errors
                            if(isset($_FILES["signature"]) && $_FILES["signature"]["error"] == 0){
                                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
                                $filename2 = $_FILES["signature"]["name"];
                                $filename2 = time()."_".$filename2;
                                $filetype = $_FILES["signature"]["type"];
                                $filesize = $_FILES["signature"]["size"];
                            
                                // Verify file extension
                                $ext = pathinfo($filename2, PATHINFO_EXTENSION);
                                if(!array_key_exists($ext, $allowed)){
                                    echo "Error: Please select a valid file format ( jpg, jpeg, png ) for signature.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            
                                // Verify file size - 50kB maximum
                                $maxsize = 50 * 1024;
                                if($filesize > $maxsize) {
                                    echo "Error: File size is larger than the allowed limit ( 50kB maximum ) for signature.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            
                                // Verify MYME type of the file
                                if(in_array($filetype, $allowed)){
                                    // Check whether file exists before uploading it
                                    if(file_exists("upload/" . $filename2)){
                                        echo $filename2 . " is already exists.";
                                        echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                        exit;
                                    } else{
                                        move_uploaded_file($_FILES["signature"]["tmp_name"], "upload/" . $filename2);
                                    } 
                                } else{
                                    echo "Error: There was a problem uploading your file for signature. Please try again.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            } else{
                                // echo "Error: " . $_FILES["signature"]["error"];
                            }
                        }

                        $sql1 = "UPDATE user_information SET photograph = '".$filename1."', signature = '".$filename2."' WHERE id = '".$decryption_id."'";

                        if (mysqli_query($conn, $sql1)) {
                            echo "New record created successfully.";
                            echo "<p><a href='".$main_url."'><button>Back to Main Page</button></a></p>";
                            exit;
                        } else {
                        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                        echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                        exit;
                        }
                    
                }else{
                    
                    echo "Both fields are required.";
                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                    exit;
                }
            unset($_SESSION['captcha_string']);
        }
    }else{
                            
        echo "You are not authorized registered user.";
        echo "<p><a href='".$main_url."'><button>Back to Page</button></a></p>";
        exit();
    }
}else{

    echo "Captcha did not Matched. Try Again";
    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
    exit;
}
?>