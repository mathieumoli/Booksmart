<?php
/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 07/03/2016
 * Time: 13:48
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<script>$(function() {
$( "#slider-range" ).slider({
range: true,
min: 0,
max: 100,
values: [ 5, 50 ],
slide: function( event, ui ) {
$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
}
});
$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
" - $" + $( "#slider-range" ).slider( "values", 1 ) );
});</script>
<form style="text-align: center;padding-left: 10px;padding-right: 10px; color: floralwhite;">

        <label for="bookTitle">Title</label></br>
        <input type="text" id="bookTitle" placeholder="Title"></br>


        <label for="author">Author</label></br>
        <input type="text"  id="author" placeholder="Author"></br>


        <label for="subject">Subject</label></br>
        <input type="text"  id="subject" placeholder="Subject"></br>


        <label for="amount">Price range:</label></br>
        <input type="text" id="amount" readonly style="border:0; color:black; font-weight:bold;"></br></br>
        <div id="slider-range"></div></br>


        <label for="code">Course Code</label></br>
        <input type="text"  id="code" placeholder="Course Code"></br>


        <label for = "selectCondition">the Book Condition</label>
        </br><select >
            <option>Default</option>
            <option value="mint">Mint</option>
            <option value="very good">Very Good</option>
            <option value="good">Good</option>
            <option value="fair">Fair</option>
            <option value="poor">Poor</option>
        </select></br></br>



    <button type="submit" class="btn btn-info">Search</button></br></br>
</form>
