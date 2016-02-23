<?php
/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 22/02/2016
 * Time: 12:08
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('facebook');
//COOKIE CREATION duration : 1h

$cookie_id = "booksmart_id";
$cookie_value = $user_profile['id'];
setcookie($cookie_id, $cookie_value, time() + 3600); // 86400 = 1 day

$cookie_name = "booksmart_name";
$cookie_value = $user_profile['name'];
setcookie($cookie_name, $cookie_value, time() + 3600); // 86400 = 1 day

?>

<?//php foreach ($user_profile as $item):?>
<?//php echo $item ?>
<?//php endforeach;?>
<?//php echo $user_profile['name'] ?>

<?//php echo $user_profile['school'] ?>
<div class="container">

    <form class="form-signin" role="form">
        <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 140px; height: 140px;">
                   <?php var_dump($user_profile) ?>

                    <!-- IT S WORKING-->
                    <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <h2 class="form-signin-heading">Login with Facebook</h2>
            <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Login</a>
        <?php endif; ?>
        <a href="https://github.com/puneetkay/Facebook-PHP-CodeIgniter" class="btn btn-lg btn-success btn-block" target="_blank" role="button">View Source on Github</a>

        <div class="footer">
            <p>With <i class="fa fa-heart"></i> by <a href='http://puneetk.com/' target="_blank" title="Puneet Kalra">Puneet Kalra</a>.</p>
        </div>
    </form>
</div> <!-- /container -->