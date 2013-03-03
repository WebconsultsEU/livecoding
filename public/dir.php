<?PHP 
require "../config.inc.php";

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

/**
 * Returns the URL to a directory view  
 * @return String
 */
function getDirectoryLink($file) {
    return "dir.php?dir=".$file;
}

function getFileLink($file) {
    return "file.php?file=".$file;
}



include "header.inc.php";
?>

        <table>
            <tr><td>Files</td></tr>
        <?php
        foreach($files as $file) {
            if($file == "." ) {
                
            } elseif($file=="..") { 
                $dirup = substr($dir,0, strrpos($dir, "/"));
                echo "<tr>";
                echo "<td>[FOLDER] <a href=\"".getDirectoryLink($dirup)."\">$file</a></td>";
                echo "</tr>";
            } elseif(is_dir($directoryPath."/".$file)) {
                echo "<tr>";
                echo "<td>[FOLDER] <a href=\"".getDirectoryLink($dir."/".$file)."\">$file</a></td>";
                echo "</tr>";
            }else {
                echo "<tr>";
                echo "<td>[FILE] <a href=\"".getFileLink($dir."/".$file)."\">$file</a></td>";
                echo "</tr>";
            }
        }
        ?>
        </table>
<?php include "footer.inc.php"; ?>