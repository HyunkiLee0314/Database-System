<?php
    require 'condb.php';
    session_start();
    $email=mysqli_real_escape_string($con,$_POST['email']);
    
    $password=mysqli_real_escape_string($con,$_POST['password']);
    
    $user_authentication_query="select admin_id from admin where admin_id='$email' and admin_password='$password'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        ?>
        <script>
            window.alert("Wrong ID or password");
        </script>
        <meta http-equiv="refresh" content="1; url=login.php" />
        <?php
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id']; 
        header('location: index.php');
    } 
 ?>