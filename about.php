<?php include "templates/include/header.php" ?>
<link rel="stylesheet" type="text/css" href="about.css">

	<section class="teal-background" style="padding-top: 7%;">
		<div class="container">
			<div class="row reverse-col">
				<div class="col-lg-6 m-auto">
					<h1>About Us</h1>
					<br>
					<h4 style="font-family: nunito; color: #0A2338;">
						At Women In Technology Society, we’re here to support you in your journey through the tech world, join our community today!
					</h4>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-5">
					<img src="images/pipelines.png" alt="main pic">
				</div>
			</div>
		</div>
	</section>
	<img src="images/header-waves/teal-wave.svg" class="w-100 mb-5" style="margin-top: -5px;">


	<section>
		<div class="container">
			<div class="row">
				<div class="horizontal-center w-100 p-4">
					<h2>Meet the WITS Family</h2>
					
				</div>
				<?php
					include "classes/getMembers.php"
				?>
			</div>
		</div>
	</section>

	<section style="background: #F1EFE2; padding: 7% 0; margin-top: 5%">
		<div class="container">
			<div class="row">
				<div class="horizontal-center w-100 p-4 m-auto">
					<h2>Where We've Worked</h2>
				</div>				
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://careers.google.com/jobs/" target="_blank">
						<img id="hoverimg" src="images/googlelogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.mckinsey.com/careers/search-jobs" target="_blank">
						<img id="hoverimg" src="images/mclogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://stripe.com/en-ca/jobs" target="_blank">
						<img id="hoverimg" src="images/stripelogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.goldmansachs.com/careers/" target="_blank">
						<img id="hoverimg" src="images/gslogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://careers.microsoft.com/" target="_blank">
						<img id="hoverimg" src="images/microsoftlogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://stripe.com/en-ca/jobs" target="_blank">
						<img id="hoverimg" src="images/shopifylogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.shopify.ca/careers" target="_blank">
						<img id="hoverimg" src="images/dslogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.cloudflare.com/careers/" target="_blank">
						<img id="hoverimg" src="images/cloudfare.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://jobs.rbc.com/ca/en" target="_blank">
						<img id="hoverimg" src="images/rbclogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://jobs.td.com/en-CA/" target="_blank">
						<img id="hoverimg" src="images/tdlogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.cppinvestments.com/careers" target="_blank">
						<img id="hoverimg" src="images/cpplogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.cisco.com/c/en/us/about/careers.html" target="_blank">
						<img id="hoverimg" src="images/ciscologo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.avanade.com/en-ca/careers" target="_blank">
						<img id="hoverimg" src="images/avanadelogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://www.cibc.com/en/about-cibc/careers.html" target="_blank">
						<img id="hoverimg" src="images/cibclogo.png" alt="admin">
					</a>
				</div>
				<div class="col-lg-3 col-sm-4 col-4 p-4 m-auto horizontal-center">
					<a href="https://jobs.bce.ca/" target="_blank">
						<img id="hoverimg" src="images/belllogo.png" alt="admin">
					</a>
				</div>
			</div>
		</div>
	</section>
	

<?php include "templates/include/footer.php" ?>
