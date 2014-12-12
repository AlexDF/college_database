<?php

  namespace HtmlController;

  class HighestEnrollment extends Page {

    public $content;

    function __construct() {
      $query = 'SELECT schools.`Institution_(entity)_name`, ' . 
        'demographic_data.Grand_total FROM schools JOIN ' .
        'demographic_data ON schools.Unique_identification_number' .
        '_of_the_institution=demographic_data.Unique_identification' .
        '_number_of_the_institution ORDER BY Grand_total DESC LIMIT 25';

      $db = new \DbController\Mysql;
      $results = $db->query($query);

      $table_output = '<table><tr><th>School Name</th><th>Enrollment</th></tr>';
      foreach($results as $result) {
        $table_output .= '<tr><td>' . $result[0] . '</td><td>' . $result[1] .
          '</td></tr>'; 
      }
      $table_output .= '</table>';

      $this->buildPage($table_output);

    }


  }





?>