<?php

    $query = "SELECT * FROM wits.blogs ORDER BY id ASC";
    $result = mysqli_query($connection,$query);
    $index = 0;

  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    echo "<div class='col'>";
    echo "<a href='" . $row["hyperlink"] . "' target='_blank' ><img src='images/" . $row["imageExtension"] . "'alt='blog pic'></a>";
    echo "<h5 style='text-align: center; color:#0A2338'>" . $row["title"] . "</h5>";
    echo "</div>";
  }

  mysqli_free_result($result);

?>