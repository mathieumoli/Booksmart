<?php
/**
 * Created by PhpStorm.
 * User: mathieumolinengo
 * Date: 07/03/2016
 * Time: 14:42
 */

if(base_url()=="http://www.booksmart.ga"){$siteurl="http://www.booksmart.ga:8888/index.php";
}else{
    $siteurl="http://localhost:8888/index.php";
}?>
<table class="tabdom">
    <tr>
        <td class="domain">
            <a href="<?php echo $siteurl."/mainpage/displayBookByDomain/7"?>">
            <i class="fa fa-usd fa-3x"></i>
            </br>
            Business
                </a>
        </td>
        <td class="domain">
            <a href="<?php echo $siteurl."/mainpage/displayBookByDomain/1"?>">
            <i class="fa fa-keyboard-o fa-3x"></i>
            </br>Computer Science
                </a>
        </td>
        <td class="domain">
            <a href="<?php echo $siteurl."/mainpage/displayBookByDomain/2"?>">
            <i class="fa fa-user-md fa-3x"></i>
            </br>
            Medicine
            </a>
        </td>
        <td class="domain">
            <a href="<?php echo $siteurl."/mainpage/displayBookByDomain/3"?>">
            <i class="fa fa-pencil-square fa-3x"></i>
            </br>
            Art
            </a>
        </td>
        <td class="domain">
            <a href="<?php echo $siteurl."/mainpage/displayBookByDomain/4"?>">
            <i class="fa fa-globe fa-3x"></i>
            </br>
            Geography
            </a>
        </td>
        <td class="domain">
            <a href="<?php echo $siteurl."/mainpage/displayBookByDomain/5"?>">
            <i class="fa fa-book fa-3x"></i>
            </br>
            Literature
            </a>
        </td>
        <td class="domain" >
            <a href="<?php echo $siteurl."/mainpage/displayBookByDomain/6"?>">
            <i class="fa fa-headphones fa-3x"></i>
            </br>
            Music
            </a>
        </td>
    </tr>
</table>


