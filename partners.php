<?php include "templates/include/header.php" ?>
<title>Partners</title>
<link rel="stylesheet" type="text/css" href="partners.css">

	<section style="background: #F4D089; padding-top:7%;">
		<div class="container">
			<div class="row reverse-col">
				<div class="col-lg-6 m-auto">
					
					<h1>Partners</h1>
					<br>
					<h4 style="line-height:160%; font-family:nunito">
						WITS has partnered with an incredible network of industry 
						professionals and is always looking for more passionate tech 
						advocates to connect with.
					</h4>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-5 py-5">
					<img src="images/mainpic.png" alt="main pic">
				</div>
			</div>
		</div>
	</section>
	<img src="images/header-waves/yellow-wave.svg" class="w-100 mb-5" style="margin-top: -5px;">

	
	
	<section>
		<div>
			
			<div class="container">
				  <div class="row">
						<div class="col horizontal-center">
						<h2>Companies We've Partnered with</br></h2>
					</div>
				</div>
				
				<div class="row">
				<?php
					include "classes/getCompanies.php";
				?>
				</div>
			</div>	
				
			</div>
			
			
		</div>
	</section>
			
			
	
					

	

	<section>
		<div class="container">
			<h2 class="m-2 horizontal-center">Our Past Partners</h2><br>
			<div class=" past-partners-slider m-2" >
				<div class="slider m-auto">

				<?php
					include "classes/getPartners.php";
				?>

				</div>
			</div>

			
		</div>
	</section>
	
				
	<section>
		<div style="background: #E68976; margin-top: 3%">
			<div class="container py-5">
  				<div class="row">
  					<div class="col">
						<br><br><br>
   						<h2 style="text-align: center; color: white; font-family:helvetica">Want to become a partner?</h2>
   						<br>
   						
						<h5 style="text-align: center; color: white; line-height: 160%; font-family:nunito">Get in touch and hear more about how  you can help us build a future for <a style="text-decoration: none"data-toggle="tooltip" data-placement="top" title="Any individual identifying as female or non-binary">
            			 women* </a> in tech<br><br></h5>

   					</div>
				</div>
				<div class="row">
					<div class="col m-auto" style="text-align: center;">
						<button class="landingbutton" style="padding:2% 6%">
							<a style="color: white; font-family: Rubik; text-decoration: none" class="m-auto p-2" href="mailto:wits.uwo@gmail.com">Contact Us</a>
						</button>
					</div>
				</div>	
				<br><br><br>
			</div>
		</div>
	</section>
	
	<!-- footer -->
	<?php include "templates/include/footer.php" ?>

	<script>
		$('.slider').slick({
			dots: true,
			arrows:false,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [{
				breakpoint: 992,
				settings: {
					arrows: false,
					slidesToShow: 2,
				}
			},                           
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					arrows: false,
				}
			}]
		});
	</script>
	
	<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
							
			
				
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>	
	</body>
</html>
