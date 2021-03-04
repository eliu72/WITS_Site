<?php
    
    $query = "SELECT * FROM wits.witsEvents WHERE eventDate < CURDATE() ORDER BY eventDate DESC;";
    $result = mysqli_query($connection,$query);

  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    echo "<div class='col-lg-3 col-sm-6 col-6'style='margin-top: 2%'>";
    echo "    <a class='event-card card' target='_blank' href='" . $row["eventLink"] . "'>";
    echo "<img class='card-img-top' src='images/events/" . $row["imageExtension"] . "' alt='Card image cap'>";
    echo "<div class='card-body'>";
    echo "<h4>" . $row["title"] . "</h4>";
    echo "<p>" . $row["summary"] . "</p>";
		echo "</div></a></div>";
}
   mysqli_free_result($result);

?>