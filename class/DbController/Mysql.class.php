<?php

namespace DbController;

interface DbInterface {
  function query($query);
  function createTable($tbl_name, $headings);
}

class Mysql implements DbInterface {

  function query($query) {
    foreach($this->connection->query($query) as $row) {
      $result[] = $row;
    }
    return $result;
  }


  function createTable($tbl_name, $headings) {
    $query = 'CREATE TABLE ' . '`' . $tbl_name . '`' . ' (';
    foreach($headings as $heading){
      $query .= '`' . str_replace(' ', '_', $heading) . '`' . ' varchar(255)';
      if( $heading != end($headings) ){
        $query .= ', ';
      }
    }
    
    $query .= ')';
    
    $this->connection->query($query);
    print_r($this->connection->errorInfo());
    
  }



  function populateTable( $tbl_name, $records, $year=NULL ) {
    foreach( $records as $record ) {
      $query = 'INSERT INTO ' . $tbl_name . ' VALUES (';
      foreach( $record as $datum ){
        if($datum != 'R' && $datum != 'A' && $datum != 'Z') {
            $query .= '"' . $datum . '"';
            if( $datum != end($record) ) {
              $query .= ', ';
            }
        }
      }
      
      if($year){
        $query .= '"' . $year . '"';
      }
      $query .= ')';
      echo $query . '<br>';
      $this->connection->query($query);
      print_r($this->connection->errorInfo());
      
    }
  

  }


  function __construct() {
    $this->connection = new \PDO('mysql:host=localhost;dbname=college_data', 'root', 'password');

  }

  function __destruct() {
    $this->connection = null;
  }


}









?>