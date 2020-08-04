<?php include "templates/include/header.php" ?>
      <?php if ( $imagePath = $results['incentive']->getImagePath() ) { ?>
        <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="Incentive Image" />
      <?php } ?>
      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['incentive']->title )?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['incentive']->summary )?></div>
      <div style="width: 75%;">Published by <?php echo $results['incentive']->author?></div>
      <p class="pubDate">Published on <?php echo date('j F Y', $results['incentive']->publicationDate)?></p>

      <p><a href="./">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>

