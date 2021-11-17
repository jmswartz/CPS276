<?php
require_once ('../classes/db.php');






$data = json_decode ($_REQUEST['data'],true);

   
    
    if(!$data){
        $response =[];
          $response['msg']="error";
          $response['masterstaus']="error";
        echo json_encode($response);
        exit;
    }



    $userInputName = json_decode($_REQUEST['data'],true)['name'];
/*
    if(!['name']){
        $response =[];
        $response['msg']="error";
        $response['masterstaus']="error";
      echo json_encode($response);
      exit;
    }
*/
    $name=explode(' ', $userInputName);
    $newname=$name[1].', '.$name[0];
    $response =[];
    $response['msg']="New Name Added";
   $arg[] = $newname;
   execute ('INSERT INTO names (name) VALUES (?)',$arg);
  echo json_encode($response);


