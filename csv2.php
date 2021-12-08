<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

 $delimiter = ",";
 $filename = "xl" . date('Y-m-d') . ".csv";
 //create a file pointer
    $f = fopen('php://output', 'w'); //'php://memory'
	
	//set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');  
 //set column headers
    $fields = array('Registeration Number', 'Name','Father Name', 'Date of Birth','Address', 'Email', 'Phone','Mobile','Area of Intrest','From Internship Date','To Internship Date','Photograph','Resume');
    fputcsv($f, $fields, $delimiter);
	$sectionVal = $_SESSION['Query'];
    
    //print_r($sectionVal);die;
    $query = "SELECT  internship_scheme.*, area_interest.area_interest_name FROM internship_scheme INNER JOIN area_interest on internship_scheme.area_interest = area_interest.id";
    if(@$sectionVal['high_mark_obtained'] || @$sectionVal['inter_mark_obtained'] || @$sectionVal['grad_mark_obtained'] || @$sectionVal['post_grad_mark_obtained'] ){
        $query = $query." INNER JOIN internship_scheme_educational_qualification on internship_scheme.id = internship_scheme_educational_qualification.internship_scheme_id ";
    }
     $query = $query." where term_and_conditions = '1'";
    if(@$sectionVal['email'])
    {
        $query = $query." And email = '".$sectionVal['email']."'";
    }
    
    if(@$sectionVal['mobile_number']){ 
        
        $query = $query." And mobile_number = '".$sectionVal['mobile_number']."'";
    }

    if(@$sectionVal['name']) {
        

        $query = $query." And name like '%".$sectionVal['name']."%'";
    }
    //echo query
    if(@$sectionVal['area_interest']) {
        
        $query = $query." And area_interest ='".$sectionVal['area_interest']."'";
    }

   
    
     if(@$sectionVal['fromage']){
        
    $query = $query. "And DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(),`dob`)),'%Y')+0 >= '".$sectionVal['fromage']."'";
     }
//echo $query;
   if(@$sectionVal['toage']){
    
   $query = $query. "And DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(),`dob`)),'%Y')+0 <='".$sectionVal['toage']."'";
}
   if(@$sectionVal['high_mark_obtained']){
    
    $query = $query." And high_mark_obtained ".$sectionVal['highfilter']." '".$sectionVal['high_mark_obtained']."'";
}
if(@$sectionVal['inter_mark_obtained']){
    
    $query = $query." And inter_mark_obtained ".$sectionVal['interfilter']." '".$sectionVal['inter_mark_obtained']."'";
}

if(@$sectionVal['grad_mark_obtained']){
    
    $query = $query." And grad_mark_obtained" .$sectionVal['gradfilter']." '".$sectionVal['grad_mark_obtained']."'";
}

if(@$sectionVal['post_grad_mark_obtained']){
    
    $query = $query." And post_grad_mark_obtained" .$sectionVal['postgradfilter']." '".$sectionVal['post_grad_mark_obtained']."'";
}
$result = mysqli_query($conn, $query);
$i = 1;
 while($row = mysqli_fetch_assoc($result)) {
        //echo '<pre>'; print_r($row);
		//$sid = $row['sid'];
 		
	 	$lineData = array($row['registeration_number'],$row['name'],$row['father_name'],$row['dob'],$row['address'],$row['email'],$row['contact_number'],$row['mobile_number'],$row['area_interest_name'],$row['from_internship_date'],$row['to_internship_date'],$row['photograph'],$row['resume']);
        fputcsv($f, $lineData, $delimiter);
        $i++;
}
    //fseek($f, 0);
    
    
    
    //output all remaining data on a file pointer
    fpassthru($f);




?>