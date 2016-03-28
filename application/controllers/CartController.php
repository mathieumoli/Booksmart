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
        $this->load->database();

        if(count($_SESSION['cart']>0)){
            $ids = implode(",", $_SESSION['cart']);
            $query10 = "SELECT id,title,author,price,coursecode FROM Book WHERE id IN (" . $ids . ");";
            $data['cartDisp'] = $this->db->query($query10);
        }
        $this->load->view('cart_page',$data);
    }

    public function delete($bookid)
    {
        $this->load->helper('url');
        $cart=$_SESSION['cart'];
        if(($key = array_search($bookid, $cart)) !== false) {
            unset($cart[$key]);
        }
        $_SESSION['cart']=$cart;
        $data['delete']=true;
        $this->load->view('static_page',$data);
    }

}