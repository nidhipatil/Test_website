<?php

include_once'connection.php';
include_once'signin_details.php';
$db=mysqli_connect($servername,$username,$password,$dbname);

$cnt = 0;


$query="SELECT id, title,discription,user_id,image,link FROM posts";

$result=mysqli_query($db,$query);
$cnt = mysqli_num_rows(mysqli_query($db,$query));

if(!empty($_SESSION['id'])){
	$loggedIn_user_id=$_SESSION['id'];
}

function isLoggedIn() {
	return !empty($_SESSION['logged_user_name']);
}

function isLoggedInUsersPosts($db, $user_id_from_post,$loggedIn_user_id) {
	$query="SELECT * FROM posts WHERE user_id='$loggedIn_user_id'";
	$result=mysqli_query($db,$query);
	if(mysqli_query($db,$query)){
		while($row=mysqli_fetch_array($result)){
			return $row['user_id'] = $loggedIn_user_id;
		}
		
	}
	return false;

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>study Point</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
    <div class="container">
		<?php if(isLoggedIn()) {
			echo('
			<div class="nav1">
			     <img class="logo" src="img/logo8.png">
				<div class="h_link">
					<a style="color:rgb(6,3,54)">_______</a>
					<a href="post.php">Publish</a>
					<a style="color:rgb(6,3,54)">__</a>
					<a href="manage.php">Manage publication</a>
					<a style="color:rgb(6,3,54)">__</a>
					<a href="logout.php">Logout</a>

				</div>
				
			</div>
			');
		} else {
			echo "error";
		}
		?>
        <div class="main">
			<div class="welcome">
				<?php
					if(isLoggedIn()){?>
						<h2>Welcome <?php echo $_SESSION['logged_user_name'];?>, you have <?php echo $cnt;?> <?php if($cnt>1): echo 'publications'; else: echo 'publication'; endif;?> </h2>
					<?php }
					else{?>
						echo "error";
				<?php	}
				?>
                </div>
            
			   <div class="row">
					<?php 
					 	if($result)
						{  
							while($row=mysqli_fetch_array($result)){
								if(isLoggedIn()) {
									echo('
										<div class="row"> 
										<div class="immmg">
											<img src="data:image/jpg;base64,'.base64_encode( $row['image'] ).'" width="60%"class="imag1">

										</div>

											<div class="first">
												<b style="color:orange">Title:</b>  '.$row["title"].'
											</div>

											<div class="cnt">
											<b style="color:orange">Comment: </b> '.$row["discription"].'
											</div>

											<div class="fi">
											<b style="color:orange">Link:</b> '.$row["link"].'
											</div>

											<div class="last">
												<a href="post.php?edit='.$row['id'].'">Edit</a>
												<a href="post_delete.php?id='.$row['id'].'">Delete</a>
											</div>
											<hr>

										</div>');
								} else {
									echo('
									<div class="row"> 
										<img src="data:image/jpg;base64,'.base64_encode( $row['image'] ).'" width="60%" class="imag1">

										<div class="first">
											Title:'.$row["title"].'
										</div>

										<div class="cnt">
										'.$row["discription"].'
										</div>

										<div class="fi">
												 Link :'.$row["link"].'
											</div>

							

									</div>');
								}
								
							}
							mysqli_free_result($result);
						}
						mysqli_close($db);
                    ?>

			    </div>       
        </div>
    </div>
</body>
</html>