<?php

    $query = "SELECT * FROM wits.witsMembers ORDER BY id ASC";
    $result = mysqli_query($connection,$query);

  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    echo "<div class='col-lg-2 col-md-4 col-sm-6 col-6 p-4'>";
	  echo "<a href='" . $row["url"] . "'target='_blank'><img src='images/wits-members/" . $row["imageExtension"] . "' alt='WITS Member' class='headshot'></a>";
	  echo "<h5 class='horizontal-center headshot-name mt-4'style=' color: #0A2338;'>" . $row["person"] . "</h5>";
	  echo "<h4 style='text-align: center; font-size: 1rem; font-family: nunito'> " . $row["title"] . " </h4> </div>";
  }

  mysqli_free_result($result);

?>