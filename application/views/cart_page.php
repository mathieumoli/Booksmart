<?php if(base_url()=="http://www.booksmart.ga"){$siteurl="http://www.booksmart.ga:8888/index.php";
}else{
    $siteurl="http://localhost:8888/index.php";
}
if ($cartDisp):

    echo "<h1>CART</h1>";
    echo "<table>";
    $sum=0;
        foreach ($cartDisp->result() as $book) {
        $sum+=$book->price;
        echo "<tr><td>" . $book->title . " by " . $book->author . "</td></tr>";
        echo "<tr><td>" . $book->coursecode . "</td><td>" . $book->price . "€</td></tr>";
        echo "<tr><td ><a type=\"button\" value=\"" . $book->id . "\" href=\"" . $siteurl . "/cartcontroller/delete/" . $book->id . "\" class=\"btn btn-danger\">Delete !</a><td><a  class=\"btn btn-info\" role=\"button\" value=\"" . $book->id . "\" href=\"" . $siteurl . "/mainpage/book/" . $book->id . "\" >More Details</a></td></td></tr>";
        }
        echo "</table><br/><br/>";
        echo "<h1>AMOUNT:</h1>".$sum;
        echo "<a type=\"button\" class=\"btn btn-info\">Pay the Bill !</a>";?>

<?php else: ?>
<h1> YOUR CART IS EMPTY :'(</h1>
<?php endif; ?>