<?php require 'header.php';?>
<?php
$price=$_REQUEST['price'];
$count=$_REQUEST['count'];
const TAX=1.08;
echo $price, '円×';
echo $count, '個＝';
echo $price*$count, '円';
?>
<?php require 'footer.php';?>