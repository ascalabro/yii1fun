<?php
class GoogleNewsFeed {

    public static function fetchRssFeed($term) {
        $feedxml = simplexml_load_file("https://news.google.com/news/feeds?output=rss&q=" . $term);
        return $feedxml;
    }

}