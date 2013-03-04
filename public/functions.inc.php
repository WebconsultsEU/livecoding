<?php
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
/**
 * Get´s the extension of a File
 * @param type $file 
 */
function getFileExtension($file) {
   $arrayParts = explode(".", $file);
   $result = array_pop($arrayParts);
   return $result;
}
/**
 * Gets Syntax Highlighter Brush for display
 * @param type $file
 * @return string|null 
 */
function fileGetBrush($file) {
    $fileExtension = getFileExtension($file);
    //defines available brushes for SyntaxHighlighting
    // KEY is the file ending value the brush
    $brushes = array("php" => "php",
                     "html" => "html",
                     "sql" => "sql");
    //wenn die fileExtension in unseren brushes enthalten ist
    if(array_key_exists($fileExtension, $brushes)) {
        //im erfolgsfall wird durch return aus der funktion gesprungen
        return $brushes[$fileExtension];
    }

    //kein brush gefunden ? dann kommt ein download.
    return null;
    
}
/**
 * Get Icon for a specific file type
 * @param type $file
 * @return string 
 */
function fileGetIcon($file) {
    $icons = array("php" => "/images/icons/chrystal/mimetypes/php.png",
                  "js" => "/images/icons/chrystal/mimetypes/source.png",
                  "html" => "/images/icons/chrystal/mimetypes/html.png",
                  "pdf" =>  "/images/icons/chrystal/mimetypes/pdf.png",
                  "default" =>  "/images/icons/chrystal/mimetypes/misc.png");
     
     $fileExtension = getFileExtension($file);
    
     if(array_key_exists($fileExtension, $icons)) {
        //im erfolgsfall wird durch return aus der funktion gesprungen
        return $icons[$fileExtension];
    }
    //kein brush gefunden ? dann kommt ein download.
    return $icons['default'];
    
}
