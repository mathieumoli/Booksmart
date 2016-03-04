<?php

class sell extends CI_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

    }

    // Store user information and send to profile page
    public function index() {
        $this->load->view('sell');

    }



}
?>