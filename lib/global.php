<?php
require_once("lib/vendor/yaml/lib/sfYamlParser.php");
$yaml = new sfYamlParser();

/* Grab config */
$cfg = $yaml->parse(file_get_contents("cfg/core/config.yml"));

function __autoload($class)
{
    global $cfg;
    if(file_exists($cfg['directories']['modules']['feeds'] . "/" . $class . ".class.php"))
        include $cfg['directories']['modules']['feeds'] . "/" . $class . ".class.php";
    elseif(file_exists($cfg['directories']['modules']['processors'] . "/" . $class . ".class.php"))
        include $cfg['directories']['modules']['processors'] . "/" . $class . ".class.php";
    elseif(file_exists($cfg['directories']['modules']['downloaders'] . "/" . $class . ".class.php"))
        include $cfg['directories']['modules']['downloaders'] . "/" . $class . ".class.php";;
}
?>
