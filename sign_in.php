<?php 
    include_once'signin_details.php';
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>sign_up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="form.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="signup__box">

        

        <form  method="post">
          <div class="header">
            <h2>Sign In</h2>
        </div>
           <?php if(isset($_SESSION['msg'])):?>

             <div class="input-groupp">
                 <?php echo $_SESSION['msg']; ?>
             </div>
          <?php endif ?>
            
            <div class="input-group">
                User Name
                <input type="text" name="user_name" placeholder="User name">
            </div>

            <div class="input-group">
                 Password
                <input type="password" name="confirm_pass" placeholder="password" id="pass" >
            </div>
            
            <div class="input-group">
                <input  type="submit" name="Login" value="Login">
                <input  type="submit" name="cancel" value="Cancel">

                 <a href="sign_up.php" style="text-decoration:none;color:black">Register</a>
            </div>
           
		</form>
    </div>
</body>
</html>