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
              <input type="hidden" name="sponsorId" value="<?php echo $results['sponsor']->id ?>"/> 
              <?php if ( isset( $results['errorMessage'] ) ) { ?>
                      <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
              <?php } ?>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="title">Sponsor Name</label>
                </div>
                <div class="col-7">
                <input type="text" name="title" id="title" placeholder="Name of the Sponsor" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['sponsor']->title )?>" />
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="tier">Sponsor Tier</label>
                </div>
                <div class="col-7">
                  <input type="radio" id="tier" name="tier" value="platinum">
                  <label for="platinum">Platinum</label><br>
                  <input type="radio" id="tier" name="tier" value="gold">
                  <label for="gold">Gold</label><br>
                  <input type="radio" id="tier" name="tier" value="silver">
                  <label for="silver">Silver</label><br>
                  <input type="radio" id="tier" name="tier" value="bronze">
                  <label for="bronze">Bronze</label><br><br>
                  <label for="tier">Previously Selected Tier: <?php echo htmlspecialchars( $results['sponsor']->tier )?></label>

                </div>               
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                <label for="title">URL</label>
                </div>
                <div class="col-7">
                <textarea name="url" id="url" placeholder="url" required maxlength="500" style="width:100%; height: 5em;"><?php echo htmlspecialchars( $results['sponsor']->url )?></textarea>
                </div>
              </div>
                <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="author">Published by</label>
                </div>
                <div class="col-7">
                <textarea name="author" id="author" placeholder="your name"" required maxlength="255" style="width: 100%;"><?php echo htmlspecialchars( $results['sponsor']->author )?></textarea>
                </div>
              </div>
              <br>

              <?php if ( $results['sponsor'] && $imagePath = $results['sponsor']->getImagePath() ) { ?>

                <div class="row mx-auto">
                  <div class="col-2 my-auto">
                    <label>Current Image</label>
                  </div>
                  <div class="col-2">
                  <img id="sponsorImage" src="<?php echo $imagePath ?>" alt="Sponsor Image" style="width:150px;"/>
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

            <?php if ( $results['sponsor']->id ) { ?>
                  <p><a href="admin.php?action=deleteSponsor&amp;sponsorId=<?php echo $results['sponsor']->id ?>" onclick="return confirm('Delete This Sponsor?')"><h3><b>Delete This Sponsor</b></h3></a></p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    