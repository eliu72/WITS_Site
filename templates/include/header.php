<!DOCTYPE html>
<?php
	include "connecttodb.php";
?>
<html>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/favicon.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	
	<!--Slick slider-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
		
    
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

	<header>
		<nav class="navbar navbar-light navbar-expand-md fixed-top">
			<div class = "container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a href="homepage.php" class="navbar-brand vertical-center" style="padding: 5px auto 2px auto;"><img src="images/wits.png" alt="she/hacks"></a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<i class="navbar-toggler-icon"></i>
				</button>  
				
				<!-- collapse navbar -->
				<div class="navbar-collapse collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto w-100 clearfix" >
						<li class="nav-item vertical-center"><a class="nav-link" href="initiatives.php">INITIATIVES</a></li>
						<li class="nav-item vertical-center"><a class="nav-link" href="partners.php">PARTNER</a></li>
						<li class="nav-item vertical-center"><a class="nav-link" href="about.php">ABOUT US</a></li>
						<li class="nav-item vertical-center"><a class="nav-link" target="_blank" href="https://witsuwo.wixsite.com/merch">STORE</a></li>
						<li class="nav-item vertical-center"><a class="nav-link" href="membership.php"><button class="join-button">JOIN US</button></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>