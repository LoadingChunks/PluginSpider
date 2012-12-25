<?php
class Feed {
    function Process($plugin)
    {
        $url = $plugin['modules']['feed']['data'];

        $rss = file_get_contents($url);

        $item = Feed::Parse($rss);
        return (String)$item->link;
    }

    function Parse($rss) {
        $xml = new SimpleXmlElement($rss);
        $item = $xml->channel->item[0];
        return $item;
    }
}
?>
