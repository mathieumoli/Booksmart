<?php
/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 14/03/2016
 * Time: 13:54
 */

$this->db->select('id');
$this->db->from('domain');
$this->db->where('name =', $_POST['domain']);


$domain=$this->db->get();
$this->db->select('id');
$this->db->from('course');
$courseinfo = array('name' => $_POST['coursename'], 'college' => $_POST['university']);
$course=$this->db->where($courseinfo);
if(sizeof($course)==0){$course='1';}

$data = array(
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'price' => $_POST['price'],
    'subject' => $_POST['subject'],
    'coursecode' => $_POST['coursecode'],
    'condition' => $_POST['condition'],
    'domainid' => $domain,
    'courseid' => $course,
    'sellerid' => $_SESSION['id']


);

$this->db->insert('book', $data);

// Produces: INSERT INTO book (title, author, price,subject,coursecode...) VALUES ('My title', 'My name', 'My date')
?>