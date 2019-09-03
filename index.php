<!DOCTYPE html>
<html lang="en">
<head>
	<title>study point</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="container">

		<div class="nav">
			<img class="logo" src="img/logo8.png">

			<div class="slogan"> A Great Place To Learn</div>

		    <div class="link">
		    	<button><a href="sign_in.php">Sign-In</a></button>
		    </div>
               
		</div>

		<div class="middle">
			
			<div class="w3-content w3-section" style="max-width:500px">
			  <img class="mySlides" src="img/loggo.png" style="width:100%">
			  <img class="mySlides" src="img/slide_3.png" style="width:100%">
			  <img class="mySlides" src="img/slide_1.png" style="width:100%">
			</div>

			<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			  var i;
			  var x = document.getElementsByClassName("mySlides");
			  for (i = 0; i < x.length; i++) {
			    x[i].style.display = "none";  
			  }
			  myIndex++;
			  if (myIndex > x.length) {myIndex = 1}    
			  x[myIndex-1].style.display = "block";  
			  setTimeout(carousel, 2000); // Change image every 2 seconds
			}
			</script>
		</div>

		<!--footer---------------------------------------------->
         
		  <div class="row">
			  <div class="column side">
			    <h3>ADDRESS</h3>
			    <p>School Of Rocks </p>
			    <p>Sr. No. 32/A/1/10, Lane Besides Platinum Super Store, Opp. Shivani Society and Raghunana Baug, off, Pan Card Club Rd, Baner, Pune, Maharashtra 411045</p>
			  </div>
			  
			  <div class="column middle">
			    <h3>ABOUT US</h3>
			    <p>India’s Leading School Network
					School  of Rock.</p><p> It is a passionate believer in the concept of 'Balanced Schooling‘ and we aim at creating confident & responsible individuals through a combination of Academic & Co - Curricular activities.</p> <p>Our learning process is thus focused on encouraging students to discover their true potential and nurturing them on their journey of self discovery and growth.</p>
				</div>
					  
			  <div class="column side">
			    <h3>CONTACT</h3>
			    <p>Email : nidhi123@gmail.com</p>
			    <p>Mobile No. 4567890876</p>
			  </div>
		</div>

</body>
</html>
