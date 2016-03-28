<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stripe_payment extends CI_Controller {

    public function __construct() {

        parent::__construct();

    }

    public function index()
    {
        $this->load->helper('url');

        $this->load->view('stripe');
    }

    public function checkout($bill)
    {
        if(isset($_SESSION['id'])) {
            try {
                require_once('./vendor/autoload.php');

                \Stripe\Stripe::setApiKey("sk_test_ZR7R8cxse2Nz0TFsmxTDlwey"); //Replace with your Secret Key


                $charge = \Stripe\Charge::create(array(
                    "amount" => $bill * 100,
                    "currency" => "eur",
                    "card" => $_POST['stripeToken'],
                    "description" => "Transaction BookSmart"
                ));
                $this->load->helper('url');
                $this->load->database();
                $ids = implode(",", $_SESSION['cart']);

                $query10 = "UPDATE Book SET buyerid='" . $_SESSION['id'] . "' WHERE id IN (" . $ids . ");";
                echo $query10;
                $this->db->query($query10);
                $data['payment'] = $bill;
                unset($_SESSION['cart']);
                $this->load->view('static_page', $data);

            } catch (Stripe_CardError $e) {

            } catch (Stripe_InvalidRequestError $e) {

            } catch (Stripe_AuthenticationError $e) {
            } catch (Stripe_ApiConnectionError $e) {
            } catch (Stripe_Error $e) {
            } catch (Exception $e) {
            }
        }else{$data['log']="<h1> You must be log to sell a book</h1>";

        $this->load->view('static_page', $data);
        }
    }

    public function updateDataB(){
        $this->load->helper('url');
        $this->load->database();
        $ids = implode(",", $_SESSION['cart']);
        $query10 = "UPDATE Book SET buyerid=".$_SESSION['id']." WHERE id IN (".$ids.");";
        $this->db->query($query10);

    }

}