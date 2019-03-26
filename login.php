<?php


    if (isset($_POST['login'])) {

        include("connection.php");

        session_start();

        $email = mysqli_real_escape_string($link, $_POST['emailPHP']);
     //   $password = md5(mysqli_real_escape_string($link, $_POST['passwordPHP']));
        
        $result = mysqli_query($link, "SELECT * FROM user WHERE email='$email' LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        $password = md5(md5($row['u_id']).$_POST['passwordPHP']);

        if($row['password'] == md5(md5($row['u_id']).$_POST['passwordPHP'])) {

            $_SESSION['id'] = $row['u_id'];
            $_SESSION['name'] = $row['firstname'];
            $_SESSION['admin'] = $row['type'];
            
            echo 'OK';

        } else {

            echo 'incorrect';

        }

    }
    
?>