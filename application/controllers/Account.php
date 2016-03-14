<?php

class Account extends CI_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->database();



        // Get user's login information
        $this->user = $this->facebook->getUser();
    }

    // Store user information and send to profile page
    public function index() {


        if ($this->user) {
            if(isset($_SESSION['name'])){
                $data['user_profile'] = $this->facebook->api('/me');
                $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url( 'index.php/account/logout')));
                $this->load->view('profile',$data);

            }else{

            $data['user_profile'] = $this->facebook->api('/me');

            // Get logout url of facebook
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url( 'index.php/account/logout')));

            $u=$data['user_profile'];
            $_SESSION['name']=$u['name'];
            $_SESSION['id']=$u['id'];
            $_SESSION['logout_url']=$data['logout_url'];



            $this->load->view('static_page', $data);}


        } else {

            // Store users facebook login url
            $data['login_url'] = $this->facebook->getLoginUrl();
            $this->load->view('login', $data);
            $_SESSION['login_url']=$data['login_url'];
        }
    }

    // Logout from facebook
    public function logout() {

        // Destroy session
        session_destroy();

        // Redirect to baseurl
        redirect(base_url());
    }

}
?>