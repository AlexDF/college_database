<?php
  ini_set( 'display_startup_errors', 1 );
  ini_set( 'display_errors', 1 );
  error_reporting( -1 );
  //ini_set('memory_limit', '512M');

  function my_autoloader( $class ) {
    $filepath = 'class/' . str_replace( "\\", "/", $class ) . '.class.php';
    include $filepath;
  }

  spl_autoload_register( 'my_autoloader' );

  if(!isset($_GET['pagetype'])) {
    $_GET['pagetype'] = "Index";
  }

  HtmlController\Html::render($_GET['pagetype']);

  


?>