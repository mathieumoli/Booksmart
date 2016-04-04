<?php
/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 28/03/2016
 * Time: 17:49
 */?>
<form action="<?php echo $siteurl.'/stripe_payment/checkout/'.$sum;?>" method="POST">
<script src="https://checkout.stripe.com/checkout.js"
class="stripe-button"
data-key="pk_test_tTFVZGf2y1OyIopL3ELkwqpO"
data-description="BookSmart Bill <?php echo  $_SESSION['bill'];?>€"
data-amount="<?php echo ($sum*100);?>"
data-locale="EN"
data-currency="EUR"></script>
</form>
