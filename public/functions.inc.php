<?php
/**
 * Returns the URL to a directory view  
 * @return String
 */
function getDirectoryLink($file) {
    return "dir.php?dir=".$file;
}
/**
 * Gets the Link to a specific file
 * 
 * @param type $file
 * @return type 
 */
function getFileLink($file) {
    //@TODO Download Link for not vieable files that are all files containing text
    return "file.php?file=".$file;
}

/**
 * Gets the Link to a specific file Download
 * 
 * @param type $file
 * @return type 
 */
function getDownloadLink($file) {
    //@TODO Download Link for not vieable files that are all files containing text
    return "download.php?file=".$file;
}

/**
 * Gets the extension of a file
 * 
 * @param type $file 
 */
function getFileExtension($file) {
   $arrayParts = explode(".", $file);
   $result = array_pop($arrayParts);
   return $result;
}
/**
 * Gets Syntax Highlighter Brush Type for display
 * the Syntaxighlighter is a js tool supporting syntax highlighting and is called by the html tag
 * <pre class="brush: syntaxHighlighterType">
 * 
 * @param type $file
 * @return string|null 
 */
function fileGetBrush($file) {
    $fileExtension = getFileExtension($file);
    //defines available brushes for SyntaxHighlighting
    // KEY is the file ending value the brush
    $brushes = array("php" => "php",
                     "html" => "xml",
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
