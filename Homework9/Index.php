<!DOCTYPE html>
<?php
require_once 'Date_time.php';

$dt = new Date_Time();

?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
.form-group{
margin: 10px
}
.form-control{
margin-bottom: 10px;
}
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}
td, th {
border: 1px solid #dddddd;
text-align: left;
padding: 8px;
}
tr{
background-color: #dddddd;
}
</style>

<title>Notes</title>

</head>

<body>

<h1>Display Saved Notes</h1>
<a href="./add_notes.php">Add Notes</a>
<form class="form-group" method="POST" action="<?php $_PHP_SELF ?>">
<label for="begDate" >Starting Date</label>
<input type="date" class="form-control" id="begDate" name="begDate"/>
<label for="endDate" >Ending Date</label>
<input type="date" class="form-control" id="endDate" name="endDate"/>
<input type="submit" class="btn btn-primary" name="submit" value="Get Notes"/>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$notes = $dt->getNotes($_POST['begDate'],$_POST['endDate']);
if(count($notes)>0){

?>

<table>

<tr style='background-color: #fefefe;'><th>Date and Time</th><th>Note</th></tr>

<?php

for($i=0;$i<count($notes);$i++){
if($i%2==0){
echo "<tr> <td>".$notes[$i]['date_time']."</td>
<td>".$notes[$i]['note']."</td><tr>";
}

else {
echo "<tr style='background-color: #fefefe;'> <td>".$notes[$i]['date_time']."</td>
<td>".$notes[$i]['note']."</td><tr>";
}
}

?>
</table>

<?php
}else{
echo "Couldn't find notes between given Dates";
}
}
?>
</body>
</html>