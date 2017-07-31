<?php require 'header.php';?>
<?php
switch ($_REQUEST['meal']){
    case '和食':
        echo '焼き魚';
        break;
    case '洋食':
        echo 'オムレツ';
        break;
    case '中華':
        echo '春巻き';
        break;
}
echo 'をご提供いたします'
?>
<?php require 'footer.php';?>