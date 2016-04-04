<?php

class Sell extends CI_Controller
{

    public $user = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();

    }

    // Store user information and send to profile page
    public function index()
    {

        $this->load->view('sell');

    }

    public function addBook()
    {
        if(isset($_SESSION['id'])) {
            $query1 = "SELECT id FROM Domain WHERE name='" . $_POST['domain'] . "';";
            /*$this->db->select('id');
            $this->db->from('Domain');
            $this->db->where('name =', $_POST['domain'));*/


            $domid = $this->db->query($query1);


            $query2 = "SELECT id FROM Course WHERE name='" . $_POST['coursename'] . "' AND college='" . $_POST['university'] . "';";


            $course = $this->db->query($query2);
            if ($course->num_rows() > 0) {
                $courseid = $course->row()->id;
            } else
                $courseid = 1;


            $data['title'] = $_POST['title'];
            $data['author'] = $_POST['author'];
            $data['price'] = $_POST['price'];
            $data['subject'] = $_POST['subject'];
            $data['coursecode'] = $_POST['coursecode'];
            $data['cond'] = $_POST['condition'];
            $data['domainid'] = $domid;
            $data['courseid'] = $course;
            $data['sellerid'] = $_SESSION['id'];


            $this->db->set('title', $_POST['title']);
            $this->db->set('author', $_POST['author']);
            $this->db->set('price', intval($_POST['price']));
            $this->db->set('subject', $_POST['subject']);
            $this->db->set('coursecode', $_POST['coursecode']);
            $this->db->set('cond', $_POST['condition']);
            $this->db->set('domainid', $domid->row()->id);
            $this->db->set('courseid', $courseid);
            $this->db->set('sellerid', $_SESSION['id']);
            /* $this->db->set('title', "harry Potter");
             $this->db->set('author', "Jack");
             $this->db->set('price', 32);
             $this->db->set('subject', "Magic");
             $this->db->set('coursecode', "CS1BA1");
             $this->db->set('cond', "Poor");
             $this->db->set('domainid', 1);
             $this->db->set('courseid', 1);
             $this->db->set('sellerid', $_SESSION['id']);*/

            $this->db->insert('Book');
            if(isset($_FILES['image']))
            {
                $file = $_FILES['image']['tmp_name'];

            }




                $image = addslashes(file_getcontents($_FILES['image']['tmp_name']));
                $image_name = addslashes($_FILES['image']['name']);
                $image_size = getimagesize($_FILES['image']['tmp_name']);

                if($image_size==FALSE)
                {
                    $data['result']= "not an image";
                }
                else
                {
                    $imagequery = "INSERT INTO Image (name,image) VALUES('".$image_name."','".$image."');";
                    if(! $this->db->query($imagequery))
                    {
                        $data['result']="problem uploading image";
                    }
                    else
                    {

                        $data['result']= "image uploaded";
                    }
                }

        }else{$data['log']="<h1> You must be log to sell a book</h1>";
        }
            $this->load->view('static_page', $data);
// Produces: INSERT INTO book (title, author, price,subject,coursecode...) VALUES ('My title', 'My name', 'My date')

    }


}

?>