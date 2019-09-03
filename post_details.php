<?php
	 session_start();
    include_once'connection.php';

    $db=mysqli_connect($servername,$username,$password,$dbname);
	

	if(isset($_POST['submit']))
		{

				$title= $_POST['title'];
				$discription = $_POST['discription'];
				$link =$_POST['link'];
				$user_id=$_POST['user_id'];
				$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
				
			$query = "INSERT INTO posts (title, discription,user_id,image,link) VALUES ('$title','$discription','$user_id','$image','$link')";
				$user_id = $_SESSION['user_id'];
				if(mysqli_query($db,$query)){
					$_SESSION['msg']="Post Done sucessfully";
					header('location:home.php'); 
				}else{
					echo $db->error;
				}
		
			}
		if(isset($_POST['update'])){
			$title=mysqli_real_escape_string($db,$_POST['title']);
			$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$post_image=mysqli_real_escape_string($db,$image);
			$post_id=mysqli_real_escape_string($db,$_POST['id']);   
        	$user_id=mysqli_real_escape_string($db,$_POST['user_id']);
		
			$query="UPDATE posts SET title='$title', discription='$discription',image='$post_id',user_id='$user_id' WHERE id='$post_id'";
			
			$results = mysqli_query($db,$query);
			header('location:home.php');

		}
		if(isset($_POST['cancel'])){
			header('location:home.php');
		}

?>