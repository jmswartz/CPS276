<?php

require_once "Crud.php";

class FileList{

function createList(){

$crud = new Crud();
return $crud->getFiles();  
}
}

?>