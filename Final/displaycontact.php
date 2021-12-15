<!doctype html>
<html>
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
<title></title>
</head>
<body>
<?php
        //your server name default 'localhost'
        $servername = "localhost";
        // your server username default 'root'
        $username = "dandrew1";
        // your server password defaul no password
        $password = "1234";
        // your database name
        $dbname = "CPS276";
        //database connection
        $dbc = mysqli_connect($servername, $username, $password, $dbname);
        //check delete button is clicked
        if(isset($_POST['delete']) && ($_POST['delete'] != '')){
           // read checkbox array and loop through the each contact id and delete it
           $count = 0;
           foreach($_POST['delete'] as $check) {
               $cid = $check;
               $sql = "DELETE FROM a10 WHERE cid = '$cid'";
               mysqli_query($dbc, $sql);
               $count += 1;
           }
           header('Location : index.php?s='.$count);
           exit();
       }
?>
<div style="margin: 0 auto;width: 800px">
   <form method="post">
   <table class="profile" style="width: 100%">
       <tr>
           <td colspan="11">
               <a href="Index.php">Add Contact Information</a><br /><br />
               <a href="displaycontact.php">Dispaly ALL Contact Information</a>
           </td>
       </tr>
       <tr>
           <td colspan="11">
               <input class="button" type="submit" value="Delete" />
           </td>
       </tr>
       <tr>
           <th>Sl No</th>
           <th>Name</th>
           <th>Address</th>
           <th>City</th>
           <th>Sate</th>
           <th>Phone</th>
           <th>Email</th>
           <th>DOB</th>
           <th>Contact</th>
           <th>Age</th>
           <th>Delete</th>
       </tr>
       <?php
           $sql = "SELECT * FROM a10";
           $result = mysqli_query($dbc,$sql);
           $num = mysqli_num_rows($result);
           $slno = 1;
           while($result_row = mysqli_fetch_assoc($result)){
       ?>
       <tr>
           <td><?=$slno?></td>
           <td><?=$result_row['name']?></td>
           <td><?=$result_row['address']?></td>
           <td><?=$result_row['city']?></td>
           <td><?=$result_row['state']?></td>
           <td><?=$result_row['phone']?></td>
           <td><?=$result_row['eamil']?></td>
           <td><?=$result_row['dob']?></td>
           <td><?=$result_row['contacttypes']?></td>
           <td><?=$result_row['age']?></td>
           <td>
               <!--Declare checkbox array for delete-->
               <input type="checkbox" name="delete[]" value="<?=$result_row['cid']?>" />
           </td>
       </tr>
       <?php $slno += 1; }
       if($num == 0){
           echo "<tr><td colspan='11'>There are no records to display</td></tr>";
       }
       if(isset($_GET['s'])){
           echo "<tr><td colspan='11' style='color:red'> ".$_GET['s']." Contact(s) deleted</td></tr>";
       }
       ?>
      
   </table>
   </form>
</div>
</body>
</html>
