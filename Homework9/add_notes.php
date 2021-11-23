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
</style>

<title>Add Notes</title>

</head>

<body>
<h1>Please add your note!</h1>
<a href="Index.php">Display Saved Notes</a>
<form class="form-group" method="POST" action="<?php $_PHP_SELF ?>">
<label for="datetime" >Date and Time</label>
<input type="datetime-local" class="form-control" id="datetime" name="datetime"/>
<label for="note" >Note</label>
<textarea class="form-control" style="height: 50vh" id="note" name="note"></textarea>
<input type="submit" class="btn btn-primary" name="submit" value="Add Note"/>
</form>
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$dt->Submit($_POST);

}

?>