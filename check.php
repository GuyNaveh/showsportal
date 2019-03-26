<?php

 if(isset($_POST['email'])) {

    include("connection.php");

    $email = mysqli_real_escape_string($link, $_POST['email']);

    $query = "SELECT u_id FROM user WHERE email = '".mysqli_real_escape_string($link, $email)."'";

    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) > 0) {
            echo '<p color="red">The email <strong>' .$email .'</strong>' .' is already in use.</p>';
        } else {
            echo 'OK';
    }
}

?>