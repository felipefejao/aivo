<?php

namespace App\Services;


use Google_Client;
use Google_Service_YouTube;

class YoutubeService
{
    /**
     * @var Google_Service_YouTube
     */
    protected Google_Service_YouTube $youtube;

    /**
     * YoutubeService constructor.
     */
    public function __construct()
    {
        $client = new Google_Client();
        $client->setDeveloperKey(getenv('DEVKEY'));

        $this->youtube = new Google_Service_YouTube($client);
    }

    /**
     * @param String $query
     * @return array
     */
    public function search(String $query)
    {
        $searchResponse = $this->youtube->search->listSearch('id,snippet', array(
            'q' => $query,
            'maxResults' => 10,
            'order' => 'title',
            'type' => 'video'
        ));

        $arr = [];
        foreach($searchResponse['items'] as $item){

            $arr[] = [
                'published_at' => $item['snippet']['publishedAt'],
                'id' => $item['id']['videoId'],
                'title' => $item['snippet']['title'],
                'description' => $item['snippet']['description'],
                'thumbnail' => $item['snippet']['thumbnails'],
                'extra' => ['url' => 'https://www.youtube.com/watch?v=' . $item['id']['videoId']] ,
            ];
        }

        return $arr;
    }


}
