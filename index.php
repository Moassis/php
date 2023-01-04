<?php
$insert=false;
if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }

    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];

    $sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP);";

    if($con->query($sql)==true){
        $insert=true;
    }
    else{
        echo "Error:$sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="image" src="image.jpeg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip.</p>
        
        <?php
            if($insert==true){
                echo "<p class='submitmessage'>Thanks for submitting your form. We are happy to see you joining us.</p>";
            }
        ?>           

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" value="Enter your name.">
            <input type="text" name="age" id="age" value="Enter your age.">
            <input type="text" name="gender" id="gender" value="Enter your gender.">
            <input type="email" name="email" id="email" value="Enter your mail.">
            <input type="phone" name="phone" id="phone" value="Enter your phone.">
            <textarea name="desc" id="desc" cols="30" rows="10" value="Enter any other information here."></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>

    <script src="index.js"></script>
    
</body>
</html>