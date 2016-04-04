<?php
/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 07/03/2016
 * Time: 13:48
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div id="fixedtop" style="position:absolute; top: 300px; width: 100px; height: 100px;">
<form style="text-align: center;padding-left: 10px;padding-right: 10px; color: floralwhite; " method="post" action="<?php echo 'http://localhost:8888/index.php/Mainpage/'?>">

        <label for="bookTitle">Title</label></br>
        <input style="color:black;" type="text" id="title" name="title" placeholder="Title"></br>


        <label for="author">Author</label></br>
        <input style="color:black;" type="text"  id="author" name="author" placeholder="Author"></br>


        <label for="subject">Subject</label></br>
        <input style="color:black;" type="text"  id="subject" name="subject" placeholder="Subject"></br>


        <label for="amount">Max Price</label></br>
        <input style="color:black;" type="number" name="price"></br>


        <label for="code">Course Code</label></br>
        <input style="color:black;" type="text"  id="code" name="code" placeholder="Course Code"></br>


        <label for = "selectCondition">the Book Condition</label>
        </br><select  name="cond" id="cond">
            <option value="d">Default</option>
            <option value="mint">Mint</option>
            <option value="very good">Very Good</option>
            <option value="good">Good</option>
            <option value="fair">Fair</option>
            <option value="poor">Poor</option>
        </select></br></br>



    <button type="submit" class="btn btn-info">Search</button></br></br>
</form>
</div>