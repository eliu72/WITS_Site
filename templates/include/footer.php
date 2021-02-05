<!-- footer -->
<footer>
	<div class="marginTop5Footer" style="margin-bottom: 5%">
		<!-- footer key text -->
		<div class="container">
			  <div class="row">
				  <div class="col-lg-10 col-sm-12 col-12">
					<h6>
						Women in Technology Society
					</h6>
					<p>
						1151 Richmond St, London, ON N6A 3K7<br>
						<a href="mailto:wits.uwo@gmail.com" class="link">wits.uwo@gmail.com</a><br>
						Made with &#10084;&#65039;&nbspin London, ON
					</p>
					<br>
				  </div>
				  <!-- footer social media for desktop view -->
				  <div class="col-lg-2 col-sm-12 col-12">
					  <div class="social-icon"><a href="http://www.instagram.com/wits.uwo/" target="_blank"><img src="images/instagram.png" alt="instagram" style="width: 100%"></a></div>
					  <div class="social-icon"><a href="https://www.linkedin.com/company/uwowits/" target="_blank"><img src="images/linkedin.png" alt="twitter" style="width: 100%"></a></div>
					<div class="social-icon"><a href="http://www.facebook.com/wits.uwo/" target="_blank"><img src="images/facebooksmall.png" alt="facebook" style="width: 100%"></a></div>  					
				  </div>
			  </div>
		  </div>
	</div>
</footer>


	
	<!-- js to make carousel interactive -->
				<script>
					var idx=1;
					var len = 7; 	// there's 7 test elements at the moment
					display();

					function pre(){ // display previous card
    					idx--;
						if (idx === 0){
							idx = 1;
						}
						display();
					}

					function next(){ // display next card
    					idx++;
						if (idx === 7){
							idx = 6;
						}
						display();
					}

					function display(){ // card display function
						var div ;
    					for (var i = 1; i<= len; i++){
							div = document.getElementById('div' + i);
							if (i === idx || i=== (idx + 1)){ // display two cards at a time
								div.style.display = "";
							} else {
								div.style.display = "none";
							}
    					}
					}

				</script>	

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
									slidesToShow: 3,
								}
							},                           
							{
								breakpoint: 568,
								settings: {
									slidesToShow: 1,
									arrows: false,
								}
							}]
						});
				</script>

				<script>
					$('.slider-community').slick({
							dots: true,
							arrows:false,
							slidesToShow: 2,
							slidesToScroll: 1,
							responsive: [                           
							{
								breakpoint: 568,
								settings: {
									slidesToShow: 1,
									arrows: false,
								}
							}]
						});
				</script>
	
	<div class="modal fade" id="successModal" role="dialog">
		<div class="modal-dialog modal-dialog-centered modalroundedcorners" role="document">
			<div class="modal-content py-4 px-5 rounded-lg">
				<button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-header">
					<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" width="500px">
						<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
						<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
					</svg>
				</div>
				<div class="modal-body text-center">
						<p style="font-weight: normal; font-size:18px">
								<strong style="font-size:22px">Welcome to the WITS community! </strong>
								<br>
								A receipt will be emailed to you shortly.
						</p>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(window).on('load',function(){
			var url_string = window.location.href;
			var url = new URL(url_string);
			var c = url.searchParams.get("paymentSuccess");
			if (c == 1) {
				$('#successModal').modal('show');
			}
		});
	</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
