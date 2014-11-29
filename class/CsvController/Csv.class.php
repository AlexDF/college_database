<?php
  namespace CsvController;

  interface CsvInterface {
    public static function open( $filepath );
    public static function close( $handle );
    
  }


  class Csv implements CsvInterface {
    

    public static function open( $filepath ) {
      return fopen( $path, "r" );
    }

    
    public static function close( $handle ) {
      fclose( $handle );
    }


    
    

  }


?>