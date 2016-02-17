<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 17/02/2016
 * Time: 17:50
 */
class MainPage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }


public function index()
    {
        $this->load->view('static_page');
    }



}