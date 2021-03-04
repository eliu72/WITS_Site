<?php

    $query = "SELECT * FROM wits.companies ORDER BY id ASC";
    $result = mysqli_query($connection,$query);

  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    echo "<div class='col-lg-3 col-md-4 col-sm-4 col-4 m-auto p-4'>";
    echo "<a style='padding: 10px 2px;' href='" . $row["url"] . "' target='_blank'><img id='hoverimg' src='images/" . $row["imageExtension"] . "' alt='admin' width='100%'></a>";
    echo "</div>";
  }

  mysqli_free_result($result);

?>