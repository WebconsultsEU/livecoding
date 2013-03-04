<?PHP 
require "../config.inc.php";
require "functions.inc.php";


$dir = $_GET['dir'];


//File Validierung des Directorys
if(!preg_match("([a-zA-Z0-9\/\-_]*)", $dir) || stristr($dir, "..")) {
    throw new \Exception('Wrong Directory Path '.$dir);   
    exit;
}

$directoryPath = CODE_BASE_PATH.$dir;
if(!file_exists($directoryPath)) {
    throw new \Exception('Directory does not exits:'.$directoryPath);
    exit;
}
if(!is_dir($directoryPath)) {
    throw new \Exception('not a Directory:'.$directoryPath);
    exit;
}


$files = scandir($directoryPath);





include "header.inc.php";
?>

        <table>
            <tr><td>Files</td></tr>
        <?php
        
        foreach($files as $file) {
            echo "<tr>";
            if($file == "." ) {
                
            } elseif($file=="..") { 
                $dirup = substr($dir,0, strrpos($dir, "/"));               
                echo "<td> <a href=\"".getDirectoryLink($dirup)."\"><img src=\"/images/icons/chrystal/filesystems/folder_blue.png\" />$file</a></td>";                
            } elseif(is_dir($directoryPath."/".$file)) {                
                echo "<td><img src=\"/images/icons/chrystal/filesystems/folder_yellow.png\" /> <a href=\"".getDirectoryLink($dir."/".$file)."\">$file</a></td>";                
            }else {                
                echo "<td><a href=\"".getFileLink($dir."/".$file)."\"><img src=\"".fileGetIcon($file)."\" />$file</a></td>";                
            }
            echo "</tr>";
        }
        ?>
        </table>
<?php include "footer.inc.php"; ?>