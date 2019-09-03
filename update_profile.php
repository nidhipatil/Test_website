<?php 

    session_start();
    include_once'connection.php';
    $db=mysqli_connect($servername,$username,$password,$dbname);
   
    if(isset($_POST['submit'])&&($_POST['password']===$_POST['confirm_pass'])){
        
        $user_name=$_POST['user_name'];
        $user_mail_id=$_POST['user_mail_id'];
        $confirm_pass=$_POST['confirm_pass'];
        $confirm_pass = password_hash($confirm_pass, PASSWORD_DEFAULT);//encrypt the password before 
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        
        $query="INSERT INTO users(user_name,user_mail_id,confirm_pass,first_name,last_name) VALUES('$user_name','$user_mail_id','$confirm_pass','$first_name','$last_name')";
        mysqli_query($db,$query);
        header('location:sign_up.php');

    }
?>