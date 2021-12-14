<?php

class Date_Time{

private $connection;

function __construct(){
$server = "localhost";
$username = "dandrew1";
$password = "1234";
$dbname = "CPS276";
$this->connection = new mysqli($server, $username, $password, $dbname);
if ($this->connection->connect_error) {
die("Connection failed: " . $this->connection->connect_error);
}

}

function Submit($datetm){

$timestamp = strtotime($datetm['datetime']);
$note = $datetm['note'];
$mdate = $datetm['datetime'];
$sql = "INSERT INTO a9 (entered_at,note) VALUES('$mdate','$note');";

if($this->connection->query($sql)){
echo "Note has been added successfully";
}

else{
echo "Error ".$sql;
}
}

function getNotes($begin,$end){
$sql = "SELECT * FROM a9 WHERE CAST(entered_at AS DATE) BETWEEN '$begin' AND '$end' ORDER BY entered_at;";
$result = $this->connection->query($sql);
$notes = array();
if($result->num_rows>0){
while($row = $result->fetch_assoc()){
$note = array("entered_at"=>$row['entered_at'],"note"=>$row['note']);
array_push($notes,$note);
}
}

return $notes;
}
}

?>

