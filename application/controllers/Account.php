<?php

class Account extends CI_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();

        // Load facebook library and pass associative array which contains appId and secret key
        $this->load->library('facebook');

        // Get user's login information
        $this->user = $this->facebook->getUser();
    }

    // Store user information and send to profile page
    public function index() {
        $this->load->helper('url');

        if ($this->user) {
            $data['user_profile'] = $this->facebook->api('/me');

            // Get logout url of facebook
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url( 'index.php/account/logout')));

            // Send data to profile page
            $this->load->view('static_page', $data);
        } else {

            // Store users facebook login url
            $data['login_url'] = $this->facebook->getLoginUrl();
            $this->load->view('login', $data);
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