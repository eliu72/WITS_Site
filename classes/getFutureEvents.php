<?php
    $query = "SELECT * FROM wits.witsEvents WHERE eventDate >= CURDATE() ORDER BY eventDate ASC";
    $result = mysqli_query($connection,$query);

  if (!$result) {
    die("databases query failed.");
  }

  else if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<div class='card' style='margin-top: 2%'>";
      echo "<div class='card-horizontal' href='events.php'  target='_blank'>";
      echo "<div class='card-body py-5 px-5'>";
      echo "<h4>" . $row["title"] . "</h4>";
      echo "<div class='yellow-rectangle'></div>";
      echo "<h6>" . $row["eventDate"] . "</h6>";
      echo "<p>" . $row["summary"] . "</p>";
      echo "<a href='events.php'><button class='round-orange-button'>Learn more</button></a>";
      echo "</div>";
      echo "<img class='d-none d-lg-block ' src='images/" . $row["imageExtension"] . "' alt='Card image cap'>";
      echo "</div></div>";
    }
  }

else {
  echo "<h4>There are no upcoming events at this time. Check back soon :)</h4>";
}
   mysqli_free_result($result);

?>