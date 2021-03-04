<?php include "templates/include/header.php" ?>
	<title>Initiatives</title>
	<link rel="stylesheet" type="text/css" href="initiatives.css">
	
	<!-- landing page -->
	<section style="background: #F2D0C8" style="padding-top: 10%;">
	
		<div class="container">
			<div class="row reverse-col" style="margin-top: 10%">
				
				<div class="container">
			<div class="row reverse-col">
				<div class="col-lg-6 m-auto">
					
					<h1>Initiatives</h1>
					<br>
					<h4 style="line-height:160%; font-family:nunito">
						WITS delivers a series of initiatives designed to inspire and equip.
						We provide our community with access to informative panels, educationals, workshops, inspirational speakers, and SheHacks.
					</h4>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-5 py-5">
					<img src="images/computer.png" class="mobileimg" alt="main pic">
				</div>
			</div>
		</div>
		
		
				
		
	</section>
	<img src="images/header-waves/pink-wave.svg" class="w-100 mb-5" style="margin-top: -5px">
	
	<section class="py-5">
		<!-- top 3 initiatives section (events and educationals)-->
		<div class="container" style="margin-top: 1%">
			<div class="card">
				<div class="card-horizontal" href="events.php"  target="_blank">
					<div class="card-body py-5 px-5">
						<h4>Events & Educationals</h4>
						<p>Throughout the year, we will be hosting a variety of workshops, panels, and educationals. Join us for recruiting tips and tricks, casual community work sessions, and informational events that will showcase what tech has to offer!</p>            		
						   <a href="events.php"><button class="round-orange-button">See our events</button></a>
					   </div>
					   <img class="d-none d-lg-block " src="images/events.png" alt="Card image cap">
					</div>
				</div>
			</div>
		</div>
		
		<!-- top 3 initiatives section (mentorship program)-->
		<div class="container" style="margin-top: 2%">
			<div class="card">
				<div class="card-horizontal" href="ada.php"  target="_blank">
					<div class="card-body py-5 px-5">
						<h4>Mentorship Program</h4>
						<p>The WITS Mentorship Programs connect young women who want to expand their knowledge and gain footing in the tech world with upper-years who have that experience and knowledge as part of a year-long project development program.</p>            		
						   <a href="ada.php"><button class="round-orange-button">Our programs</button></a>
					   </div>
					   <img class="d-none d-lg-block " src="images/mentorship.png" alt="Card image cap">
					</div>
				</div>
			</div>
		</div>		

		<!-- top 3 events -->
		<div class="container" style="margin-top: 2%; margin-bottom: 3%">
			<div class="card">
				<div class="card-horizontal" href="blog.php"  target="_blank">
					<div class="card-body py-5 px-5">
						<h4>Blog & Podcast</h4>
						<p>Our blog and podcast feature stories and insights from women in the tech industry. Read up on tech tips and exciting tid-bits, and listen to our podcast for insightful stories about navtigating the industry, told directly by the incredible women themselves!</p>            		
						   <a href="blog.php"><button class="round-orange-button">Learn more</button></a>
					   </div>
					   <img class="d-none d-lg-block " src="images/trailblazers.png" alt="Card image cap">
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<img src="images/header-waves/beige-wave-flipped.svg" class="w-100" style="margin-bottom: -5px;">
	<!-- upcoming events section -->
	<div style="background: #F1EFE2" class="py-5">	
		<div class="container">
			<h2>Upcoming Events</h2>
			<br><br>
			
			<?php
					include "classes/getFutureEvents.php";
				?>
	</div>
	
	
	
	<!-- past events section -->
	<div class="marginTop5Footer">
		<div class="container">
			<h3 >A LOOK BACK</h3>
			<h2 >Past Events</h2>
			
			<!-- 4x2 table of past events -->
			<div class="row">
			<?php
					include "classes/getPastEvents.php";
				?>
				
			</div>
		</div>
	</div>


	<!-- footer -->
	<?php include "templates/include/footer.php" ?>
