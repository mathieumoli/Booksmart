<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('facebook');

$siteurl="http://localhost:8888/index.php";
?> <!DOCTYPE html>
<html>
<head>
    <title>BookSmart</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body>
<table class="mainTab">
    <tr class="logo" >
        <th class="logo" style="text-align: center" scope="col" colspan="3"><img src="<?php echo base_url('/pictures/BSLogo.png'); ?>" width="504px" height="207px"  alt="Logo"/></th>
    </tr>
    <tr class="menu"><td class="cote">&nbsp;</td>
        <td style="text-align: center">
            <nav class="nav"><a class="btn btn-danger" type="button" href="">Home</a><a class="btn btn-danger" type="button" href="">Sell</a><a 	class="btn btn-danger" type="button" href="<?php echo $siteurl ?>/account/">Account</a><a 	class="btn btn-danger" type="button" href="">Cart</a></nav></td>
        <td class="cote">&nbsp;</td>
    </tr>
    <tr class="courseMenu">
        <td colspan="3">HERE THE BEAUTIFUL COURSE MENU </td>
    </tr>
    <tr class="mainPart">
        <td class="search">HERE OUR BEAUTIFUL RESEARCH FORM</td>
        <td class="cadrePrincipal" colspan="2">

            <h1>Welcome on BOOKSMART</h1>
        </td>
    </tr>
</table></body></html>