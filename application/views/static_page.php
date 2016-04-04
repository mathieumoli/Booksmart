<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(base_url()=="http://www.booksmart.ga"){$siteurl="http://www.booksmart.ga:8888/index.php";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/jquery-2.2.1.js'); ?>"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>function account() {

        $('#cadrePrincipal').html('Loading...');
        // Do an ajax request
        $.ajax({

            <?php if(isset($_SESSION['name'])){$ect="/profile/";}else{$ect="/account/";}?>

            url: "<?php echo $siteurl ?>/account/"
        }).done(function(data) { // data what is sent back by the php page
            $('#cadrePrincipal').html(data); // display data
        });}

        function sell() {

            $('#cadrePrincipal').html('Loading...');
            // Do an ajax request
            $.ajax({



                url: "<?php echo $siteurl ?>/sell/"
            }).done(function(data) { // data what is sent back by the php page
                $('#cadrePrincipal').html(data); // display data
            });}

        function cart() {

            $('#cadrePrincipal').html('Loading...');
            // Do an ajax request
            $.ajax({



                url: "<?php echo $siteurl ?>/cartcontroller/"
            }).done(function(data) { // data what is sent back by the php page
                $('#cadrePrincipal').html(data); // display data
            });}

        // allocate the function to the window scrolling
        window.onscroll = fixedTop;

        var startingY = false;

        function fixedTop() {

            // First top value recovery
            if (!startingY) startingY = parseInt(document.getElementById("fixedtop").style.top);

            // Scroll top value
            if (window.pageYOffset) {
                var yrt = window.pageYOffset;
            } else if (document.body.scrollTop){
                var yrt = document.body.scrollTop;
            } else {
                var yrt = document.documentElement.scrollTop;
            }

            document.getElementById("fixedtop").style.top = (yrt + startingY)+ "px";
        }
    </script>


</head>
<body>
<table class="mainTab">
    <tr class="logo" >
        <th class="logo" style="text-align: center" scope="col" colspan="6"><img src="<?php echo base_url('/pictures/BSLogo.png'); ?>" width="504px" height="207px"  alt="Logo"/></th>
    </tr>
    <tr class="menu">
        <td class="cote">&nbsp;</td>
        <td style="text-align: center">
            <nav class="nav"><a class="btn btn-danger" type="button" href="<?php echo $siteurl?>">Home</a><a class="btn btn-danger" type="button" onclick='sell()'>Sell</a><a 	class="btn btn-danger" type="button" onclick='account()'><?php echo $user_name;?></a><a 	class="btn btn-danger" type="button" onclick='cart()'>Cart</a></nav></td>
        <td class="cote">&nbsp;</td>
    </tr>
    <tr class="courseMenu"><td colspan="3">
       <?php include("domainbanner.php") ?>
        </td>
    </tr>
    <tr class="mainPart">
        <td class="search"><?php include("researchform.php") ?></td>
        <td id="cadrePrincipal" colspan="5">

            <?php
            if(isset($displayBook)){
                echo "<h1>More information about ".$displayBook['title']."</h1>";
                echo "<table>";
                echo "<tr><td>".$displayBook['title']." by ".$displayBook['author']."</td></tr>";
                echo "<tr><td>CourseCode: ".$displayBook['coursecode']."</td><td>Price: ".$displayBook['price']."€</td></tr>";
                echo "<tr><td>Subject: ".$displayBook['subject']."</td><td>Condition: ".$displayBook['cond']."</td></tr>";
                echo "<tr><td>Date on sale: ".$displayBook['date']."</td><td>Course name: ".$displayBook['coursename']."</td></tr>";
                echo "<tr><td>College: ".$displayBook['college']."</td><td>Domaine name: ".$displayBook['domainname']."</td></tr>";

                echo"<tr><td colspan='2'><a type=\"button\" value=\"".$displayBook['id']."\" href=\"" . $siteurl . "/mainpage/addCart/" . $displayBook['id'] . "\" class=\"btn btn-success\">Buy it !</a></td></tr>";
            }else



            if(isset($SQLResult)){
                echo "<h1> Research Result </h1>";

                echo "<table>";
                foreach($SQLResult->result() as $book)
                {echo "<tr><td>".$book->title." by ".$book->author."</td></tr>";
                echo "<tr><td>".$book->coursecode."</td><td>".$book->price."€</td></tr>";
                echo"<tr><td ><a type=\"button\" value=\"".$book->id."\" href=\"" . $siteurl . "/mainpage/addCart/" . $book->id . "\" class=\"btn btn-success\">Buy it !</a><td><a  class=\"btn btn-info\" role=\"button\" value=\"".$book->id."\" href=\"".$siteurl."/mainpage/book/".$book->id."\" >More Details</a></td></td></tr>";
                }
                echo "</table><br/><br/>";
            }else
                if(isset($title)){
                echo "<h1> The book '";
                echo $title;
                echo "' is on sale !</h1>";
                    echo $result;

            }
            else {

                if (isset($log)) {
                    echo $log;
                } else {
                    if(isset($addBook)){
                        echo"BOOK ADDED IN THE CART :".$addBook;
                    }else {
                        if (isset($delete)) {
                           echo "<h1> Book Deleted ! </h1>";
                        } else {
                            if(isset($payment)){
                                echo "<h1> Congratulation! You buy the book(s) for  ".$payment."€<br>We send a mail to the seller to notify him</h1>";
                            }
                            if (isset($tenLast)) {
                                echo "<h1>".$titleP."</h1>";
                                echo "<table id='listBooks'>";
                                foreach ($tenLast->result() as $book) {

                                    echo "<tr><td>" . $book->title . " by " . $book->author . "</td></tr>";
                                    echo "<tr><td>" . $book->coursecode . "</td><td>" . $book->price . "€</td></tr>";
                                    echo "<tr><td ><a type=\"button\" value=\"" . $book->id . "\" href=\"" . $siteurl . "/mainpage/addCart/" . $book->id . "\" class=\"btn btn-success\">Buy it !</a><td><a  class=\"btn btn-info\" role=\"button\" value=\"" . $book->id . "\" href=\"" . $siteurl . "/mainpage/book/" . $book->id . "\" >More Details</a></td></td></tr>";
                                }
                                echo "</table><br/><br/>";
                            } else {
                                echo "<h1> WELCOME ON BOOKSMART</h1>";
                            }
                        }
                    }
                }
            }?>
        </td>
    </tr>
</table></body></html>