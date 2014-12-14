<?php

  namespace HtmlController;

  class Index extends Page {
    public $content;


    function __construct() {
      $this->content = '<a href="index.php?pagetype=HighestEnrollment">' .
        'Which colleges have the highest enrollment?</a><br><br>' .

        '<a href="index.php?pagetype=LargestLiabilities">' .
        'Which colleges have the largest amount of total liabilities?</a>' .
        '<br><br>' .

        '<a href="index.php?pagetype=LargestNetAssets">' .
        'Which colleges have the largest amount of net assets?</a>' .
        '<br><br>' .

        '<a href="index.php?pagetype=NetAssetsPerStudent">' .
        'Which colleges have the largest amount of net assets per student?</a>' .
        '<br>' .

        '<p>Which colleges have the largest percentage increase in enrollment between the years of 2011 and 2010?</p>';

      $this->buildPage($this->content); 

    }



  }






?>