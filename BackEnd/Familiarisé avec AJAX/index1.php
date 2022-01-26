<?php
//get the q parameter from URL
$nouveau=$_GET["q"];
$ancien="Bonjour,bienvenue ,nous somme 2014";
$filepath="index.html";
 $fp = fopen($filepath,'r');
 $fichier=fread($fp,filesize($filepath));
 $str = str_replace($ancien,$nouveau, $fichier);
fclose($fp);
$fp=fopen($filepath,'w');
 fwrite($fp,$str);
fclose($fp);
echo " <   script   language = 'javascript' 
type = 'text/javascript' > "; 
echo "window.location.reload()";
echo " <  /script > "; 
?>