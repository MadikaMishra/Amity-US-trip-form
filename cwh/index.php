<?php
$insert = false;
if(isset($_POST['name'])){
    // Set Connection to the variables
    $server="localhost";
    $username="root";
    $password="";
    
    // create database connection
    $con = mysqli_connect($server, $username, $password);
       //check for connection success
    if(!$con){
      die("connection to this database failed due to" . mysqli_connect_error());
    }
      // echo " successful submition";


      //collect post variables
      $name = $_POST['name'];
      $gender= $_POST['gender'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $desc = $_POST['desc'];
      $sql = "INSERT INTO `trip` . `trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dd`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
      //echo $sql;
      

      //execute the query
      if($con->query($sql)==true){
        //echo "Successfully inserted";

        //flag for successful insertion
        $insert =true;
      }
      else{
        echo "ERROR: $sql <br> $con-> error";
      }

      //close the database connection
      $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Travel Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <img class="amity" src="university-img.jpg" alt="Amity University">
  <div class="container">
    <h1>Welcome to Amity University US Trip Form</h1>
    <p>Enter Your details and submit this form to confirm your participation in the trip</p>
    <?php
    if ($insert == true);{
     echo "<p class='submitmsg'>  Thanks for submitting your form. we are happy to see you coming with us.</p>";
    }
  ?>
    <form method="post" action="index.php">
      <input type="text" name="name" id="name"
       placeholder="Enter your name">
       <input type="text" name="age" id="age"
       placeholder="Enter your age">
       <input type="text" name="gender" id="gender"
       placeholder="Enter your gender">
       <input type="email" name="email" id="email" placeholder="Enter your email">
       <input type="phone" name="phone" id="phone"
       placeholder="Enter your phone">
       <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
       <button class="btn">Submit</button>
      
      
    </form>
  </div>
  <script src="index.js"></script>
  
</body>
</html>

