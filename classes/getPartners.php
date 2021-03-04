<?php

    $query = "SELECT * FROM wits.partners ORDER BY id ASC";
    $result = mysqli_query($connection,$query);

  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

	echo "<a class='partner-card m-3' href='" . $row["url"] . "' target='_blank' style='text-decoration: none'>";
	echo "<div class='card-content'>";
	echo "<img src='images/past-partners/" . $row["imageExtension"] . "' class='card-img'>";
	echo "<h5 style='	color: #0A2338; font-weight:bold'><br>" . $row["person"] . "</h5>";
	echo "<h6 style='font-family: nunito; font-weight:bold'>" . $row["company"] . "</h6>";
	echo "<h6 style='font-family: nunito; font-weight:normal'>" . $row["title"] . "</h6>";
	echo "</div></a>";
  }

  mysqli_free_result($result);

?>