<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$username ) {
  login();
  exit;
}

switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'newIncentive':
    newIncentive();
    break;
  case 'editIncentive':
    editIncentive();
    break;
  case 'deleteIncentive':
    deleteIncentive();
    break;
  case 'newEvent':
    newEvent();
    break;
  case 'editEvent':
    editEvent();
    break;
  case 'deleteEvent':
    deleteEvent();
    break;
  case 'newCommunityMember':
    newCommunityMember();
    break;
  case 'editCommunityMember':
    editCommunityMember();
    break;
  case 'deleteCommunityMember':
    deleteCommunityMember();
    break;
  case 'newWitsMember':
    newWitsMember();
    break;
  case 'editWitsMember':
    editWitsMember();
    break;
  case 'deleteWitsMember':
    deleteWitsMember();
    break;
  case 'newTestimonial':
    newTestimonial();
    break;
  case 'editTestimonial':
    editTestimonial();
    break;
  case 'deleteTestimonial':
    deleteTestimonial();
    break;
  case 'newSponsor':
    newSponsor();
    break;
  case 'editSponsor':
    editSponsor();
    break;
  case 'deleteSponsor':
    deleteSponsor();
    break;
  case 'newText':
    newText();
    break;
  case 'editText':
    editText();
    break;
  case 'deleteText':
    deleteText();
    break;
  case 'newPodcast':
    newPodcast();
    break;
  case 'editPodcast':
    editPodcast();
    break;
  case 'deletePodcast':
    deletePodcast();
    break;
  case 'newBlog':
    newBlog();
    break;
  case 'editBlog':
    editBlog();
    break;
  case 'deleteBlog':
    deleteBlog();
    break;
  case 'newAlumnus':
    newAlumnus();
    break;
  case 'editAlumnus':
    editAlumnus();
    break;
  case 'deleteAlumnus':
    deleteAlumnus();
    break;
  case 'newMentor':
    newMentor();
    break;
  case 'editMentor':
    editMentor();
    break;
  case 'deleteMentor':
    deleteMentor();
    break;
  default:
    # combine these two functions
    // listArticles();
    // listIncentives();
    dashboard();
}

function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login";

  if ( isset( $_POST['login'] ) ) {

    // User has posted the login form: attempt to log the user in

    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {

      // Login successful: Create a session and redirect to the admin homepage
      $_SESSION['username'] = ADMIN_USERNAME;
      header( "Location: admin.php" );

    } else {

      // Login failed: display an error message to the user
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( TEMPLATE_PATH . "/admin/loginForm.php" );
    }

  } else {

    // User has not posted the login form yet: display the form
    require( TEMPLATE_PATH . "/admin/loginForm.php" );
  }

}


function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}

function newIncentive() {

  $results = array();
  $results['pageTitle'] = "New Membership Perk";
  $results['formAction'] = "newIncentive";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $incentive = new Incentive;
    $incentive->storeFormValues( $_POST );
    $incentive->insert();
    if ( isset( $_FILES['image'] ) ) $incentive->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['incentive'] = new Incentive;
    require( TEMPLATE_PATH . "/admin/editIncentive.php" );
  }

}


function editIncentive() {

  $results = array();
  $results['pageTitle'] = "Edit Membership Perk";
  $results['formAction'] = "editIncentive";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$incentive = Incentive::getById( (int)$_POST['incentiveId'], 'incentives' ) ) {
      header( "Location: admin.php?error=incentiveNotFound" );
      return;
    }

    $incentive->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $incentive->deleteImages();
    $incentive->update();
    if ( isset( $_FILES['image'] ) ) $incentive->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['incentive'] = Incentive::getById( (int)$_GET['incentiveId'], 'incentives' );
    require( TEMPLATE_PATH . "/admin/editIncentive.php" );
  }

}

function deleteIncentive() {

  if ( !$incentive = Incentive::getById( (int)$_GET['incentiveId'], 'incentives' ) ) {
    header( "Location: admin.php?error=incentiveNotFound" );
    return;
  }
  $incentive->deleteImages();
  $incentive->delete();
  header( "Location: admin.php?status=incentiveDeleted" );
}

function newEvent() {

  $results = array();
  $results['pageTitle'] = "New Event";
  $results['formAction'] = "newEvent";

  

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $event = new WitsEvent;
    $event->storeFormValues( $_POST );
    $event->insert();
    if ( isset( $_FILES['image'] ) ) $event->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['event'] = new WitsEvent;
    require( TEMPLATE_PATH . "/admin/editEvent.php" );
  }

}


function editEvent() {

  $results = array();
  $results['pageTitle'] = "Edit Event";
  $results['formAction'] = "editEvent";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$event = WitsEvent::getById( (int)$_POST['eventId'], 'witsEvet=nts' ) ) {
      header( "Location: admin.php?error=eventNotFound" );
      return;
    }

    $event->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $event->deleteImages();
    $event->update();
    if ( isset( $_FILES['image'] ) ) $event->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the Event list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['event'] = WitsEvent::getById( (int)$_GET['eventId'], 'witsEvents' );
    require( TEMPLATE_PATH . "/admin/editEvent.php" );
  }

}

function deleteEvent() {

  if ( !$event = WitsEvent::getById( (int)$_GET['eventId'], 'witsEvents' ) ) {
    header( "Location: admin.php?error=eventNotFound" );
    return;
  }
  $event->deleteImages();
  $event->delete();
  header( "Location: admin.php?status=eventDeleted" );
}

function newCommunityMember() {

  $results = array();
  $results['pageTitle'] = "New Community Member";
  $results['formAction'] = "newCommunityMember";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $communityMember = new CommunityMember;
    $communityMember->storeFormValues( $_POST );
    $communityMember->insert();
    if ( isset( $_FILES['image'] ) ) $communityMember->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['communityMember'] = new CommunityMember;
    require( TEMPLATE_PATH . "/admin/editCommunityMember.php" );
  }

}


function editCommunityMember() {

  $results = array();
  $results['pageTitle'] = "Edit Community Member";
  $results['formAction'] = "editCommunityMember";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$communityMember = CommunityMember::getById( (int)$_POST['communityMemberId'], 'communityMembers' ) ) {
      header( "Location: admin.php?error=communityMemberNotFound" );
      return;
    }

    $communityMember->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $communityMember->deleteImages();
    $communityMember->update();
    if ( isset( $_FILES['image'] ) ) $communityMember->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['communityMember'] = CommunityMember::getById( (int)$_GET['communityMemberId'], 'communityMembers' );
    require( TEMPLATE_PATH . "/admin/editCommunityMember.php" );
  }

}

function deleteCommunityMember() {

  if ( !$communityMember = CommunityMember::getById( (int)$_GET['communityMemberId'], 'communityMembers' ) ) {
    header( "Location: admin.php?error=communityMemberNotFound" );
    return;
  }
  $communityMember->deleteImages();
  $communityMember->delete();
  header( "Location: admin.php?status=communityMemberDeleted" );
}

function newWitsMember() {

  $results = array();
  $results['pageTitle'] = "New Wits Member";
  $results['formAction'] = "newWitsMember";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $witsMember = new WitsMember;
    $witsMember->storeFormValues( $_POST );
    $witsMember->insert();
    if ( isset( $_FILES['image'] ) ) $witsMember->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['witsMember'] = new WitsMember;
    require( TEMPLATE_PATH . "/admin/editWitsMember.php" );
  }

}


function editWitsMember() {

  $results = array();
  $results['pageTitle'] = "Edit Wits Member";
  $results['formAction'] = "editWitsMember";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$witsMember = WitsMember::getById( (int)$_POST['witsMemberId'], 'witsMembers' ) ) {
      header( "Location: admin.php?error=witsMemberNotFound" );
      return;
    }

    $witsMember->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $witsMember->deleteImages();
    $witsMember->update();
    if ( isset( $_FILES['image'] ) ) $witsMember->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['witsMember'] = WitsMember::getById( (int)$_GET['witsMemberId'], 'witsMembers' );
    require( TEMPLATE_PATH . "/admin/editWitsMember.php" );
  }

}

function deleteWitsMember() {

  if ( !$witsMember = WitsMember::getById( (int)$_GET['witsMemberId'], 'witsMembers' ) ) {
    header( "Location: admin.php?error=witsMemberNotFound" );
    return;
  }
  $witsMember->deleteImages();
  $witsMember->delete();
  header( "Location: admin.php?status=witsMemberDeleted" );
}


function newTestimonial() {

  $results = array();
  $results['pageTitle'] = "New Testimonial";
  $results['formAction'] = "newTestimonial";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $testimonial = new Testimonial;
    $testimonial->storeFormValues( $_POST );
    $testimonial->insert();
    if ( isset( $_FILES['image'] ) ) $testimonial->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['testimonial'] = new Testimonial;
    require( TEMPLATE_PATH . "/admin/editTestimonial.php" );
  }

}


function editTestimonial() {

  $results = array();
  $results['pageTitle'] = "Edit Testimonial";
  $results['formAction'] = "editTestimonial";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$testimonial = Testimonial::getById( (int)$_POST['testimonialId'], 'testimonials' ) ) {
      header( "Location: admin.php?error=testimonialNotFound" );
      return;
    }

    $testimonial->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $testimonial->deleteImages();
    $testimonial->update();
    if ( isset( $_FILES['image'] ) ) $testimonial->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['testimonial'] = Testimonial::getById( (int)$_GET['testimonialId'], 'testimonials' );
    require( TEMPLATE_PATH . "/admin/editTestimonial.php" );
  }

}

function deleteTestimonial() {

  if ( !$testimonial = Testimonial::getById( (int)$_GET['testimonialId'], 'testimonials' ) ) {
    header( "Location: admin.php?error=testimonialNotFound" );
    return;
  }
  $testimonial->deleteImages();
  $testimonial->delete();
  header( "Location: admin.php?status=testimonialDeleted" );
}



function newSponsor() {

  $results = array();
  $results['pageTitle'] = "New Sponsor";
  $results['formAction'] = "newSponsor";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $sponsor = new Sponsor;
    $sponsor->storeFormValues( $_POST );
    $sponsor->insert();
    if ( isset( $_FILES['image'] ) ) $sponsor->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['sponsor'] = new Sponsor;
    require( TEMPLATE_PATH . "/admin/editSponsor.php" );
  }

}


function editSponsor() {

  $results = array();
  $results['pageTitle'] = "Edit Sponsor";
  $results['formAction'] = "editSponsor";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$sponsor = Sponsor::getById( (int)$_POST['sponsorId'], 'sponsors' ) ) {
      header( "Location: admin.php?error=sponsorNotFound" );
      return;
    }

    $sponsor->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $sponsor->deleteImages();
    $sponsor->update();
    if ( isset( $_FILES['image'] ) ) $sponsor->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['sponsor'] = Sponsor::getById( (int)$_GET['sponsorId'], 'sponsors' );
    require( TEMPLATE_PATH . "/admin/editSponsor.php" );
  }

}

function deleteSponsor() {

  if ( !$sponsor = Sponsor::getById( (int)$_GET['sponsorId'], 'sponsors' ) ) {
    header( "Location: admin.php?error=sponsorNotFound" );
    return;
  }
  $sponsor->deleteImages();
  $sponsor->delete();
  header( "Location: admin.php?status=sponsorDeleted" );
}




function newText() {

  $results = array();
  $results['pageTitle'] = "New Text";
  $results['formAction'] = "newText";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $text = new Text;
    $text->storeFormValues( $_POST );
    $text->insert();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['text'] = new Text;
    require( TEMPLATE_PATH . "/admin/editText.php" );
  }

}


function editText() {


  $results = array();
  $results['pageTitle'] = "Edit Text";
  $results['formAction'] = "editText";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$text = Text::getById( (int)$_POST['textId'], 'texts' ) ) {
      header( "Location: admin.php?error=textNotFound" );
      return;
    }

    $text->storeFormValues( $_POST );
    $text->update();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['text'] = Text::getById( (int)$_GET['textId'], 'texts' );
    require( TEMPLATE_PATH . "/admin/editText.php" );
  }

}

function deleteText() {

  if ( !$text = Text::getById( (int)$_GET['textId'], 'texts' ) ) {
    header( "Location: admin.php?error=textNotFound" );
    return;
  }
  $text->delete();
  header( "Location: admin.php?status=textDeleted" );
}


function newPodcast() {

  $results = array();
  $results['pageTitle'] = "New Podcast";
  $results['formAction'] = "newPodcast";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $podcast = new Podcast;
    $podcast->storeFormValues( $_POST );
    $podcast->insert();
    if ( isset( $_FILES['image'] ) ) $podcast->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['podcast'] = new Podcast;
    require( TEMPLATE_PATH . "/admin/editPodcast.php" );
  }

}


function editPodcast() {

  $results = array();
  $results['pageTitle'] = "Edit Podcast";
  $results['formAction'] = "editPodcast";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$podcast = Podcast::getById( (int)$_POST['podcastId'], 'podcasts' ) ) {
      header( "Location: admin.php?error=podcastNotFound" );
      return;
    }

    $podcast->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $podcast->deleteImages();
    $podcast->update();
    if ( isset( $_FILES['image'] ) ) $podcast->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['podcast'] = Podcast::getById( (int)$_GET['podcastId'], 'podcasts' );
    require( TEMPLATE_PATH . "/admin/editPodcast.php" );
  }

}

function deletePodcast() {

  if ( !$podcast = Podcast::getById( (int)$_GET['podcastId'], 'podcasts' ) ) {
    header( "Location: admin.php?error=podcastNotFound" );
    return;
  }
  $podcast->deleteImages();
  $podcast->delete();
  header( "Location: admin.php?status=podcastDeleted" );
}


function newBlog() {

  $results = array();
  $results['pageTitle'] = "New Blog";
  $results['formAction'] = "newBlog";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $blog = new Blog;
    $blog->storeFormValues( $_POST );
    $blog->insert();
    if ( isset( $_FILES['image'] ) ) $blog->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['blog'] = new Blog;
    require( TEMPLATE_PATH . "/admin/editBlog.php" );
  }

}


function editBlog() {

  $results = array();
  $results['pageTitle'] = "Edit Blog";
  $results['formAction'] = "editBlog";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$blog = Blog::getById( (int)$_POST['blogId'], 'blogs' ) ) {
      header( "Location: admin.php?error=blogNotFound" );
      return;
    }

    $blog->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $blog->deleteImages();
    $blog->update();
    if ( isset( $_FILES['image'] ) ) $blog->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['blog'] = Blog::getById( (int)$_GET['blogId'], 'blogs' );
    require( TEMPLATE_PATH . "/admin/editBlog.php" );
  }

}

function deleteBlog() {

  if ( !$blog = Blog::getById( (int)$_GET['blogId'], 'blogs' ) ) {
    header( "Location: admin.php?error=blogNotFound" );
    return;
  }
  $blog->deleteImages();
  $blog->delete();
  header( "Location: admin.php?status=blogDeleted" );
}

function newAlumnus() {

  $results = array();
  $results['pageTitle'] = "New Alumna";
  $results['formAction'] = "newAlumnus";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $alumnus = new Alumnus;
    $alumnus->storeFormValues( $_POST );
    $alumnus->insert();
    if ( isset( $_FILES['image'] ) ) $alumnus->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['alumnus'] = new Alumnus;
    require( TEMPLATE_PATH . "/admin/editAlumnus.php" );
  }

}

function editAlumnus() {

  $results = array();
  $results['pageTitle'] = "Edit Alumna";
  $results['formAction'] = "editAlumnus";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$alumnus = Alumnus::getById( (int)$_POST['alumnusId'], 'alumni' ) ) {
      header( "Location: admin.php?error=alumnusNotFound" );
      return;
    }

    $alumnus->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $alumnus->deleteImages();
    $alumnus->update();
    if ( isset( $_FILES['image'] ) ) $alumnus->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['alumnus'] = Alumnus::getById( (int)$_GET['alumnusId'], 'alumni' );
    require( TEMPLATE_PATH . "/admin/editAlumnus.php" );
  }

}

function deleteAlumnus() {

  if ( !$alumnus = Alumnus::getById( (int)$_GET['alumnusId'], 'alumni' ) ) {
    header( "Location: admin.php?error=alumnusNotFound" );
    return;
  }
  $alumnus->deleteImages();
  $alumnus->delete();
  header( "Location: admin.php?status=alumnusDeleted" );
}

function newMentor() {

  $results = array();
  $results['pageTitle'] = "New Mentor";
  $results['formAction'] = "newMentor";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $mentor = new Mentor;
    $mentor->storeFormValues( $_POST );
    $mentor->insert();
    if ( isset( $_FILES['image'] ) ) $mentor->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['mentor'] = new Mentor;
    require( TEMPLATE_PATH . "/admin/editMentor.php" );
  }

}


function editMentor() {

  $results = array();
  $results['pageTitle'] = "Edit Mentor";
  $results['formAction'] = "editMentor";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$mentor = Mentor::getById( (int)$_POST['mentorId'], 'mentors' ) ) {
      header( "Location: admin.php?error=mentorNotFound" );
      return;
    }

    $mentor->storeFormValues( $_POST );
    if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $mentor->deleteImages();
    $mentor->update();
    if ( isset( $_FILES['image'] ) ) $mentor->storeUploadedImage( $_FILES['image'] );
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the incentive list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['mentor'] = Mentor::getById( (int)$_GET['mentorId'], 'mentors' );
    require( TEMPLATE_PATH . "/admin/editMentor.php" );
  }

}

function deleteMentor() {

  if ( !$mentor = Mentor::getById( (int)$_GET['mentorId'], 'mentors' ) ) {
    header( "Location: admin.php?error=mentorNotFound" );
    return;
  }
  $mentor->deleteImages();
  $mentor->delete();
  header( "Location: admin.php?status=mentorDeleted" );
}


function dashboard(){

  $results_incentives = array();
  $data_incentives = Incentive::getList();
  $results_incentives['incentives'] = $data_incentives['results'];
  $results_incentives['totalRows'] = $data_incentives['totalRows'];

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "incentiveNotFound" ) $results_incentives['errorMessage'] = "Error: Incentive not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_incentives['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "incentiveDeleted" ) $results_incentives['statusMessage'] = "Incentive deleted.";
  }

  $results_events = array();
  $data_events = WitsEvent::getList();
  $results_events['witsEvents'] = $data_events['results'];
  $results_events['totalRows'] = $data_events['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_events['errorMessage'] = "Error: Event not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_events['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_events['statusMessage'] = "Event deleted.";
  }

  $results_communityMembers = array();
  $data_communityMembers = CommunityMember::getList();
  $results_communityMembers['communityMembers'] = $data_communityMembers['results'];
  $results_communityMembers['totalRows'] = $data_communityMembers['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_communityMembers['errorMessage'] = "Error: Community Member not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_communityMembers['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_communityMembers['statusMessage'] = "Community Member deleted.";
  }


  $results_witsMembers = array();
  $data_witsMembers = WitsMember::getList();
  $results_witsMembers['witsMembers'] = $data_witsMembers['results'];
  $results_witsMembers['totalRows'] = $data_witsMembers['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_witsMembers['errorMessage'] = "Error: Wits Member not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_witsMembers['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_witsMembers['statusMessage'] = "Wits Member deleted.";
  }

  $results_testimonials = array();
  $data_testimonials = Testimonial::getList();
  $results_testimonials['testimonials'] = $data_testimonials['results'];
  $results_testimonials['totalRows'] = $data_testimonials['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_testimonials['errorMessage'] = "Error: Testimonial not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_testimonials['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_testimonials['statusMessage'] = "Testimonial deleted.";
  }

  $results_sponsors = array();
  $data_sponsors = Sponsor::getList();
  $results_sponsors['sponsors'] = $data_sponsors['results'];
  $results_sponsors['totalRows'] = $data_sponsors['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_sponsors['errorMessage'] = "Error: Sponsor not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_sponsors['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_sponsors['statusMessage'] = "Sponsor deleted.";
  }

  $results_texts = array();
  $data_texts = Text::getList();
  $results_texts['texts'] = $data_texts['results'];
  $results_texts['totalRows'] = $data_texts['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_texts['errorMessage'] = "Error: Text not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_texts['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_texts['statusMessage'] = "Text deleted.";
  }

  $results_podcasts = array();
  $data_podcasts = Podcast::getList();
  $results_podcasts['podcasts'] = $data_podcasts['results'];
  $results_podcasts['totalRows'] = $data_podcasts['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_podcasts['errorMessage'] = "Error: Podcast not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_podcasts['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_podcasts['statusMessage'] = "Podcast deleted.";
  }

  $results_blogs = array();
  $data_blogs = Blog::getList();
  $results_blogs['blogs'] = $data_blogs['results'];
  $results_blogs['totalRows'] = $data_blogs['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_blogs['errorMessage'] = "Error: Blog not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_blogs['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_blogs['statusMessage'] = "Blog deleted.";
  }

  $results_alumni = array();
  $data_alumni = Alumnus::getList();
  $results_alumni['alumni'] = $data_alumni['results'];
  $results_alumni['totalRows'] = $data_alumni['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_alumni['errorMessage'] = "Error: Alumna not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_alumni['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_alumni['statusMessage'] = "Alumna deleted.";
  }

  $results_mentors = array();
  $data_mentors = Mentor::getList();
  $results_mentors['mentors'] = $data_mentors['results'];
  $results_mentors['totalRows'] = $data_mentors['totalRows'];


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "eventNotFound" ) $results_mentors['errorMessage'] = "Error: Mentor not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results_mentors['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "eventDeleted" ) $results_mentors['statusMessage'] = "Mentor deleted.";
  }

  require( TEMPLATE_PATH . "/admin/dashboard.php" );

}

?>
