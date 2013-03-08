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




 $dir = substr($fileName,0, strrpos($fileName, "/"));

 
 $brush = fileGetBrush($fileName);
 header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$datei");
header("Content-Transfer-Encoding: binary"); 

            echo file_get_contents($filePath);
        ?>
