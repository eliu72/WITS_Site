<?php
    $type = $_SESSION['name'];
    
    $query = "SELECT * FROM wits.witsEvents WHERE eventType = '$type' ORDER BY id ASC";
    $result = mysqli_query($connection,$query);

  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<div class='event-card m-3' style='height: 470px;'>";
    echo "<a href='" . $row["eventLink"] . "' target='_blank' >";
    echo "<img src='images/events/" . $row["imageExtension"] . "' class='card-img'>";
    echo "<div class='card-content'>";
    echo "<h5 style=' color: #0A2338;'>";
    echo $row["title"] . "</h5>";
    echo "<p style=' color: #0A2338;'>";
    echo $row["summary"] . "</p>";
    echo "<p style=' color: #0A2338; font-weight: bold'>";
    echo date('F j, Y', strtotime($row["eventDate"]));
    echo "</p></div></a></div>";
}
   mysqli_free_result($result);

?>