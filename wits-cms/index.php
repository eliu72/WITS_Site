<?php

require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'viewIncentive':
    viewIncentive();
    break;
  default:
    homepage();
}

// function archive() {
//   $results = array();
//   $data = Article::getList();
//   $results['articles'] = $data['results'];
//   $results['totalRows'] = $data['totalRows'];
//   $results['pageTitle'] = "Article Archive | Widget News";
//   require( TEMPLATE_PATH . "/archive.php" );
// }

function viewIncentive() {
  if ( !isset($_GET["incentiveId"]) || !$_GET["incentiveId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results['incentive'] = Incentive::getById( (int)$_GET["incentiveId"] );
  $results['pageTitle'] = $results['incentive']->title . " | WITS";
  require( TEMPLATE_PATH . "/viewIncentive.php" );
}

function homepage() {

  $incentives = array();
  $incentives_data = Incentive::getList();
  $incentives['incentives'] = $incentives_data['results'];
  $incentives['totalRows'] = $incentives_data['totalRows'];
  $incentives['pageTitle'] = "Incentive";


  require( TEMPLATE_PATH . "/homepage.php" );
}

?>
