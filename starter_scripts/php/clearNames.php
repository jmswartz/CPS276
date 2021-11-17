<?php
require_once ('../classes/db.php');

$results = execute ('DELETE FROM names');


  $response['msg']="Data Cleared";
  $response['masterstaus']="success";



  
echo json_encode($response);