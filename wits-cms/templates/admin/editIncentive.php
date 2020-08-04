<?php include "templates/include/header.php" ?>

      <script>

      // Prevents file upload hangs in Mac Safari
      // Inspired by http://airbladesoftware.com/notes/note-to-self-prevent-uploads-hanging-in-safari

      function closeKeepAlive() {
        if ( /AppleWebKit|MSIE/.test( navigator.userAgent) ) {
          var xhr = new XMLHttpRequest();
          xhr.open( "GET", "/ping/close", false );
          xhr.send();
        }
      }

      </script>


        <div class="container" id="header" style="padding-top:5%; padding-bottom:3%">
        <h1><b><?php echo htmlspecialchars( $results['pageTitle'] )?></b></h1>
        <h4>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></h4>
        </div>

    </section>

    <div class="row">

        <div class="col-2" style="background-color: #0A2338;">
          <div class="sidebar">
            <div class="container" style="padding:30px; line-height: 30px;">
                <a href="admin.php"><b>BACK TO DASHBOARD</b></a><br>
                <a href="admin.php#events"><b>All Events</b></a><br>
                <a href="admin.php#incentives"><b>Member Perks</b></a><br>
                <a href="admin.php#community"><b>Community Members</b></a><br>
                <a href="admin.php#wits"><b>WITS Members</b></a><br>
                <a href="admin.php#testimonials"><b>Testimonials</b></a><br>
                <a href="admin.php#sponsors"><b>Sponsors</b></a><br>
                <a href="admin.php#texts"><b>Other Website Texts</b></a><br>
                <a href="admin.php#podcasts"><b>Podcasts</b></a><br>
                <a href="admin.php#blogs"><b>Blog Posts</b></a><br>
                <a href="admin.php#alumni"><b>WITS Alumni</b></a><br>
                <a href="admin.php#mentors"><b>Mentors</b></a><br>
            </div>
          </div>
        </div>

        <div class="col-10">
          <div style="padding:50px;">

            <form action="admin.php?action=<?php echo $results['formAction']?>" method="post"  enctype="multipart/form-data" onsubmit="closeKeepAlive()">
              <input type="hidden" name="incentiveId" value="<?php echo $results['incentive']->id ?>"/>

              <?php if ( isset( $results['errorMessage'] ) ) { ?>
                      <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
              <?php } ?>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="title">Incentive Title</label>
                </div>
                <div class="col-7">
                <input type="text" name="title" id="title" placeholder="Name of the incentive" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['incentive']->title )?>" />
                </div>
              </div>
                <br>
              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="summary">Description</label>
                </div>
                <div class="col-7">
                  <textarea name="summary" id="summary" placeholder="Brief description of the incentive" required maxlength="500" style="width:100%; height:5em"><?php echo htmlspecialchars( $results['incentive']->summary )?></textarea>
                </div>
              </div>
                <br>
              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="author">Published by</label>
                </div>
                <div class="col-7">
                  <textarea name="author" id="author" placeholder="Your name" required maxlength="255" style="width:100%"><?php echo htmlspecialchars( $results['incentive']->author )?></textarea>
                </div>
              </div>
              <br>

              <?php if ( $results['incentive'] && $imagePath = $results['incentive']->getImagePath() ) { ?>

                <div class="row mx-auto">
                  <div class="col-2 my-auto">
                    <label>Current Image</label>
                  </div>
                  <div class="col-2">
                    <img id="incentiveImage" src="<?php echo $imagePath ?>" alt="Incentive Image" style="width:150px;"/>
                  </div>
                  <div class="col-2 my-auto">
                    <input type="checkbox" name="deleteImage" id="deleteImage" value="yes"/ > <label for="deleteImage">Delete</label>
                  </div>
                </div>
                
              <?php } ?>
              <br>

              <div class="row mx-auto">
                  <div class="col-2 my-auto">
                    <label for="image">New Image</label>
                  </div>
                  <div class="col-2">
                    <input type="file" name="image" id="image" placeholder="Choose an image to upload" maxlength="255" />
                  </div>
              </div>

              <div class="buttons" style="margin-top:50px;">
                <input type="submit" name="saveChanges" value="Save Changes" />&nbsp&nbsp&nbsp&nbsp
                <input type="submit" formnovalidate name="cancel" value="Cancel" />
              </div>
            </form>

            <br>
            <br>

            <?php if ( $results['incentive']->id ) { ?>
                  <p><a href="admin.php?action=deleteIncentive&amp;incentiveId=<?php echo $results['incentive']->id ?>" onclick="return confirm('Delete This Incentive?')"><h3><b>Delete This Incentive</b></h3></a></p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
