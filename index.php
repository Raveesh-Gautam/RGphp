<?php  
$insert=false;
if(isset($_POST['name'])){
    // set connection variable
$server="localhost";
$username="root";
$password="";
// create a data base connection 
$con=mysqli_connect($server,$username,$password);
// check for connection success 
if(!$con){
    die("connection to this database failed due to". mysqli_connect_error());

} 
// echo "success connection to the db";
// collect post variablle 
$name=$_POST['name'];
$gender=$_POST['gender'];
$Age=$_POST['Age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];



$sql="   INSERT INTO `ustrip`.`trip` ( `name`, `Age`, `gender`, `email`, `phone`,  `date`)
 VALUES ( '$name', '$Age', '$gender', '$email', '$phone', current_timestamp());";
//  echo $sql;
// execute the querey 
if($con->query($sql)==true){
    // flag for successfull submission 
    $insert=true;
    // echo "successfully inserted";
}else{
    echo "ERROR:$sql <br> $con->error";
}
// close the data base connection 
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="php2.jpg" alt="uiet">
    <div class="container">
        <h3>Welcome to uiet kanpur us Trip form</h3>
        <p>enter your details to confirm your participation Form to confirm your participants in the Trip</p>
        <?php
        if($insert==true){
  echo  " <p class='submitmsg'Thanks for submitting your form . We are happy to see you joining us the US Trip</p>";
}
  ?>
  <div class="uiet">
      <!-- this is uiet -->
            <hr>
    
        </div>
  
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="Age" id="Age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
 
</body>

</html>