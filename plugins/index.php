<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sectionVal= '';
            //print_r($_SESSION);//die;

if($_SESSION){
$sectionVal = $_SESSION['Query'];
}
//print_r($_SESSION['Query']['email']);
	
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

//print_r($_POST);

require('fpdf.php');

class PDF extends FPDF
{
    //Page Footer
    function Header()
    {
    
    }

    function Footer()
    {
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.
        $this->PageNo(),1,0,'C');

    }
}

$pdf = new PDF();
$pdf->AddPage();
//$pdf->Image('Images/pdf-header.png',0,10,'C');



//$pdf->AddPage();
$pdf->Image('Images/pdf-header2.png',5,7,200);
$pdf->Ln(60);


//Filters

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(193,229,252);

if (@$sectionVal['email'])
{
    $pdf->Cell(20,10,'Email',1,0,'C');
    $pdf->Cell(30,10,$sectionVal['email'],1,1,'C');
    $pdf->Ln(10);
}
if (@$sectionVal['name'])
{
    $pdf->Cell(20,10,'Name',1,0,'C');
    $pdf->Cell(30,10,$sectionVal['name'],1,1,'C');
    $pdf->Ln(10);
}

if (@$sectionVal['registeration_number'])
{
    $pdf->Cell(40,10,'Registeration Number',1,0,'C');
    $pdf->Cell(40,10,$sectionVal['registeration_number'],1,1,'C');
    $pdf->Ln(10);
}

if (@$sectionVal['dob'])
{
    $pdf->Cell(40,10,'Date of Birth',1,0,'C');
    $pdf->Cell(40,10,$sectionVal['dob'],1,1,'C');
    $pdf->Ln(10);
}

if (@$sectionVal['mobile_number'])
{
    $pdf->Cell(40,10,'Phone Number',1,0,'C');
    $pdf->Cell(40,10,$sectionVal['mobile_number'],1,1,'C');
    $pdf->Ln(10);
}


if (@$sectionVal['area_inerest'])
{
    $pdf->Cell(40,10,'Area of Interest',1,0,'C');
    $pdf->Cell(30,10,$sectionVal['area_inerest'],1,1,'C');
    $pdf->Ln(10);
}

if (@$sectionVal['fromage'])
{
    $pdf->Cell(30,10,'Age: From',1,0,'C');
    $pdf->Cell(20,10,$sectionVal['fromage'],1,1,'C');
    $pdf->Ln(10);
}
if (@$sectionVal['toage'])
{
    $pdf->Cell(30,10,'Age: To',1,0,'C');
    $pdf->Cell(20,10,$sectionVal['toage'],1,1,'C');
    $pdf->Ln(10);
}
if (@$sectionVal['high_mark_obtained'])
{
    $pdf->Cell(30,10,'High School ',1,0,'C');
    $pdf->Cell(10,10,$sectionVal['highfilter'],1,0,'C');
    $pdf->Cell(20,10,$sectionVal['high_mark_obtained'],1,1,'C');
    $pdf->Ln(10);
}
if (@$sectionVal['inter_mark_obtained'])
{
    $pdf->Cell(30,10,'Intermediate',1,0,'C');
    $pdf->Cell(10,10,$sectionVal['interfilter'],1,0,'C');
    $pdf->Cell(20,10,$sectionVal['inter_mark_obtained'],1,1,'C');
    $pdf->Ln(10);
}
if (@$sectionVal['grad_mark_obtained'])
{
    $pdf->Cell(30,10,'Graduation',1,0,'C');
    $pdf->Cell(10,10,$sectionVal['gradfilter'],1,0,'C');
    $pdf->Cell(20,10,$sectionVal['grad_mark_obtained'],1,1,'C');
    $pdf->Ln(10);
}
if (@$sectionVal['post_grad_mark_obtained'])
{
    $pdf->Cell(30,10,'Post Graduation',1,0,'C');
    $pdf->Cell(10,10,$sectionVal['postgradfilter'],1,0,'C');
    $pdf->Cell(20,10,$sectionVal['post_grad_mark_obtained'],1,1,'C');
    $pdf->Ln(10);
}






$width_cell=array(40,30,25,30,40,25);
$pdf->SetFont('Arial','B',9);
//bacground color of header

$pdf->SetFillColor(193,229,252);

//header starts
    
$pdf->Cell($width_cell[0],10,'Registeration Number',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Name',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Date of Birth',1,0,'C',true);
$pdf->Cell($width_cell[3],10,'Phone Number',1,0,'C',true);
$pdf->Cell($width_cell[4],10,'Email',1,0,'C',true);
$pdf->Cell($width_cell[5],10,'Area of Interest',1,1,'C',true);
//header ends//
$pdf->SetFillColor(235,236,236);
$pdf->SetFont('Arial','',8);
$fill=false;
//print_r($query);die;

while($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell($width_cell[0],10,$row['registeration_number'],1,0,'L',$fill);
    $pdf->Cell($width_cell[1],10,$row['name'],1,0,'L',$fill);
    $pdf->Cell($width_cell[2],10,$row['dob'],1,0,'L',$fill);
    $pdf->Cell($width_cell[3],10,$row['mobile_number'],1,0,'L',$fill);
    $pdf->Cell($width_cell[4],10,$row['email'],1,0,'L',$fill);
    $pdf->Cell($width_cell[5],10,$row['area_interest_name'],1,1,'L',$fill);
$fill=!$fill;    


}
//die;


$pdf->Output();
?>
