<<?php
session_start();

include("../db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password) && !is_numeric($email))
    {
        $query = "select * from form where email = '$email' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['pass'] == $password)
                {
                    header("location: ../index/index.html");
                    die;

                }
            }
        }
        echo "<script type='text/javascript'>alert('Wrong Username or Password');</script>";        
    }
    else{
        echo "<script type='text/javascript'>alert('Wrong Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <h1>Welcome to</h1>
        <h4>Hospital Benefit Claim Online Form</h4>
        <form method="POST">
        <img src="../assets/healthlogo.png" alt logo>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <label for="password">Password</label>
            <input type="password" id="pass" name="pass" placeholder="Password" required>
            <input type="submit" value="Submit">
        </form>
        <p>Don't have an account? <a href="../signup/signup.php">Sign Up Here</a></p>
    </div>
</body>
</html>