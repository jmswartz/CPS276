<?php
require_once 'function.php';

$Mfile= new MakeFile();
$output = $Mfile-> MakeFileFunc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


   
</head>

<body>
<form action="index.php" method="POST">
    <h1>File and Directory Assignment</h1>
    <label>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</label>
    <br>

    

 
        <label for="">Folder Name</label>
        <br>
        <input type="text" class="form-control" name="dir_name">
        <br>
        <h2>File Content</h2>
        <br>
        <textarea name="data" cols="50" rows="30"></textarea>
        <br>
        <input class="btn btn-primary" button type="submit"  value="Submit">
    </form>
</body>

</html>