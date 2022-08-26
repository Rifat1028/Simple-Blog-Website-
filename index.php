<?php

$insert=false;

if(isset($_POST['name'])){
     define("DB_HOST", "localhost");
     define("DB_USERNAME", "root");
     define("DB_PASSWORD", "");
     define("port", "4000");

      
     
    
 
     $connection = mysqli_connect(DB_HOST.":".port, DB_USERNAME, DB_PASSWORD);

     if(!$connection){
         die("Connection failed due to " . mysqli_connect_error());  
     }
     // echo "Successfully connected to database";  

     $name = $_POST['name'];
     $username=$_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     
     // checking validity
    
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }
      
        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
        } 

     $sql = "INSERT INTO profile.info ( `name`, `username`, `email`, `password`, `date`)
      VALUES ( '$name','$username' '$email', '$password', current_timestamp());";

     

     if($connection ->query($sql) == true){
         // echo "Successfully Updated";
         $insert=true;
     }
     else{
         echo "Error: $sql <br> $connection->error";
     }

     $connection->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="layout.css" />
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="http://tinypic.com?ref=261kfht" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="on_top_button.js"></script>
    <title>Sign Up</title>
  </head>
  <body>
    <div class="section">
      <div class="form_section">
        <div class="containerr form_section-container">
          <h2>Sign Up</h2>
          <div class="alert_massage error">
            <p>This is an error massage</p>
          </div>
          <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Name" id='name' />
            <input type="text" placeholder="Username" id='username' />
            <input type="email" placeholder="Email" id='email' />
            <input type="password" placeholder="Create Password" id='password' />
            <input type="password" placeholder="Confirm Password" id='cpassword' />
            
            <div class="form_control">
              <label for="avatar"></label>
              <input type="file" id="avatar" />
            </div>
            <button type="submit" class="btn">Sign up</button>
            
            <?php
        if($password == $cpassword){
                      
        if($insert == true){
          echo " <p class='submit_massage'>Thank you for joining</p> ";
        }
    }
    else{
        echo " Password don't match " ;
    }
        ?>  <p>
              Already have an account?
              <a href="signin.html">Sign in</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>


