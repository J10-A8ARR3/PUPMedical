<?php
session_start();

include("../db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $num = $_POST['pnum'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {

        $query = "INSERT INTO form (fname, lname, gender, pnum, address, email, pass) VALUES ('$firstname', '$lastname', '$gender', '$num', '$address', '$email', '$password')";

        mysqli_query($con, $query);
            
        echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
        } 
        else 
        {
            echo "<script type='text/javascript'>alert('Registration Failed');</script>";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../signup/signup.css">
</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <h4>Please fill the information below</h4>
        <form method="POST">
            <label for="first-name">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="First Name" required>
            <label for="last-name">Last Name</label>
            <input type="text" id="lname" name="lname" placeholder="Last Name" required>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <label for="phone">Phone Number</label>
            <input type="tel" id="pnum" name="pnum" placeholder="Phone Number" required>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Address" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <label for="password">Password</label>
            <input type="password" id="pass" name="pass" placeholder="Password" required>
            <input type="submit" value="Sign Up">
        </form>
        <p>By clicking the Sign Up button, you agree to our
        <a href="https://www.pup.edu.ph/terms/">Terms and Conditions</a> and <a href="https://www.pup.edu.ph/privacy/">Privacy Policy</a>
        </p>
        <p>Already have an account? <a href="../login/login.php">Login Here</a></p>
    </div>
</body>
</html>
