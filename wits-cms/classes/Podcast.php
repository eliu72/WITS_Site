<?php

/**
 * Class to handle Podcasts
 */

class Podcast
{
  // Properties

  /**
   * @var string database name
   */
  const DB_NAME = "podcasts";
  const CLASS_TYPE = "Podcast";
  const IMAGE_PATH = PODCASTS_IMAGE_PATH;

  /**
  * @var int The Podcast ID from the database
  */
  public $id = null;

  /**
  * @var string Full title of the Podcast
  */
  public $title = null;

  /**
  * @var string A short summary of the Podcast
  */
  public $summary = null;
  public $hyperlink = null;

  /**
  * @var string Who published this Podcast
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
    if ( isset( $data['summary'] ) ) $this->summary = /*preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "",*/ $data['summary'] /*)*/;
    if ( isset( $data['hyperlink'] ) ) $this->hyperlink = /*preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "",*/ $data['hyperlink'] /*)*/;
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

      // // Copy and resize the image to create the thumbnail
      // $thumbHeight = intval ( $imageHeight / $imageWidth * ARTICLE_THUMB_WIDTH );
      // $thumbResource = imagecreatetruecolor ( ARTICLE_THUMB_WIDTH, $thumbHeight );
      // imagecopyresampled( $thumbResource, $imageResource, 0, 0, 0, 0, ARTICLE_THUMB_WIDTH, $thumbHeight, $imageWidth, $imageHeight );

      // // Save the thumbnail
      // switch ( $imageType ) {
      //   case IMAGETYPE_GIF:
      //     imagegif ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
      //     break;
      //   case IMAGETYPE_JPEG:
      //     imagejpeg ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ), JPEG_QUALITY );
      //     break;
      //   case IMAGETYPE_PNG:
      //     imagepng ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
      //     break;
      //   default:
      //     trigger_error ( "Article::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      // }

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
  * Returns an Podcast object matching the given Podcast ID
  *
  * @param int The Podcast ID
  * @return Podcast|false The Podcast object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM " . self::DB_NAME . " WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Podcast( $row );
  }


  /**
  * Returns all (or a range of) Podcast objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @return Array|false A two-element array : results => array, a list of Podcast objects; totalRows => Total number of Podcasts
  */

  public static function getList( $numRows=1000000 ) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . self::DB_NAME ;

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $Podcast = new Podcast( $row );
      $list[] = $Podcast;
    }

    // Now get the total number of Podcasts that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Inserts the current Podcast object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the Podcast object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( self::CLASS_TYPE . "::insert(): Attempt to insert an ". self::CLASS_TYPE . " object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the Podcast
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO " . self::DB_NAME . " ( title, summary, hyperlink, author, imageExtension ) VALUES ( :title, :summary, :hyperlink, :author, :imageExtension )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":hyperlink", $this->hyperlink, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":author", $this->author, PDO::PARAM_STR );
    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current Podcast object in the database.
  */

  public function update() {

    // Does the Podcast object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( self::CLASS_TYPE . "::update(): Attempt to update an " .self::CLASS_TYPE . " object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the Podcast
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE " . self::DB_NAME . " SET title=:title, summary=:summary, hyperlink=:hyperlink, author=:author, imageExtension=:imageExtension WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":hyperlink", $this->hyperlink, PDO::PARAM_STR );
    $st->bindValue( ":author", $this->author, PDO::PARAM_STR );
    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current Podcast object from the database.
  */

  public function delete() {

    // Does the Podcast object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( self::CLASS_TYPE . "::delete(): Attempt to delete an " . self::CLASS_TYPE . " object that does not have its ID property set.", E_USER_ERROR );

    $this->deleteImages();

    // Delete the Podcast
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM " . self::DB_NAME ." WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
