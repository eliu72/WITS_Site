<?php
		include "templates/include/header.php"
?>
<title>Events & Educationals</title>

<link rel="stylesheet" type="text/css" href="events.css">


	<section class="teal-background" style="padding-top: 12%;padding-bottom: 5%">
		<div class="container">
			<div class="row reverse-col">
				<div class="col-lg-6 m-auto">
					<h1>Events & <br>Educationals</h1>
				</div>
				<div class="col-lg-6 py-5">
					<h4 style="font-family:nunito">
						We provide our community with access to informative panels, educationals, workshops, 
						inspirational speakers.
					</h4>
				</div>
			</div>
		</div>
	</section>
	

	<section>
		<div class="container">
			<div class="container">
				<h3>EVENT SERIES</h3>
				
				<a name="recruitingseries"></a>
				<div class="row event-carousel-row event-carousel-row-margin w-100" style="background-color: #F4D089;">
					<div class="col-lg-3 col-md-4 col-sm-12 col-12 px-5 pt-5">
						<h2> Recruiting Series</h2>
						<?php
							$_SESSION['name'] = "Recruiting Series";
						?>
						<p> Opportunities designed for women to rapidly learn, test new skills, and gain hands on experience exploring fields of tech</p>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-6 my-3">
						<!--testimonials-slider starts-->
						<div class="slider m-auto">
							<?php
								include "classes/getEvents.php";
							?>
						</div>
						<!--slider ends-->
					</div>	
				</div>
				
				<a name="cookiesandcode"></a>
				<div class="row event-carousel-row event-carousel-row-margin w-100" style="background-color: #E68976;">
					<div class="col-lg-3 col-md-4 col-sm-12 col-12 px-5 pt-5">
						<h2>Cookies & Code</h2>
						<?php
							$_SESSION['name'] = "Cookies & Code";
						?>
						<p>Casual community sessions that provide a welcoming space for our members to practice their skills and seek mentorship from our exec team</p>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-6 my-3">
						<!--testimonials-slider starts-->
						<div class="slider m-auto">
						<?php
							include "classes/getEvents.php";
						?>
						</div>
						<!--slider ends-->
					</div>	
				</div>
				
				<a name="workshop"></a>
				<div class="row event-carousel-row event-carousel-row-margin w-100" style="background-color: #F1EFE2;">
					<div class="col-lg-3 col-md-4 col-sm-12 col-12 px-5 pt-5">
						<h2> Workshops</h2>
						<?php
							$_SESSION['name'] = "Workshops";
						?>
						<p>Educational opportunities hosted by subject experts to provide a learning opportunity across a variety of topics</p>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-6 my-3">
						<!--testimonials-slider starts-->
						<div class="slider m-auto">
						<?php
								include "classes/getEvents.php";
						?>
						</div>
						<!--slider ends-->
					</div>	
				</div>
				
				
			</div>
		</div>

	</section>

		
<?php include "templates/include/footer.php" ?>
