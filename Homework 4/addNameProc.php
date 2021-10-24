<?php

class AddNamesProc {


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

}



}



?>