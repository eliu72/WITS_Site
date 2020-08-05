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
              <input type="hidden" name="eventId" value="<?php echo $results['event']->id ?>"/>

              <?php if ( isset( $results['errorMessage'] ) ) { ?>
                      <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
              <?php } ?>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="title">Event Name</label>
                </div>
                <div class="col-7">
                <input type="text" name="title" id="title" placeholder="Name of the event" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['event']->title )?>" />
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="eventType">Event Type</label>
                </div>
                <div class="col-7">
                  <input type="radio" id="eventType" name="eventType" value="hwh">
                  <label for="hwh">Hack With Heart</label><br>
                  <input type="radio" id="eventType" name="eventType" value="cookies-code">
                  <label for="cookies-code">Cookies & Code</label><br>
                  <input type="radio" id="eventType" name="eventType" value="recruiting">
                  <label for="recruiting">Recruiting Series</label><br>
                  <input type="radio" id="eventType" name="eventType" value="ada">
                  <label for="ada">Ada Mentorship</label><br>
                  <input type="radio" id="eventType" name="eventType" value="other">
                  <label for="other">Other</label><br>
                  <label for="eventType">Previously Selected Event Type: <?php echo htmlspecialchars( $results['event']->eventType )?></label>

                </div>               
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                <label for="summary">Event Description</label>
                </div>
                <div class="col-7">
                <textarea name="summary" id="summary" placeholder="Brief description of the event" required maxlength="500" style="width:100%; height: 5em;"><?php echo htmlspecialchars( $results['event']->summary )?></textarea>
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                <label for="eventDate">Event Date</label>
                </div>
                <div class="col-7">
                <input type="date" name="eventDate" id="eventDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo htmlspecialchars ( $results['event']->eventDate ? date( "Y-m-d", $results['event']->eventDate ) : "") ?>" />
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                <label for="eventTime">Event Time</label>
                </div>
                <div class="col-7">
                <input type="time" name="eventTime" id="eventTime" placeholder="hh:mm" required maxlength="10" value="<?php echo htmlspecialchars( $results['event']->eventTime ? date( "H:i", $results['event']->eventTime ) : "") ?>" />
                <?php echo htmlspecialchars( $results['event']->eventTime )?>
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                <label for="eventDateTime">Event Date Time</label>
                </div>
                <div class="col-7">
                <input type="datetime-local" name="eventDateTime" id="eventDateTime" required maxlength="10" value="<?php echo htmlspecialchars( $results['event']->eventDateTime ? date( "Y-m-d H:i:s", $results['event']->eventDateTime ) : "") ?>" />
                <?php echo htmlspecialchars( $results['event']->eventDateTime )?>
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                <label for="eventLocation">Event Location</label>
                </div>
                <div class="col-7">
                <textarea name="eventLocation" id="eventLocation" placeholder="Event Location" required maxlength="255" style="width:100%;"><?php echo htmlspecialchars( $results['event']->eventLocation )?></textarea>
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                <label for="eventLink">Facebook/Webpage Link</label>
                </div>
                <div class="col-7">
                <textarea name="eventLink" id="eventLink" placeholder="URL" required maxlength="255" style="width:100%;"><?php echo htmlspecialchars( $results['event']->eventLink )?></textarea>
                </div>
              </div>
              <br>

              <div class="row mx-auto">
                <div class="col-2 my-auto">
                  <label for="author">Published by</label>
                </div>
                <div class="col-7">
                  <textarea name="author" id="author" placeholder="Your name" required maxlength="255" style="width:100%"><?php echo htmlspecialchars( $results['event']->author )?></textarea>
                </div>
              </div>
              <br>

              <?php if ( $results['event'] && $imagePath = $results['event']->getImagePath() ) { ?>

                <div class="row mx-auto">
                  <div class="col-2 my-auto">
                    <label>Current Image</label>
                  </div>
                  <div class="col-2">
                  <img id="eventImage" src="<?php echo $imagePath ?>" alt="Event Image" style="width:150px;" />
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

            <?php if ( $results['event']->id ) { ?>
                  <p><a href="admin.php?action=deleteEvent&amp;eventId=<?php echo $results['event']->id ?>" onclick="return confirm('Delete This Event?')"><h3><b>Delete This Event</b></h3></a></p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>