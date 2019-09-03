<?php 
    
    include_once'connection.php';
    session_start();
    $msg="";
    $db=mysqli_connect($servername,$username,$password,$dbname);
   
   if(isset($_POST['Login'])){
		$username=$_POST['user_name'];
	    $password=$_POST['confirm_pass'];

        $result = mysqli_query($db,"SELECT user_name,confirm_pass FROM users WHERE user_name = '$username'");

        $row = mysqli_fetch_array($result);
        $hashed_password=$row['confirm_pass'];
        
        if($row["user_name"]==$username && password_verify($password,$hashed_password)){
        
            $new_id=$row["id"];
            $_SESSION['id']=$new_id;
            $_SESSION['logged_user_name']=$username;
            header('Location:home.php');
        } 
		else {
            $_SESSION['msg']="Please enter valid user name and password";
            header('Location:sign_in.php');
		}
        }
        
        if(isset($_POST['cancel'])){
            header('location:index.php'); 
        }
?>