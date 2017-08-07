<?php require 'header.php';?>
<?php
echo 'ふりがなは「', mb_convert_kana($_REQUEST['furigana']), '」です。';
?>
<?php require 'footer.php';?>