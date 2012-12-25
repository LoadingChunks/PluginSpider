<?php
require_once("lib/global.php");

$pluginfiles = scandir($cfg['directories']['configs']['plugins']);

$plugins = array();
$todo = array('ichat');

foreach($pluginfiles as $p)
{
    if(!in_array(str_replace(".yml", "", $p), $todo))
        continue;

    $plugins[] = $yaml->parse(file_get_contents($cfg['directories']['configs']['plugins'] . "/" . $p));
}

foreach($plugins as $plugin)
{
    $feed = $plugin['modules']['feed']['class']::Process($plugin);
    $file = $plugin['modules']['downloader']['class']::Download($feed, $plugin);
    $plugin['modules']['processor']['class']::Process($file, $plugin);
}
?>
