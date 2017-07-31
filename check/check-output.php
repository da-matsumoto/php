<?php require 'header.php';?>
<?php
if(isset($_REQUEST['mail'])){
    echo 'お買い得情報をお送りさせていただきます';
} else {
    echo 'お買い得情報のメールはお送りいたしません';
}
?>
<?php require 'footer.php';?>