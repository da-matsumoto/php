<?php require 'header.php';?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
/*データベースを設定*/
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
$sql=$pdo->prepare('select * from product where name like ?');
$sql->execute(['%'.$_REQUEST['keyword'].'%']);
foreach($sql->fetchAll() as $row){
    echo '<tr>';
    echo '<td>', $row['id'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
</table>
<?php require 'footer.php';?>