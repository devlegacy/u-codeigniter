<?php
$this->load->view('templates/header');
foreach($contents as $content) {
  $this->load->view($content);
}
$this->load->view('templates/footer');
