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
        '<br><br>';

      $this->buildPage($this->content); 

    }



  }






?>