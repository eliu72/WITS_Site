<?php include "templates/include/header.php" ?>

<title>Blog & Podcast</title>
	<link rel="stylesheet" type="text/css" href="blog.css">
	<section style="background: #F4D089; padding-top: 12%; padding-bottom: 5%">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 m-auto">
					<h1>Blog & <br>Podcast</h1>
				</div>
				<div class="col-lg-6 py-5">
					<h4 style="font-family:nunito; font-weight: 600; line-height: 180%; color: #0A2338;">
						Hear and read the thoughts of powerful women in tech! Join us as we delve into their stories and insights.

					</h4>
				</div>
			</div>
		</div>
	</section>
	
	<div style="margin-top:5%">
		<div class="container">
			<div class="row" style="margin-bottom: 0px;">
			
				<div class="col" >
					
					<h3>PODCAST</h3>
					<h2 style="color:#0A2338" >Trailblaze-hers</h2><br>
					<h4><a class="buttonHover" href="https://open.spotify.com/show/5as4zJCEU6zHAv0hwdZGFE?si=InbX0VusQO6vwCWbeDd2EA" target="_blank">TrailBlaze-Hers is now available on Spotify!</a></h4>
					<h5 style="color: #0A2338; font-family:nunito; line-height:160%">The TrailBlaze-Hers Podcast tells the stories of influential women in tech - one story at a time. </h5>
				</div>
		
			</div>
			<div class="row">
			
				<div class="col-5 col-md-5 text-center">
					<a href="https://open.spotify.com/show/5as4zJCEU6zHAv0hwdZGFE?si=InbX0VusQO6vwCWbeDd2EA"target="_blank" ><img src="images/google.png"  alt="blog pic" ></a>
					<h5 style="text-align: center; color: #0A2338;"> Google's VP of User <br> Experience<br></h5>
					<a href="https://open.spotify.com/show/5as4zJCEU6zHAv0hwdZGFE?si=InbX0VusQO6vwCWbeDd2EA" target="_blank" class="btn btn-sm rounded-pill landingbutton justify-content-center" style="color: white; font-family: Rubik;">Listen on Spotify</a>
					
				</div>
				<div class="col-2 col-md-2">
				
				</div>
				
				<div class="col-5 col-md-5 text-center">
					<a href="https://open.spotify.com/show/5as4zJCEU6zHAv0hwdZGFE?si=InbX0VusQO6vwCWbeDd2EA"target="_blank" ><img src="images/cloud.png" alt="blog pic"></a>	
					<h5 style="text-align: center; color: #0A2338;"> In the Cloud with Erin <br> Chapple<br></h5>
					<a href="https://open.spotify.com/show/5as4zJCEU6zHAv0hwdZGFE?si=InbX0VusQO6vwCWbeDd2EA"  target="_blank" class="btn btn-sm rounded-pill landingbutton" style="color: white; font-family: Rubik;">Listen on Spotify</a>
				</div>
		
			</div>
		</div>
	</div>
	
	<div style="margin-top:5%; background:#F2D0C8 ">
		<div class="container">
			<div class="row">
			
				<div class="col">
					<br><br><br>
					<h3>MEDIUM BLOG</h3>
					<h2>Insights, inspirations, <br> and more!</h2>
		
				
				</div>
		
			</div>
			<div class="row">
			
			<?php
					include "classes/getBlogs.php"
				?>
				
			</div>
		</div>
		<br><br>
	</div>
		
	
<?php include "templates/include/footer.php" ?>

