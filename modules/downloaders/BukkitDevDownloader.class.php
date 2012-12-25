<?php
require_once('lib/vendor/simple_html_dom.php');

class BukkitDevDownloader extends Downloader {
    function Download($url, $plugin) {
        $html = file_get_html($url);

        $downloadurl = $html->find('.user-action-download a',0)->href;

        $t = time();

        if(!is_dir('tmp/' . $plugin['name']))
            mkdir('tmp/' . $plugin['name']);

        file_put_contents('tmp/' . $plugin['name'] . '/' . $t . '.tmp', file_get_contents($downloadurl));

        return 'tmp/' . $plugin['name'] . '/' . $t . '.tmp';
    }
}
?>
