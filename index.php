<?php
$insert = false;
if(isset($_POST['name'])){
$servername = "localhost";
$username = "root";
$password = 'password';

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$description=$_POST['desc'];
$email=$_POST['mail'];


 $sql = "INSERT INTO `trip`.`data` ( `name`, `age`, `gender`, `mobile`, `email_id`, `description`, `dd`)  VALUES ( '$name', '$age', '$gender', '$phone', '$email', '$description', current_timestamp()) "; 
 
 if($conn->query($sql) == true){
  $insert = true;
 }else{
   echo "Error  "  . mysqli_error($conn);
 }

 mysqli_close($conn);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Gorditas&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Punjabi University, Patiala" >
    <div class="container">
        <h1> Welcome to Punjabi University, Patiala</h1>
        <h2> Trip to Manali </h2>
        <h3> Enter your details and submit this form to confirm your participation in the trip</h3>
        <?php
        if($insert == true){
          echo "<p class='submitMsg'> Thanks for submitting your form. </p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" id="name" name="name" placeholder="Enter your name here">
            <input type="text" name="age" id="age" placeholder="Enter your age here">
            <input type="text" name="gender" id="gender" placeholder="Enter Gender">
            <input type="tel" name="phone" id="phone" placeholder="Enter Contact number">
            <input type="email" name="mail" id="mail"placeholder="Enter Email">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other details here"></textarea>
            <button class="btn" type="submit">Submit</button>

        </form>

    </div>
</body>
</html>


