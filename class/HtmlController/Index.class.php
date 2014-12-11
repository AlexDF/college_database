<?php

  namespace HtmlController;

  class Index extends Page {
    public $content;


    function __construct() {
      $this->content = '<a href="index.php?pagetype=HighestEnrollment">' .
        'Which colleges have the highest enrollment?</a><br>';
      

      $this->buildPage($this->content); 


    }



  }






?>