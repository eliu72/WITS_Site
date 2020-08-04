<?php

/**
 * Class to handle events
 */

class WitsEvent
{
  // Properties

  /**
   * @var string database name
   */
  const DB_NAME = "witsEvents";
  const CLASS_TYPE = "WitsEvent";
  const IMAGE_PATH = EVENTS_IMAGE_PATH;

  /**
  * @var int The event ID from the database
  */
  public $id = null;

  /**
  * @var string Full title of the event
  */
  public $title = null;

  /**
   * @var string type of the event
   */
  public $eventType = null;

  /**
  * @var string A short summary of the event
  */
  public $summary = null;

  /**
   * @var int Event date
   */
  public $eventDate = null;

  /**
   * @var int Event time
   */
  public $eventTime = null;
  public $eventLocation = null;

  public $eventLink = null;

  /**
  * @var string Who published this event
  */
  public $author = null;

  /**
  * @var string The filename extension of the article's full-size and thumbnail images (empty string means the article has no image)
  */
  public $imageExtension = "";


  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['title'] ) ) $this->title = /*preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "",*/ $data['title'] /*)*/;
    if ( isset( $data['eventType'] ) ) $this->eventType = /*preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "",*/ $data['eventType'] /*)*/;
    if ( isset( $data['summary'] ) ) $this->summary = /*preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "",*/ $data['summary'] /*)*/;
    if ( isset( $data['eventDate'] ) ) $this->eventDate = (int) $data['eventDate'];
    if ( isset( $data['eventTime'] ) ) $this->eventTime = (int) $data['eventTime'];
    if ( isset( $data['eventLocation'] ) ) $this->eventLocation = /*preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "",*/ $data['eventLocation'] /*)*/;
    if ( isset( $data['eventLink'] ) ) $this->eventLink = /*preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "",*/ $data['eventLink'] /*)*/;
    if ( isset( $data['author'] ) ) $this->author = $data['author'];
    if ( isset( $data['imageExtension'] ) ) $this->imageExtension = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\$ a-zA-Z0-9()]/", "", $data['imageExtension'] );
  }


  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params ); 

    // Parse and store the publication date
    if ( isset($params['eventDate']) ) {
        $eventDate = explode ( '-', $params['eventDate'] );

        if ( count($eventDate) == 3 ) {
            list ( $y, $m, $d ) = $eventDate;
            $this->eventDate = mktime ( 0, 0, 0, $m, $d, $y );
        }
    }

    if ( isset($params['eventTime']) ) {
        $eventTime = explode ( ':', $params['eventTime'] );

        list ( $H, $i ) = $eventTime;
        $this->eventTime = mkTime ( $H, $i, 0, 0, 0, 0 );
    }
  }

  /**
  * Stores any image uploaded from the edit form
  *
  * @param assoc The 'image' element from the $_FILES array containing the file upload data
  */

  public function storeUploadedImage( $image ) {

    if ( $image['error'] == UPLOAD_ERR_OK )
    {
      // Does the Article object have an ID?
      if ( is_null( $this->id ) ) trigger_error( self::CLASS_TYPE . "::storeUploadedImage(): Attempt to upload an image for an " . self::CLASS_TYPE . " object that does not have its ID property set.", E_USER_ERROR );

      // Delete any previous image(s) for this article
      $this->deleteImages();

      // Get and store the image filename extension
      $this->imageExtension = strtolower( strrchr( $image['name'], '.' ) );

      // Store the image
      $tempFilename = trim( $image['tmp_name'] ); 
      
      if ( is_uploaded_file ( $tempFilename ) ) {
        if ( !( move_uploaded_file( $tempFilename, $this->getImagePath() ) ) ) trigger_error( self::CLASS_TYPE . "::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
        if ( !( chmod( $this->getImagePath(), 0666 ) ) ) trigger_error( self::CLASS_TYPE . "::storeUploadedImage(): Couldn't set permissions on uploaded file.", E_USER_ERROR );
      }

      // Get the image size and type
      $attrs = getimagesize ( $this->getImagePath() );
      $imageWidth = $attrs[0];
      $imageHeight = $attrs[1];
      $imageType = $attrs[2];

      // Load the image into memory
      switch ( $imageType ) {
        case IMAGETYPE_GIF:
          $imageResource = imagecreatefromgif ( $this->getImagePath() );
          break;
        case IMAGETYPE_JPEG:
          $imageResource = imagecreatefromjpeg ( $this->getImagePath() );
          break;
        case IMAGETYPE_PNG:
          $imageResource = imagecreatefrompng ( $this->getImagePath() );
          break;
        default:
          trigger_error ( self::CLASS_TYPE . "::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }

      $this->update();
    }
  }

  /**
  * Deletes any images and/or thumbnails associated with the article
  */

  public function deleteImages() {

    // Delete all fullsize images for this article
    foreach (glob( self::IMAGE_PATH . "/" . $this->id . ".*") as $filename) {
      if ( !unlink( $filename ) ) trigger_error( self::CLASS_TYPE . "::deleteImages(): Couldn't delete image file.", E_USER_ERROR );
    }

    // Remove the image filename extension from the object
    $this->imageExtension = "";
  }


  /**
  * Returns the relative path to the article's full-size or thumbnail image
  *
  * @param string The type of image path to retrieve (IMG_TYPE_FULLSIZE or IMG_TYPE_THUMB). Defaults to IMG_TYPE_FULLSIZE.
  * @return string|false The image's path, or false if an image hasn't been uploaded
  */

  public function getImagePath() {
    return ( $this->id && $this->imageExtension ) ? ( self::IMAGE_PATH . "/" . $this->id . $this->imageExtension ) : false;
  }

  /**
  * Returns an event object matching the given event ID
  *
  * @param int The event ID
  * @return event|false The event object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(eventDate) AS eventDate FROM " . self::DB_NAME . " WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new WitsEvent( $row );
  }


  /**
  * Returns all (or a range of) event objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @return Array|false A two-element array : results => array, a list of event objects; totalRows => Total number of events
  */

  public static function getList( $numRows=1000000 ) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(eventDate) AS eventDate FROM " . self::DB_NAME . " ORDER BY eventDate DESC LIMIT :numRows";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $event = new WitsEvent( $row );
      $list[] = $event;
    }



    // Now get the total number of events that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Inserts the current event object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the event object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( self::CLASS_TYPE . "::insert(): Attempt to insert an ". self::CLASS_TYPE . " object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the event
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO " . self::DB_NAME . " ( title, eventType, summary, eventDate, eventTime, eventLocation, eventLink, author, imageExtension ) VALUES ( :title, :eventType, :summary, FROM_UNIXTIME(:eventDate), FROM_UNIXTIME(:eventTime), :eventLocation, :eventLink, :author, :imageExtension )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":eventType", $this->eventType, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":eventDate", $this->eventDate, PDO::PARAM_INT );
    $st->bindValue( ":eventTime", $this->eventTime, PDO::PARAM_INT );
    $st->bindValue( ":eventLocation", $this->eventLocation, PDO::PARAM_STR );
    $st->bindValue( ":eventLink", $this->eventLink, PDO::PARAM_STR );
    $st->bindValue( ":author", $this->author, PDO::PARAM_STR );
    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current event object in the database.
  */

  public function update() {

    // Does the event object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( self::CLASS_TYPE . "::update(): Attempt to update an " .self::CLASS_TYPE . " object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the event
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE " . self::DB_NAME . " SET title=:title, eventType=:eventType, summary=:summary, eventDate=FROM_UNIXTIME(:eventDate), eventTime=FROM_UNIXTIME(:eventTime), eventLocation=:eventLocation, eventLink=:eventLink, author=:author, imageExtension=:imageExtension WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":eventType", $this->eventType, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":eventDate", $this->eventDate, PDO::PARAM_INT );
    $st->bindValue( ":eventTime", $this->eventTime, PDO::PARAM_INT );    
    $st->bindValue( ":eventLocation", $this->eventLocation, PDO::PARAM_STR );
    $st->bindValue( ":eventLink", $this->eventLink, PDO::PARAM_STR );
    $st->bindValue( ":author", $this->author, PDO::PARAM_STR );
    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current event object from the database.
  */

  public function delete() {

    // Does the event object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( self::CLASS_TYPE . "::delete(): Attempt to delete an " . self::CLASS_TYPE . " object that does not have its ID property set.", E_USER_ERROR );

    $this->deleteImages();

    // Delete the event
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM " . self::DB_NAME ." WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
