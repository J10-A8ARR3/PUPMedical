<?php
    $con = mysqli_connect("localhost", "root", "", "registerform");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
