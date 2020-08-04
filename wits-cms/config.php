<?php
ini_set( "display_errors", true );
date_default_timezone_set( "America/Toronto" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=wits" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "purplesky" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
//define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "wits" );
define( "ADMIN_PASSWORD", "womenintech" );
define( "INCENTIVES_IMAGE_PATH", "images/incentives" );
define( "EVENTS_IMAGE_PATH", "images/events" );
define( "COMMUNITY_IMAGE_PATH", "images/community" );
define( "MEMBERS_IMAGE_PATH", "images/members" );
define( "TESTIMONIALS_IMAGE_PATH", "images/testimonials" );
define( "SPONSORS_IMAGE_PATH", "images/sponsors" );
define( "PODCASTS_IMAGE_PATH", "images/podcasts" );
define( "BLOGS_IMAGE_PATH", "images/blogs" );
define( "ALUMNI_IMAGE_PATH", "images/alumni" );
define( "MENTORS_IMAGE_PATH", "images/mentors" );


define( "JPEG_QUALITY", 85 );
require( CLASS_PATH . "/Incentive.php");
require( CLASS_PATH . "/WitsEvent.php");
require( CLASS_PATH . "/CommunityMember.php");
require( CLASS_PATH . "/WitsMember.php");
require( CLASS_PATH . "/Testimonial.php");
require( CLASS_PATH . "/Sponsor.php");
require( CLASS_PATH . "/Text.php");
require( CLASS_PATH . "/Podcast.php");
require( CLASS_PATH . "/Blog.php");
require( CLASS_PATH . "/Alumnus.php");
require( CLASS_PATH . "/Mentor.php");


function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  echo $exception;
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
