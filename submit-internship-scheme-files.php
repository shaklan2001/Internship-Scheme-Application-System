<?php
session_start();
//Databse connection file
include('config.php');
$base_url = $url.'/internship-scheme-files.php';
$main_url = $url.'/internship-scheme.php';

$encryption = $_REQUEST['hash_key'];

if(empty($encryption)){
    echo "You are not authorized registered user.";
    echo "<p><a href='".$main_url."'><button>Back to Main Page</button></a></p>";
    exit();
}

if($_SESSION['captcha_string']==$_POST["captcha_input"]){

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

    $resume = $_FILES["resume"];
    $valid_resume_file = mime_content_type($resume["tmp_name"]);

    $allowed_img_ext = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", );
    $allowed_doc_ext = array("pdf" => "application/pdf", "doc" => "application/msword", "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document");

    if(!in_array($valid_photograph_file, $allowed_img_ext) || !in_array($valid_resume_file, $allowed_doc_ext)){
        echo "You can not upload that files because there are no valid file format.";
        echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
        exit;
        exit;
    }
    
    // Use openssl_decrypt() function to decrypt the data
    // $decryption_id = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
    // $decryption_id = trim($decryption_id);

	$stringId = (explode("U",$encryption));


    $query = "SELECT id, email, photograph, resume FROM internship_scheme WHERE id = '".$stringId['0']."'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

            while($row =  mysqli_fetch_assoc($result)){	

                $photograph = $row['photograph'];
                $resume = $row['resume'];

                if(!empty($photograph) && !empty($resume)){
                    echo "You have already uploaded files. You are not allowed to upload files again.";
                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                    exit();
                }

                // For File
                $photograph = $_FILES['photograph'];
                $resume = $_FILES['resume'];

                if(!empty($_FILES["photograph"]["name"]) && !empty($_FILES["resume"]["name"])){

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
                                    echo "Error: Please select a valid file format ( jpg, jpeg, gif, png ) for photograph.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                } 
                            
                                // Verify file size - 800KB maximum
                                $maxsize = 819200;
                                if($filesize > $maxsize){
                                    echo "Error: File size is larger than the allowed limit ( 800 KB maximum ) for photograph.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            
                                // Verify MYME type of the file
                                if(in_array($filetype, $allowed)){
                                    // Check whether file exists before uploading it
                                    if(file_exists("upload/internship/" . $filename1)){
                                        echo $filename1 . " is already exists.";
                                    } else{
                                        move_uploaded_file($_FILES["photograph"]["tmp_name"], "upload/internship/" . $filename1);
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
                            if(isset($_FILES["resume"]) && $_FILES["resume"]["error"] == 0){
                                $allowed = array("pdf" => "application/pdf", "doc" => "application/msword", "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
                                $filename2 = $_FILES["resume"]["name"];
                                $filename2 = time()."_".$filename2;
                                $filetype = $_FILES["resume"]["type"];
                                $filesize = $_FILES["resume"]["size"];
                            
                                // Verify file extension
                                $ext = pathinfo($filename2, PATHINFO_EXTENSION);
                                if(!array_key_exists($ext, $allowed)){
                                    echo "Error: Please select a valid file format ( doc, docx, pdf ) for resume.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            
                                // Verify file size - 1 MB
                                $maxsize = 1 * 1024 * 1024;
                                if($filesize > $maxsize){
                                    echo "Error: File size is larger than the allowed limit ( 1 MB maximum ) for resume.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            
                                // Verify MYME type of the file
                                if(in_array($filetype, $allowed)){
                                    // Check whether file exists before uploading it
                                    if(file_exists("upload/internship" . $filename2)){
                                        echo $filename2 . " is already exists.";
                                        echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                        exit;
                                    } else{
                                        move_uploaded_file($_FILES["resume"]["tmp_name"], "upload/internship/" . $filename2);
                                    } 
                                } else{
                                    echo "Error: There was a problem uploading your file for resume. Please try again.";
                                    echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                                    exit;
                                }
                            } else{
                                // echo "Error: " . $_FILES["resume"]["error"];
                            }
                        }

                        $sql1 = "UPDATE internship_scheme SET photograph = '".$filename1."', resume = '".$filename2."' WHERE id = '".$row['id']."'";

                        if (mysqli_query($conn, $sql1)) {
                            echo "New record created successfully.";
                            echo "<p><a href='".$main_url."'><button>Back to Main Page</button></a></p>";
                            exit;
                        } else{
                            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                            echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
                            exit;
                        }
                        
                        mysqli_close($conn);
                    
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
        echo "Sorry captcha did not match. Try again";
        echo "<p><a href='".$base_url."?hash_key=".$encryption."'><button>Back to Page</button></a></p>";
        exit;
}