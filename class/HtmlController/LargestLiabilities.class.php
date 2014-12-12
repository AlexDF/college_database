<?php

  namespace HtmlController;

  class LargestLiabilities extends Page {

    public $content;

    function __construct() {
      $query = 'SELECT schools.`Institution_(entity)_name`, ' . 
        'financial_data.Total_liabilities FROM schools JOIN ' .
        'financial_data ON schools.Unique_identification_number' .
        '_of_the_institution=financial_data.Unique_identification' .
        '_number_of_the_institution ORDER BY Total_liabilities DESC LIMIT 25';

      $db = new \DbController\Mysql;
      $results = $db->query($query);

      $table_output = '<table><tr><th>School Name</th><th>Total liabilities</th></tr>';
      foreach($results as $result) {
        $table_output .= '<tr><td>' . $result[0] . '</td><td>' . $result[1] .
          '</td></tr>'; 
      }
      $table_output .= '</table>';

      $this->buildPage($table_output);

    }


  }

?>