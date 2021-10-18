<?php

class AddNamesProc {

//$nameList=[];



public function addClearNames(){
    if(empty($_REQUEST['add'])){
        return "";
    }
    $name=$_REQUEST['inputname'];
    $ar=explode(' ', $name);
    $newname=$ar[1].', '.$ar[0];
    $ar=explode("\n",$_REQUEST['namelist']);
    $ar[]=$newname;
    sort($ar);
    return implode("\n", $ar);
//public $
//$output=[];
//array_push($output,$_POST['inputname']);
//$name=$_POST["namelist"];
//if(isset($name)){
	//sort($name);
//$outputI=implode("\n",$name);
//$outputE=explode(" ",$name);
//$outputI=implode(",",$outputE);


//return $outputI;
}



}



?>