<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(base_url()=="http://www.booksmart.ga/"){$siteurl="http://www.booksmart.ga:8888/index.php";
}else{
$siteurl="http://localhost:8888/index.php";
}
$user_name="Account";
if(!isset($_SESSION)){session_start();}else{
if(isset($_SESSION['name'])){
    $user_name=$_SESSION['name'];
}}
?> <!DOCTYPE html>
<html>
<head>
    <title>BookSmart</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/jquery-2.2.1.js'); ?>"></script>
    <script>function account() {

        $('#cadrePrincipal').html('Loading...');
        // Do an ajax request
        $.ajax({

            <?php if(isset($_SESSION['name'])){$ect="/profile/";}else{$ect="/account/";}?>

            url: "<?php echo $siteurl ?>/account/"
        }).done(function(data) { // data what is sent back by the php page
            $('#cadrePrincipal').html(data); // display data
        });}</script>
</head>
<body>
<table class="mainTab">
    <tr class="logo" >
        <th class="logo" style="text-align: center" scope="col" colspan="3"><img src="<?php echo base_url('/pictures/BSLogo.png'); ?>" width="504px" height="207px"  alt="Logo"/></th>
    </tr>
    <tr class="menu"><td class="cote">&nbsp;</td>
        <td style="text-align: center">
            <nav class="nav"><a class="btn btn-danger" type="button" >Home</a><a class="btn btn-danger" type="button" href="">Sell</a><a 	class="btn btn-danger" type="button" onclick='account()'><?php echo $user_name;?></a><a 	class="btn btn-danger" type="button" href="">Cart</a></nav></td>
        <td class="cote">&nbsp;</td>
    </tr>
    <tr class="courseMenu">
        <td colspan="3">HERE THE BEAUTIFUL COURSE MENU </td>
    </tr>
    <tr class="mainPart">
        <td class="search">HERE OUR BEAUTIFUL RESEARCH FORM</td>
        <td id="cadrePrincipal" colspan="2">

            <?if(isset($_SESSION['name'])){
                echo "<h1> Bonjour ";
                echo $_SESSION['name'];
                echo "</h1>";

            }else echo"<h1> WELCOME ON BOOKSMART</h1>";?>
        </td>
    </tr>
</table></body></html>