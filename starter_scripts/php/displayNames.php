<?php
require_once ('../classes/db.php');
$results = execute ('SELECT name from names order by name');
if (!empty ($results)){
  $names = array_column($results,'name');
  $response ['names']=implode("<br>",$names);

} else {
  $response['msg']="No Data Found";
  $response['masterstaus']="error";
}


  
echo json_encode($response);








