<?php 
    include_once'connection.php';
    include_once'post_details.php';
    $userid=$_SESSION['id'];
    if(isset($_GET['edit'])){
        $post_id=$_GET['edit'];
        $edit_state=true;
        $rec = mysqli_query($db,"SELECT * FROM posts WHERE id='$post_id'");
        $record =mysqli_fetch_array($rec);
        $title=$record['title'];
        $discription=$record['discription'];
        $link=$record['link'];
        $post_id=$record['id'];   
        $user_id=$record['user_id'];
    }
    else{
        $edit_state=false;
        $title="";
        $discription="";
        $link="";
        $post_id="";
        $user_id="";
    }
   

?>
<!DOCTYPE html>
<html>
<head>
    <title>PUBLISH</title>
    <link href="form.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="signup__box">
       
        <form  method="post" action="post_details.php" enctype="multipart/form-data">
             <div class="header">
                <h2>PUBLISH</h2>
        </div>

                <?php if(isset($_SESSION['msg'])):?>
                    <div class="input-group">
                        <?php
                            echo $_SESSION['msg'];
            
                        ?>
                    </div>
                <?php endif ?>

            <input type="number" name="id" hidden value="<?php echo $post_id; ?>">

            <div class="input-group">
             
               Title: <input type="text" name="title"  placeholder="Enter title" value="<?php echo $title; ?>">
            </div>  
            
            <div class="input-group">          
                    
                Description: <input type="text" name="discription"  placeholder="Description" value="<?php echo $discription; ?>">
            </div>

            <div class="input-group">          
                image link: <input type="text" name="link"  placeholder="link" value="<?php echo $link; ?>">
            </div>
            

            <div class="input-group">
                <input type="file" name="image" id="fileSelect" ><br><br>
            </div>
            

            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

            <div class="input-group">
                <?php if($edit_state==true):?>
                    <input  type="submit" name="update" value="Update">
                <?php else:?>
                    <input  type="submit" name="submit" value="Submit">
                <?php endif?>
                <input  type="submit" name="cancel" value="Cancel">
            </div>


            
		</form>
    </div>
</body>
</html>