<?PHP 
require "../config.inc.php";

$fileName = $_GET['file'];


//File Validierung des Directorys
if(!preg_match("([a-zA-Z0-9\/\-_]*)", $fileName) || stristr($fileName, "..")) {
    throw new \Exception('Wrong File Path');   
    exit;
}
$filePath = CODE_BASE_PATH.$fileName;
if(!file_exists($filePath)) {
    throw new \Exception('File does not exits');
    exit;
}


include "header.inc.php";

 $dir = substr($fileName,0, strrpos($fileName, "/"));
 
?>
<a href="dir.php?dir=<?php echo $dir; ?>">Back <?php echo $dir; ?></a><br />
        <pre class="brush: php"> 
        <?php
            echo file_get_contents($filePath);
        ?>
        </pre>

 <?php
        include "footer.inc.php";
 ?>