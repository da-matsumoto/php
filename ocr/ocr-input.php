<?php require 'header.php';?>
<p>変換したいファイルを指定してください。</p>
<form action="ocr-output.php" method="post" enctype="multipart/form-data">
    <p><input type="file" name="file"></p>
    <p><input type="submit" value="変換"></p>
</form>
<?php require 'footer.php';?>