<?php

class AddNamesProc {

//$nameList=[];



public function addClearNames(){
//public $
//$output=[];
//array_push($output,$_POST['inputname']);


sort($_POST);
$outputI=implode("\n",$_POST);
$outputE=explode(" ",$outputI);
$outputI=implode(", ",$outputE);


return $outputI;

}

}





  


?>