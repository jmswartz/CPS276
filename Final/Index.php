<!doctype html>
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
<title></title>
<script>
   function checkInfo(){
       var error='';
       name = document.getElementsByName('name')[0].value;
       address = document.getElementsByName('address')[0].value;
       city = document.getElementsByName('city')[0].value;
       state = document.getElementsByName('state')[0].value;
       phone = document.getElementsByName('phone')[0].value;
       email = document.getElementsByName('email')[0].value;
       dob = document.getElementsByName('dob')[0].value;
      
       if(name == ''){
           error += "- Please Enter Name <br />";
       }else{
           var regex = /^[a-zA-Z\- ]{3,50}$/;
           if(!regex.test(name)){
               error += "- Please Valid Name <br />";
           }
       }
       if(address == ''){
           error += "- Please Enter address <br />";
       }else{
           var regex = /^[0-9]{1,6}[a-zA-Z\- ]{3,50}$/;
           if(!regex.test(address)){
               error += "- Please Valid address <br />";
           }
       }  
       if(city == ''){
           error += "- Please Enter city <br />";
       }else{
           var regex = /^[a-zA-Z ]{1,50}$/;
           if(!regex.test(city)){
               error += "- Please Valid city <br />";
           }
       }
       if(state == ''){
           error += "- Please Select state <br />";
       }
       if(phone == ''){
           error += "- Please Enter phone <br />";
       }else{
           var regex = /^[0-9]{3}[\-][0-9]{3}[\-][0-9]{4}$/;
           if(!regex.test(phone)){
               error += "- Please Valid phone <br />";
           }
       }
       if(email == ''){
           error += "- Please Enter email <br />";
       }else{
           var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           if(!regex.test(email)){
               error += "- Please Valid email <br />";
           }
       }
       if(dob == ''){
           error += "- Please Enter Date of Birth <br />";
       }else{
           var regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
           if(!regex.test(dob)){
               error += "- Please Valid Date of Birth <br />";
           }
       }
       if(!document.querySelector('input[name="age"]:checked')){
           error += "- Please select an age range <br />";
       }
       if(error == ''){
           return true;
       }else{
           document.getElementById('error').innerHTML= error;
           return false;
       }
      
   }
</script>
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
        if(isset($_POST['name']) && ($_POST['name'] != '')){
           $name = $_POST['name'];
           $address = $_POST['address'];
           $city = $_POST['city'];
           $state = $_POST['state'];
           $phone = $_POST['phone'];
           $email = $_POST['email'];
           $dob = date ('Y-m-d', strtotime($_POST['dob']));
           $age = $_POST['age'];
           
          
           echo $sql = "INSERT INTO a10 (name, address, city, phone, state, dob, age, email, cb1, cb2, cb3) VALUES ($name, $address, $city, $phone, $state, $dob, $age, $email, $cb1, $cb2, $cb3)";
           $result = mysqli_query($dbc, $sql);
           if($result){
               header('Location : Index.php?s=1');
               exit;
           }else{
               header('Location : Index.php?s=2');
               exit;
           }
       }
      
?>
<div style="margin: 0 auto;width: 600px">
   <form method="post" onSubmit="return checkInfo()">
   <table class="profile" style="width: 100%">
       <tr>
           <td>
               <a href="Index.php">Add Contact Information</a><br /><br />
               <a href="displaycontact.php">Display ALL Contact Information</a>
           </td>
       </tr>
       <tr>
           <td>Name (Letters only)</td>
       </tr>
       <tr>
           <td><input type="text" name="name" /></td>
       </tr>
       <tr>
           <td>Address (just number and street)</td>
       </tr>
       <tr>
           <td><input type="text" name="address" /></td>
       </tr>
       <tr>
           <td>City</td>
       </tr>
       <tr>
           <td><input type="text" name="city" /></td>
       </tr>
       <tr>
           <td>Sate</td>
       </tr>
       <tr>
           <td>
               <select name="state">
                   <option selected value="">--select--</option>
                   <option value="state1">state1</option>
                   <option value="state2">state2</option>
                   <option value="state3">state3</option>
                   <option value="state4">state4</option>
                   <option value="state5">state5</option>
               </select>
           </td>
       </tr>
       <tr>
           <td>Phone</td>
       </tr>
       <tr>
           <td><input type="text" name="phone" /></td>
       </tr>
       <tr>
           <td>Email Address</td>
       </tr>
       <tr>
           <td><input type="text" name="email" /></td>
       </tr>
       <tr>
           <td>Date Of Birth (dd/mm/yyyy)</td>
       </tr>
       <tr>
           <td><input type="text" name="dob" /></td>
       </tr>
       <tr>
           <td>Please check all contact types you would like (optinal)</td>
       </tr>
       <tr>
           <td>
               <input type="checkbox" name="cb1" value="Newsletter" />Newsletter
               <input type="checkbox" name="cb2" value="Email Updates" />Email Updates
               <input type="checkbox" name="cb3" value="Text Updates" />Text Updates
           </td>
       </tr>
       <tr>
           <td>Please Select an age range (you must selct one) </td>
       </tr>
       <tr>
           <td>
               <input type="radio" name="age" value="10-18" />10-18
               <input type="radio" name="age" value="19-30" />19-30
               <input type="radio" name="age" value="30-50" />30-50
               <input type="radio" name="age" value="50+" />50+
           </td>
       </tr>
       <tr>
           <td><input class="button" type="submit" value="Save" /></td>
       </tr>
       <tr>
           <td style="color: red" id='error'></td>
       </tr>
       <?php
       if(isset($_GET['s']) && $_GET['s'] == 1){
           echo "<tr><td style='color:red'> Contact has been added</td></tr>";
       }
       if(isset($_GET['s']) && $_GET['s'] == 2){
           echo "<tr><td style='color:red'> There was an error adding the record</td></tr>";
       }
       ?>
   </table>
   </form>
</div>
</body>
</html>
