<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(base_url()=="http://booksmart.esy.es/"){$siteurl="http://booksmart.esy.es:8888/index.php";
}else{
$siteurl="http://localhost:8888/sell.php";}


?> <!DOCTYPE html>
<html>
<head>
    <title>BookSmart</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/jquery-2.2.1.js'); ?>"></script>
</head>
<body>

<tr class="menu"><td class="cote">&nbsp;</td>
    <td style="text-align: center">
        <nav class="nav"><a class="btn btn-danger" type="button" href="<?php echo site_url('/');?>">Home</a>
            <a class="btn btn-danger" type="button" href="<?php echo site_url('sell');?>">Sell</a>
            <a 	class="btn btn-danger" type="button" onclick='account()'><?php if(isset($user_name)){echo $user_name;}else {echo 'Account';}?></a>
            <a 	class="btn btn-danger" type="button" href="">Cart</a></nav></td>
    <td class="cote">&nbsp;</td>
</tr>
    <form style="color:white">
        <div class="form-group">
            <label for="bookTitle">Title</label>
            <input type="text" class="form-control" id="bookTitle" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" placeholder="Author">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" placeholder="Subject">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="float" class="form-control" id="price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="code">Course Code</label>
            <input type="text" class="form-control" id="code" placeholder="Course Code">
        </div>
        <div>
            <label for = "selectCondition">Select the Condition of the Book</label> <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            </button>

            <select class="form-control">
                <option>Default</option>
                <option>Mint</option>
                <option>Very Good</option>
                <option>Good</option>
                <option>Fair</option>
                <option>Poor</option>
            </select>
        </div>

        <div>
            <br>
            <label for="exampleInputFile">Upload Photo</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Upload photos to assure the buyer your book is in good condition</p>
        </div>


        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</body></html>