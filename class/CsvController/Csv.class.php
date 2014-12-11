<?php
  namespace CsvController;

  interface CsvInterface {
    public static function open( $filepath );
    public static function close( $handle );
    public static function getRow( $handle );
    public static function getFriendlyHeadings( $filepath, $ignore_first_row, $column );
    public static function getRecords($filepath, $ignore_first_row);
  }


  class Csv implements CsvInterface {
    

    public static function open( $filepath ) {
      return fopen( $filepath, "r" );
    }

    
    public static function close( $handle ) {
      fclose( $handle );
    }


    public static function getRow( $handle ) {
      return fgetcsv( $handle, 5000, ",");
    }


    public static function getFriendlyHeadings( $filepath, $ignore_first_row, $column  ) {
      ini_set('auto_detect_line_endings', TRUE);

      if( $handle = self::open( $filepath ) ){
        while( $row = self::getRow( $handle ) ){
          if( $ignore_first_row ) {
            $ignore_first_row = FALSE;
          } else {
            $friendlyHeadings[] = $row[ $column-1 ];
          } // end if-else
        } // end while
      } // end if

      self::close( $handle );
      return $friendlyHeadings;
    } // end getFriendly Headings
     

    public static function getRecords( $filepath, $ignore_first_row ) {
      ini_set('auto_detect_line_endings', TRUE);
      if( $handle = self::open( $filepath ) ) {
        while( $row = self::getRow( $handle ) ) {
          if( $ignore_first_row ) {
            $ignore_first_row = FALSE;
          } else {
            //$record = array_combine($headings, $row);
            $records[] = $row;
          }
        } // end while
      } // end if
      self::close($handle);
      return $records;
    } // end getRecords



  } // end Csv class


?>