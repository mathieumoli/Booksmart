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
    }


    public function index()
    {
        $this->load->helper('url');
        $this->load->database();
        $query="";
        $quer=null;
        if(isset($_POST['title'])||isset($_POST['author'])||isset($_POST['subject'])||isset($_POST['price'])||isset($_POST['code']))
        {
            $query1 = "SELECT id,title,author,price,coursecode FROM Book ";

            if(!empty($_POST['cond'])){
                if($_POST['cond']!='d'){
                    $quer=" cond = '".$_POST['cond']."'";
                }
            }
            if(!empty($_POST['code'])){
                if($quer==null){
                    $quer=" coursecode = '".$_POST['code']."'";
                }else{
                    $quer=" coursecode = '".$_POST['code']."' ".$quer;
                }
            }
            if(!empty($_POST['price'])){
                if($quer==null){
                    $quer="( price BETWEEN 'O' AND '".$_POST['price']."') ";
                }else{
                    $quer=" (price BETWEEN 'O' AND '".$_POST['price']."') AND ".$quer;
                }
            }
            if(!empty($_POST['subject'])){
                if($quer==null){
                    $quer=" subject LIKE '%".$_POST['subject']."%'";
                }else{
                    $quer=" subject LIKE '%".$_POST['subject']."%' AND ".$quer;
                }
            }
            if(!empty($_POST['author'])){
                if($quer==null){
                    $quer=" author LIKE '%".$_POST['author']."%'";
                }else{
                    $quer=" author LIKE '%".$_POST['author']."%' AND ".$quer;
                }
            }
            if(!empty($_POST['title'])){
                if($quer==null){
                    $quer=" title LIKE '%".$_POST['title']."%'";
                }else{
                    $quer=" title LIKE '%".$_POST['title']."%' AND ".$quer;
                }
            }
            if($quer!=""){
                $query=$query1."WHERE ".$quer."AND buyerid IS NULL ;";

            }else{
                $query=$query1."WHERE buyerid IS NULL ;";
            }$data['query']=$query;
            $data['SQLResult'] = $this->db->query($query);
            $this->load->view('static_page',$data);

        }else{

        $query10 = "SELECT id,title,author,price,coursecode FROM Book ORDER BY date DESC LIMIT 10;";
            $data['tenLast'] = $this->db->query($query10);
            $this->load->view('static_page',$data);
        }

    }


    public function login(){

        //$this->load->library('facebook');
        // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('mainpage/logout'); // Logs off application
            // OR
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('welcome/login'),
                'scope' => array("email") // permissions here
            ));
        }


        $this->load->view('login',$data);

    }

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('welcome/login');
    }

    public function book($bookid){

        $this->load->helper('url');
        $this->load->database();

        $query1 = "SELECT B.id AS id,B.cond AS cond,B.title AS title,B.author AS author,B.price AS price,B.subject AS subject,B.date AS date,B.coursecode AS coursecode,C.name AS coursename,C.college AS college,D.name AS domainname
                    FROM Course as C JOIN Book as B ON C.id=B.courseid JOIN Domain as D ON D.id=B.domainid
                    WHERE B.id=".$bookid.";";
        $book= $this->db->query($query1)->row_array();
        $data['displayBook']=$book;
        $this->load->view('static_page',$data);


    }

    public function displayBookByDomain($domainid){
        $this->load->helper('url');
        $this->load->database();

        $query10 = "SELECT id,title,author,price,coursecode FROM Book WHERE domainid=".$domainid." AND buyerid IS NULL ;";
        $data['tenLast'] = $this->db->query($query10);
        $this->load->view('static_page',$data);

    }

    public function addCart($bookid){
        $this->load->helper('url');
        $this->load->database();
        if(isset($_SESSION['cart'])){
            $cart=$_SESSION['cart'];
            if(!in_array($bookid,$cart)){
                $cart[]=$bookid;
            }
        }else{
            $cart[]=$bookid;
        }

        $_SESSION['cart']=$cart;
        $data['addBook']=$bookid;

        $this->load->view('static_page',$data);

    }

}