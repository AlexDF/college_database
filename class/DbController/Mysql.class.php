<?php

namespace DbController;



class Mysql {

  function query($query) {
    foreach($this->connection->query($query) as $row) {
      $result[] = $row;
    }
    return $result;
  }


  function createTable($tbl_name, $headings) {
    $query = 'CREATE TABLE ' . '`' . $tbl_name . '`' . ' (';
    foreach($headings as $heading){
      $query .= '`' . str_replace(' ', '_', $heading) . '`' . ' varchar(255)' . ', ';
    }
    $query .= 'FOREIGN KEY (`Unique_identification_number_of_the_institution`) REFERENCES schools(`Unique_identification_number_of_the_institution`)' . ')';
    //$query .= ')';
    
    $this->connection->query($query);
    print_r($this->connection->errorInfo());
    echo $query;
  }



  function __construct() {
    $this->connection = new \PDO('mysql:host=localhost;dbname=college_data', 'root', 'password');

  }

  function __destruct() {
    $this->connection = null;
  }


}









?>