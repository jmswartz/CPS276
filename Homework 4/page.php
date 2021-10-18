<?php
require_once 'addNameProc.php';
$addName = new AddNamesProc();
$output = $addName->addClearNames();


//$addname ->setname();

?>
<html>
<head>
<title>Add names</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<form action="page.php" method="POST">

<h2>Add Names</h2>

<input class="btn btn-primary" type="submit" name="add" value="Add Name">
<input class="btn btn-primary" type="submit" name="clear" value="Clear Names">
<br>
Enter Names
<br>
<input type="text" class="form-control"  name="inputname" id="inputname">
<br>
List of Names
<textarea style="height: 500px;" class="form-control"
id="namelist" name="namelist"><?php echo $output; ?></textarea>

</textarea>
</form>
</body>
</html>
