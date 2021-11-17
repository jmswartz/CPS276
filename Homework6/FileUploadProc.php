<?php

require_once "Crud.php";

class Upload{

private $fileName;
private $fileSize;
private $fileType;
private $fileEnteredName;

function __construct() {

$this->fileSize = $_FILES["selectedFile"]["size"];
$this->fileType = $_FILES["selectedFile"]["type"];
$this->fileName = $_FILES["selectedFile"]["name"];
$this->enteredFileName = $_POST['enteredFileName'];
}

function checkFile(){
  
if($this->fileSize > 100000){
return "This file is too big.";
}
else if($this->fileType != "application/pdf"){
return "File type is not okay. It must be a pdf file.";
}else{
return $this->moveFile();
}   
  
//return "File Size is: {$this->fileSize}. File Type is: {$this->fileType}.<br>
//File Name is: {$this->fileName}. Entered File Name is: {$this->enteredFileName}.";
}

function moveFile(){

if(move_uploaded_file($_FILES["selectedFile"]["tmp_name"], "files/".$this->fileName)){

$crud = new Crud();
return $crud->addFile();
  
}else{
return "There was a problem uploading your file. Please try again.";
}
}

} // class Upload

?>