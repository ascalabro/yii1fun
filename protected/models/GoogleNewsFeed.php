<?php
class GoogleNewsFeed {

    public static function fetchRssFeed($term = null) {
        $term = $term ? $term : Yii::app()->params['newsKeywords'];
        $feedxml = simplexml_load_file("https://news.google.com/news/feeds?output=rss&q=" . $term);
        return $feedxml;
    }

}