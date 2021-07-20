<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once('classes/upload.php');

class Users extends Controller{



protected function testpage(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}


	protected function register(){
//get week of the year
$datenow = date('Y-m-d');
$date = new DateTime($datenow);
$week = $date->format("W");
//create folder  
$root = $_SERVER["DOCUMENT_ROOT"];
$dir = $root . '/upload/'.$week.'/';

if( !file_exists($dir) ) {
    mkdir($dir, 0755, true);
}

//upload file
$upload = new Upload();
$upload->setDir("upload/$week/");
$upload->setExtensions(array('jpg','jpeg','png'));  //allowed extensions list//
$upload->setMaxSize(3.0);                          //set max file size to be allowed in MB//

if($upload->uploadFile('the_file')){   //txtFile is the filebrowse element name //     
    $image  = $upload->getUploadName(); //get uploaded file name, renames on upload//
    $imgPath = "upload/$week/".$upload->getUploadName(); 
}else
{//upload failed
	$imgPath = null;
    $upload->getMessage(); //get upload error message 
    echo "upload failed";
}


		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register($imgPath), true);
	}

	protected function login(){
		
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function checkID(){
		$viewmodel = new UserModel();
		$viewmodel->checkID();
	}

	protected function checkEmail(){
		$viewmodel = new UserModel();
		$viewmodel->checkEmail();
	}

	public function fetch() {

		$viewmodel = new UserModel();
		$viewmodel->fetch();
	}
	
	public function checkAuth() {
		if(isset($_SESSION['is_logged_in']))
	{
	   echo json_encode(true);
	}
	else
	{
	  echo json_encode(false);
	}
  }
  
  public function printPdf() {
	  $html = $_POST['pdfData'];
	  $mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->output('result.pdf');
//generated file

  }
  
  public function printExcel() {
	// $html = $_POST['excelData'];
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$header = [array("Customer Number", "Customer Name", "Address", "City", "State", "Zip")];

$row = [array("levan", "tc", "sfdfsdf", "sdfsdf", "sdfsdf", "Zsdfsdfip")];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->fromArray($header, NULL, 'A1');     
    $sheet->fromArray($row, NULL, 'A1');   
$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
	  
  }
  
  public function exportExcel() {
	  
	    $excelData = $_POST['excelData'];
	    $viewmodel = new UserModel();
		$viewmodel->exportExcel($excelData);
	  
  }


	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
	}
}

?>
