<?PHP 
require "../config.inc.php";
require "functions.inc.php";

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

 
 $brush = fileGetBrush($fileName);
?>
<a href="dir.php?dir=<?php echo $dir; ?>">
    <img src="/images/icons/chrystal/filesystems/folder.png" />.. Back </a><br />
        
<h3>File Content</h3>
File: <?php echo $filePath; ?>
<hr />

<pre <?php 
//wenn für die datei ein SyntaxHightlighter Definiert ist soll hier eine CSS klasse ausgegeben werden
if($brush) { 
    echo "class=\"brush: $brush\""; 
}
?> >
        <?php
            echo file_get_contents($filePath);
        ?>
        </pre>
<?php
        include "footer.inc.php";
?>