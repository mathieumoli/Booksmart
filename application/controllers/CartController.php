<?php

/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 04/03/2016
 * Time: 14:14
 */
class CartController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function index()
    {
        $this->load->helper('url');
        $this->load->view('cart_page');
    }

}