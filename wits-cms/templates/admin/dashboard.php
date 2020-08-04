<?php include "templates/include/header.php" ?>

        <div class="container" id="header" style="padding-top:5%; padding-bottom:3%">
        <h1><b>Dashboard</b></h1>
        <h4>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></h4>
        </div>

    </section>

    <div class="row">
      <div class="col-2" style="background-color: #0A2338;">
        <div class="sidebar">
          <div class="container" style="padding:30px; line-height: 30px;">
              <a href="#events"><b>All Events</b></a><br>
              <a href="#incentives"><b>Member Perks</b></a><br>
              <a href="#community"><b>Community Members</b></a><br>
              <a href="#wits"><b>WITS Members</b></a><br>
              <a href="#testimonials"><b>Testimonials</b></a><br>
              <a href="#sponsors"><b>Sponsors</b></a><br>
              <a href="#texts"><b>Other Website Texts</b></a><br>
              <a href="#podcasts"><b>Podcasts</b></a><br>
              <a href="#blogs"><b>Blog Posts</b></a><br>
              <a href="#alumni"><b>WITS Alumni</b></a><br>
              <a href="#mentors"><b>Mentors</b></a><br>
          </div>
        </div>
      </div>

        

        <div class="col-10">
          <div style="padding:50px;">
            <section class="block-container" id="events">
                <h2>All Events</h2>
                <h3>Upcoming Events</h3>
                <p>All upcoming events are displayed on the 'Initiatives' page. The top 5 upcoming events are displayed on a carousel on the main page.
                    Click on an event to edit details.
                </p>

                <?php if ( isset( $results_events['errorMessage'] ) ) { ?>
                        <div class="errorMessage"><?php echo $results_events['errorMessage'] ?></div>
                <?php } ?>


                <?php if ( isset( $results_events['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_events['statusMessage'] ?></div>
                <?php } ?>
                
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Event</th>
                        <th scope="col">Event type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Location</th>
                        <th scope="col">URL</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light">
                        <?php foreach ( $results_events['witsEvents'] as $event ) { ?>
                            <?php $curdate = date('Y/m/d') ?>
                            <!-- display only events after current date -->
                            <?php if($curdate < date('Y/m/d', $event->eventDate)) { ?>
                            <tr onclick="location='admin.php?action=editEvent&amp;eventId=<?php echo $event->id?>'">
                                <td>
                                <?php if ( $imagePath = $event->getImagePath() ) { ?>
                                    <img id="eventImageFullsize" src="<?php echo $imagePath?>" alt="Event Image" style="width:50px;" />
                                <?php } ?>
                                </td>
                                <td>
                                <?php echo $event->title?>
                                </td>
                                <td>
                                <?php echo $event->eventType?>
                                </td>
                                <td>
                                <?php echo $event->summary?>
                                </td>
                                <td>
                                <?php echo date('j M Y', $event->eventDate)?>
                                </td>
                                <td>
                                <?php echo date('H:i', $event->eventTime)?>
                                </td>
                                <td>
                                <?php echo $event->eventLocation?>
                                </td>
                                <td>
                                <?php echo $event->eventLink?>
                                </td>
                                <td>
                                <?php echo $event->author?>
                                </td>
                            </tr>
                            <?php } ?>
        
                        <?php } ?>
                    </tbody>
                </table>
                </div>

                <br>
                <br>

                <h3>Past Events</h3>

                <?php if ( isset( $results_events['errorMessage'] ) ) { ?>
                        <div class="errorMessage"><?php echo $results_events['errorMessage'] ?></div>
                <?php } ?>


                <?php if ( isset( $results_events['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_events['statusMessage'] ?></div>
                <?php } ?>
                
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Event</th>
                        <th scope="col">Event type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Location</th>
                        <th scope="col">URL</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_events['witsEvents'] as $event ) { ?>
                            <?php $curdate = date('Y/m/d') ?>
                            <!-- display only events before current date -->
                            <?php if($curdate > date('Y/m/d', $event->eventDate)) { ?>
                            <tr onclick="location='admin.php?action=editEvent&amp;eventId=<?php echo $event->id?>'">
                                <td>
                                <?php if ( $imagePath = $event->getImagePath() ) { ?>
                                    <img id="eventImageFullsize" src="<?php echo $imagePath?>" alt="Event Image" style="width:50px;" />
                                <?php } ?>
                                </td>
                                <td>
                                <?php echo $event->title?>
                                </td>
                                <td>
                                <?php echo $event->eventType?>
                                </td>
                                <td>
                                <?php echo $event->summary?>
                                </td>
                                <td>
                                <?php echo date('j M Y', $event->eventDate)?>
                                </td>
                                <td>
                                <?php echo date('H:i:s', $event->eventTime)?>
                                </td>
                                <td>
                                <?php echo $event->eventLocation?>
                                </td>
                                <td>
                                <?php echo $event->eventLink?>
                                </td>
                                <td>
                                <?php echo $event->author?>
                                </td>
                            </tr>
                            <?php } ?>
        
                        <?php } ?>
                    </tbody>
                </table>
                </div>

                <p><?php echo $results_events['totalRows']?> event<?php echo ( $results_events['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

                <p><b><a href="admin.php?action=newEvent" class="add-button">Add New Event</a></b></p>
            </section>

            <section class="block-container" id="incentives">
                <h2>Membership Perks</h2>
                <?php if ( isset( $results_incentives['errorMessage'] ) ) { ?>
                        <div class="errorMessage"><?php echo $results_incentives['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_incentives['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_incentives['statusMessage'] ?></div>
                <?php } ?>
                
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Member Perk</th>
                        <th scope="col">Description</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_incentives['incentives'] as $incentive ) { ?>
                            <tr onclick="location='admin.php?action=editIncentive&amp;incentiveId=<?php echo $incentive->id?>'">
                                <td>
                                    <?php if ( $imagePath = $incentive->getImagePath() ) { ?>
                                    <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="Incentive Image" style="width:50px;" />
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo $incentive->title?>
                                </td>
                                <td>
                                    <?php echo $incentive->summary?>
                                </td>
                                <td>
                                    <?php echo $incentive->author?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            
                <p><?php echo $results_incentives['totalRows']?> incentive<?php echo ( $results_incentives['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
        
                <p><b><a href="admin.php?action=newIncentive" class="add-button">Add New Member Perk</a></b></p>
            </section>


            <section class="block-container" id="community">
                <h2>Community Members</h2>

                <?php if ( isset( $results_communityMembers['errorMessage'] ) ) { ?>
                    <div class="errorMessage"><?php echo $results_communityMembers['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_communityMembers['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_communityMembers['statusMessage'] ?></div>
                <?php } ?>

                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Description</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_communityMembers['communityMembers'] as $communityMember ) { ?>
                            <tr onclick="location='admin.php?action=editCommunityMember&amp;communityMemberId=<?php echo $communityMember->id?>'">
                                <td>
                                    <?php if ( $imagePath = $communityMember->getImagePath() ) { ?>
                                    <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="Community Member Image" style="width:50px;"/>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo $communityMember->person?>
                                </td>
                                <td>
                                    <?php echo $communityMember->title?>
                                </td>
                                <td>
                                    <?php echo $communityMember->summary?>
                                </td>
                                <td>
                                    <?php echo $communityMember->author?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_communityMembers['totalRows']?> community member<?php echo ( $results_communityMembers['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newCommunityMember" class="add-button">New Community Member</a></b></p>
            </section>

            <section class="block-container" id="wits">
                <h2>WITS Members</h2>

                <?php if ( isset( $results_witsMembers['errorMessage'] ) ) { ?>
                        <div class="errorMessage"><?php echo $results_witsMembers['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_witsMembers['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_witsMembers['statusMessage'] ?></div>
                <?php } ?>
        
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Description</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_witsMembers['witsMembers'] as $witsMember ) { ?>
                            <tr onclick="location='admin.php?action=editWitsMember&amp;witsMemberId=<?php echo $witsMember->id?>'">
                              <td>
                                <?php if ( $imagePath = $witsMember->getImagePath() ) { ?>
                                  <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="WITS Member Image" style="width:50px;"/>
                                <?php } ?>
                              </td>
                              <td>
                                <?php echo $witsMember->person?>
                              </td>
                              <td>
                                <?php echo $witsMember->title?>
                              </td>
                              <td>
                                <?php echo $witsMember->summary?>
                              </td>
                              <td>
                                <?php echo $witsMember->author?>
                              </td>
                            </tr>
                          <?php } ?>
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_witsMembers['totalRows']?> wits member<?php echo ( $results_witsMembers['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newWitsMember" class="add-button">New WITS Member</a></b></p>
            </section>
            
            <section class="block-container" id="testimonials">
                <h2>Testimonials</h2>

                <?php if ( isset( $results_testimonials['errorMessage'] ) ) { ?>
                        <div class="errorMessage"><?php echo $results_testimonials['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_testimonials['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_testimonials['statusMessage'] ?></div>
                <?php } ?>
        
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Testimonial</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_testimonials['testimonials'] as $testimonial ) { ?>
                            <tr onclick="location='admin.php?action=editTestimonial&amp;testimonialId=<?php echo $testimonial->id?>'">
                              <td>
                                <?php if ( $imagePath = $testimonial->getImagePath() ) { ?>
                                  <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="Testimonial Image" style="width:50px;"/>
                                <?php } ?>
                              </td>
                              <td>
                                <?php echo $testimonial->person?>
                              </td>
                              <td>
                                <?php echo $testimonial->title?>
                              </td>
                              <td>
                                <?php echo $testimonial->summary?>
                              </td>
                              <td>
                                <?php echo $testimonial->author?>
                              </td>
                            </tr>
                          <?php } ?>                    
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_testimonials['totalRows']?> testimonial<?php echo ( $results_testimonials['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newTestimonial" class="add-button">Add Testimonial</a></b></p>
            </section>

            <section class="block-container" id="sponsors">
                <h2>Sponsors</h2>

                <?php if ( isset( $results_testimonials['errorMessage'] ) ) { ?>
                        <div class="errorMessage"><?php echo $results_testimonials['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_testimonials['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_testimonials['statusMessage'] ?></div>
                <?php } ?>
        
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Tier</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_sponsors['sponsors'] as $sponsor ) { ?>
                            <tr onclick="location='admin.php?action=editSponsor&amp;sponsorId=<?php echo $sponsor->id?>'">
                              <td>
                                <?php if ( $imagePath = $sponsor->getImagePath() ) { ?>
                                  <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="Sponsor Image" style="width:50px;" />
                                <?php } ?>
                              </td>
                              <td>
                                <?php echo $sponsor->title?>
                              </td>
                              <td>
                                <?php echo $sponsor->tier?>
                              </td>
                              <td>
                                <?php echo $sponsor->author?>
                              </td>
                            </tr>
                          <?php } ?>                  
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_sponsors['totalRows']?> sponsor<?php echo ( $results_sponsors['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newSponsor" class="add-button">Add Sponsor</a></b></p>
            </section>

            <section class="block-container" id="texts">
                <h2>Other Website Texts</h2>
                <p>Text is edit only.</p>

                <?php if ( isset( $results_texts['errorMessage'] ) ) { ?>
                    <div class="errorMessage"><?php echo $results_texts['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_texts['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_texts['statusMessage'] ?></div>
                <?php } ?>
      
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Webpage Title</th>
                        <th scope="col">Text</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_texts['texts'] as $text ) { ?>
                            <tr onclick="location='admin.php?action=editText&amp;textId=<?php echo $text->id?>'"> 
                              <td>
                                <?php echo $text->title?>
                              </td>
                              <td>
                                <?php echo $text->summary?>
                              </td>
                              <td>
                                <?php echo $text->author?>
                              </td>
                            </tr>
                          <?php } ?>                 
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_texts['totalRows']?> text<?php echo ( $results_texts['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newText" class="add-button">Add New Text</a></b></p>

            </section>

            <section class="block-container" id="podcasts">
                <h2>Podcasts</h2>

                <?php if ( isset( $results_podcasts['errorMessage'] ) ) { ?>
                    <div class="errorMessage"><?php echo $results_podcasts['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_podcasts['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_podcasts['statusMessage'] ?></div>
                <?php } ?>
        
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Podcast</th>
                        <th scope="col">Summary</th>
                        <th scope="col">URL</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_podcasts['podcasts'] as $podcast ) { ?>
                            <tr onclick="location='admin.php?action=editPodcast&amp;podcastId=<?php echo $podcast->id?>'">
                              <td>
                                <?php if ( $imagePath = $podcast->getImagePath() ) { ?>
                                  <img id="podcastImageFullsize" src="<?php echo $imagePath?>" alt="Podcast Image" style="width:50px;" />
                                <?php } ?>
                              </td>
                              <td>
                                <?php echo $podcast->title?>
                              </td>
                              <td>
                                <?php echo $podcast->summary?>
                              </td>
                              <td>
                                <?php echo $podcast->hyperlink?>
                              </td>
                              <td>
                                <?php echo $podcast->author?>
                              </td>
                            </tr>
                          <?php } ?>   
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_podcasts['totalRows']?> podcast<?php echo ( $results_podcasts['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newPodcast" class="add-button">Add Podcast</a></b></p>
            </section>

            <section class="block-container" id="blogs">
                <h2>Blog Posts</h2>

                <?php if ( isset( $results_blogs['errorMessage'] ) ) { ?>
                    <div class="errorMessage"><?php echo $results_blogs['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_blogs['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_blogs['statusMessage'] ?></div>
                <?php } ?>
        
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Blog</th>
                        <th scope="col">Summary</th>
                        <th scope="col">URL</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                        <?php foreach ( $results_blogs['blogs'] as $blog ) { ?>
                            <tr onclick="location='admin.php?action=editBlog&amp;blogId=<?php echo $blog->id?>'">
                              <td>
                                <?php if ( $imagePath = $blog->getImagePath() ) { ?>
                                  <img id="blogImageFullsize" src="<?php echo $imagePath?>" alt="Blog Image" style="width:50px;" />
                                <?php } ?>
                              </td>
                              <td>
                                <?php echo $blog->title?>
                              </td>
                              <td>
                                <?php echo $blog->summary?>
                              </td>
                              <td>
                                <?php echo $blog->hyperlink?>
                              </td>
                              <td>
                                <?php echo $blog->author?>
                              </td>
                            </tr>
                          <?php } ?>   
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_blogs['totalRows']?> blog<?php echo ( $results_blogs['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newBlog" class="add-button">Add Blog Post</a></b></p>
            </section>

            <section class="block-container" id="alumni">
                <h2>WITS Alumni</h2>

                <?php if ( isset( $results_alumni['errorMessage'] ) ) { ?>
                    <div class="errorMessage"><?php echo $results_alumni['errorMessage'] ?></div>
                <?php } ?>
        
        
                <?php if ( isset( $results_alumni['statusMessage'] ) ) { ?>
                        <div class="statusMessage"><?php echo $results_alumni['statusMessage'] ?></div>
                <?php } ?>
        
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Past WITS Position</th>
                        <th scope="col">Description</th>
                        <th scope="col">Published By</th> 
                      </tr>
                    </thead>
                    <tbody class="tbody-light table-hover">
                      <?php foreach ( $results_alumni['alumni'] as $alumnus ) { ?>
                        <tr onclick="location='admin.php?action=editAlumnus&amp;alumnusId=<?php echo $alumnus->id?>'">
                          <td>
                            <?php if ( $imagePath = $alumnus->getImagePath() ) { ?>
                              <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="Alumni Image" style="width:50px;" />
                            <?php } ?>
                          </td>
                          <td>
                            <?php echo $alumnus->person?>
                          </td>
                          <td>
                            <?php echo $alumnus->title?>
                          </td>
                          <td>
                            <?php echo $alumnus->summary?>
                          </td>
                          <td>
                            <?php echo $alumnus->author?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
                </div>
      
                <p><?php echo $results_alumni['totalRows']?> alumni<?php echo ( $results_alumni['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
                <p><b><a href="admin.php?action=newAlumnus" class="add-button">Add WITS Alumni</a></b></p>
            </section>

            <section class="block-container" id="mentors">
              <h2>Mentors</h2>

              <?php if ( isset( $results_mentors['errorMessage'] ) ) { ?>
                      <div class="errorMessage"><?php echo $results_mentors['errorMessage'] ?></div>
              <?php } ?>
        
        
              <?php if ( isset( $results_mentors['statusMessage'] ) ) { ?>
                      <div class="statusMessage"><?php echo $results_mentors['statusMessage'] ?></div>
              <?php } ?>
            
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
              <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Description</th>
                      <th scope="col">Published By</th> 
                    </tr>
                  </thead>
                  <tbody class="tbody-light table-hover">
                    <?php foreach ( $results_mentors['mentors'] as $mentor ) { ?>
                      <tr onclick="location='admin.php?action=editMentor&amp;mentorId=<?php echo $mentor->id?>'">
                        <td>
                          <?php if ( $imagePath = $mentor->getImagePath() ) { ?>
                            <img id="incentiveImageFullsize" src="<?php echo $imagePath?>" alt="Mentor Image" style="width:50px;" />
                          <?php } ?>
                        </td>
                        <td>
                          <?php echo $mentor->person?>
                        </td>
                        <td>
                          <?php echo $mentor->title?>
                        </td>
                        <td>
                          <?php echo $mentor->summary?>
                        </td>
                        <td>
                          <?php echo $mentor->author?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>
              </div>
    
              <p><?php echo $results_mentors['totalRows']?> mentors<?php echo ( $results_mentors['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
              <p><b><a href="admin.php?action=newMentor" class="add-button">Add Mentor</a></b></p>
            
            </section>
          </div>
        </div>
    </div>

