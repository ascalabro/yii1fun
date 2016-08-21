<?php

class NasaImageFeed extends CFormModel {

    const NASA_IMAGE_RSS_URL = "http://www.nasa.gov/rss/dyn/image_of_the_day.rss";

    /**
     * @param int $howMany
     * @return array
     */
    public static function getCarouselImageUrls($howMany = 3) {
        $imageUrls = array();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => self::NASA_IMAGE_RSS_URL,
        ));
        $resp = curl_exec($curl);
        if (!curl_exec($curl)) {
            curl_close($curl);
            return $imageUrls;
        }
        $xml = simplexml_load_string($resp);
        // There's ~60 images that come back in the feed. Choose a random one from the first 50
        $used = array();
        for($i = 0; $i <= $howMany; $i++) {
            $r = rand(0,50);
            if (in_array($r, $used)) {
                $r = rand(0,50);
            }
            $used[] = $r;
            $imageUrls[] = $xml->channel->item[$r]->enclosure->attributes()->url;
        }
        return $imageUrls;


    }

}