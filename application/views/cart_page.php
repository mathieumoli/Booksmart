<?php if(base_url()=="http://www.booksmart.ga"){$siteurl="http://www.booksmart.ga:8888/index.php";
}else{
    $siteurl="http://localhost:8888/index.php";
}
if (isset($cartDisp)):

    echo "<h1 class=\"heading-cart\">CART</h1>";
    echo "<div class=\"table-responsive\"><table class=\"table table-striped\"><tbody>";
    echo "<tr><th>Title</th><th>Author</th><th>CourseCode</th><th>Price</th><th>Delete it !</th><th>More Details</th></tr>";
    $sum=0;
        foreach ($cartDisp->result() as $book) {
        $sum+=$book->price+0.1*$book->price;
        echo "<tr><td> " . $book->title . "</td><td>  " . $book->author . "</td>";
        echo "<td> " . $book->coursecode . "</td><td> " . $book->price . "€</td>";
        echo "<td><a type=\"button\" value=\"" . $book->id . "\" href=\"" . $siteurl . "/cartcontroller/delete/" . $book->id . "\" class=\"btn btn-danger\">Delete !</a></td><td><a  class=\"btn btn-info\" role=\"button\" value=\"" . $book->id . "\" href=\"" . $siteurl . "/mainpage/book/" . $book->id . "\" >More Details</a></td></tr>";
        }
        echo "</tbody></table></div><br/><br/>";
        echo "<h1>TOTAL: ".$sum."€</h1><br>";
        echo "10% is for the maintenance, the server and Jack who tried to debug it day & night";
        $_SESSION['bill']=$sum;
    ?>
<?php include("stripe.php");?>

<?php else: ?>
<h1> YOUR CART IS EMPTY :'(</h1>
<?php endif; ?>