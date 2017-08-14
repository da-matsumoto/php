<?php require 'header.php';?>
<?php
/*データベースを設定*/
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
/*表示*/
foreach ($pdo->query('select * from product') as $row){
    echo '<p>';
    echo $row['id'], ':';
    echo $row['name'], ':';
    echo $row['price'];
    echo '</p>';
    /*もしくは*/
    /*echo "<p>$row[id]:$row[name]:$row[price]</p>";*/
}
?>
<?php require 'footer.php';?>