<?php

  namespace HtmlController;

  class NetAssetsPerStudent extends Page {

    public $content;

    function __construct() {
      $query = 'SELECT schools.`Institution_(entity)_name`,ROUND(financial_data.Total_net_assets/demographic_data.Grand_total) AS Total_net_assets_per_student, demographic_data.Grand_total, financial_data.Total_net_assets FROM schools JOIN demographic_data ON schools.Unique_identification_number_of_the_institution=demographic_data.Unique_identification_number_of_the_institution JOIN financial_data ON demographic_data.Unique_identification_number_of_the_institution=financial_data.Unique_identification_number_of_the_institution ORDER BY Total_net_assets_per_student DESC LIMIT 25';

      $db = new \DbController\Mysql;
      $results = $db->query($query);

      $table_output = '<table><tr><th>School Name</th><th>Net Assets Per Student</th><th>Enrollment</th><th>Total Net Assets</th></tr>';
      foreach($results as $result) {
        $table_output .= '<tr><td>' . $result[0] . '</td><td>' . $result[1] .
          '</td>' . '<td>' . $result[2] . '</td>' . '<td>' . $result[3] . '</td></tr>'; 
      }
      $table_output .= '</table>';

      $this->buildPage($table_output);

    }


  }

?>