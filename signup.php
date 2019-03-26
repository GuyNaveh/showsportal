<?php
  include("connection.php");

  session_start();

    $addData = "INSERT INTO user (firstname, lastname, email, password, area, phone) VALUES 
    ('".mysqli_real_escape_string($link, $_POST['firstname'])."',
    '".mysqli_real_escape_string($link, $_POST['lastname'])."',
    '".mysqli_real_escape_string($link, $_POST['email'])."',
    '".mysqli_real_escape_string($link, $_POST['password'])."',
    '".mysqli_real_escape_string($link, $_POST['city'])."',
    '".mysqli_real_escape_string($link, $_POST['phone'])."')";

    if (!mysqli_query($link, $addData)) {

        echo("Error description: " . mysqli_error($link));
        $error = "<p> Could not sign you up - please try again later.</p>";

    } else {
        $_SESSION['name'] = $_POST['firstname'];
        $_SESSION['admin'] = $row['type'];
        $_SESSION['id'] = mysqli_insert_id($link);

        $query = "UPDATE user SET password = '".md5(md5($_SESSION['id']).$_POST['password'])."' WHERE 
        u_id = ".$_SESSION['id']." LIMIT 1";

        mysqli_query($link, $query);

    }
?>