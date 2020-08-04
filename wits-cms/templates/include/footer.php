	<footer style="padding-top:100px;">

		<h6>Women In Technology Society <br> 1151 Richmond St, London, ON N6A 3K7</h6>
		<h6 style="font-weight: bold">wits.uwo@gmail.com <br>Made with &#10084;&#65039; in London, ON</h6>
		<a href="admin.php">Site Admin</a>

	</footer>

	<script>
		window.onscroll = function () { myFunction() };

		var navbar = document.getElementById("topnav");
		var sticky = navbar.offsetTop;

		function myFunction() {
			if (window.pageYOffset >= sticky) {
				navbar.classList.add("sticky")
			} else {
				navbar.classList.remove("sticky");
			}
		}
	</script>
</body>

</html>