<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class YoutubeSearchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *Test if returning content
     */
    public function testGetYoutubeVideos()
    {
        $response = $this->get('/api/youtube?search=felipe',['Accepted' => "application/json"]);
        $data = $response->getContent();

        $this->assertNotEmpty($data);

    }

    public function testEmptyParameter()
    {
        $response = $this->get('/api/youtube?search=',['Accepted' => "application/json"])
            ->assertStatus(400);
    }


}
