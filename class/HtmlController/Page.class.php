<?php

  namespace HtmlController;

  class Page {
    public $header = "<!DOCTYPE html><html><head><link type='text/css' rel='stylesheet' href='css/style.css'></head><body>";
    public $footer = "</body></html>";

    public function buildPage($body) {
      echo $this->header. $body . $this->footer;
    }

  }



?>