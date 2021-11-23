<?php

class Date_Time{

private $connection;

function __construct(){
$server = "localhost";
$username = "jmswartz";
$password = "Ss3138512";
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
$sql = "INSERT INTO tdnotes3 (date_time,note) VALUES('$mdate','$note');";

if($this->connection->query($sql)){
echo "Note has been added successfully";
}

else{
echo "Error ".$sql;
}
}

function getNotes($begin,$end){
$sql = "SELECT * FROM tdnotes3 WHERE CAST(date_time AS DATE) BETWEEN '$begin' AND '$end' ORDER BY date_time;";
$result = $this->connection->query($sql);
$notes = array();
if($result->num_rows>0){
while($row = $result->fetch_assoc()){
$note = array("date_time"=>$row['date_time'],"note"=>$row['note']);
array_push($notes,$note);
}
}

return $notes;
}
}

?>

