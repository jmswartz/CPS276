<?php

require_once 'ListFilesProc.php';

$fList = new FileList();
$output = $fList->createList();

?>

<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>List of Files</title>
</head>

<body>
<div class="container">
<h2>List of Files</h2>

<?php

$file = "Assignment.php";

echo "<a href= $file>Add File</a><br><br>";

echo $output;

?>

</div>
</body>

</html>