<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class apiTest extends TestCase
{

    /**
     * @test
     * @group api
     * @group video
     * comand line : vendor/bin/phpunit --group=api
     */
    public function jsonTest()
    {
        //tdd
        // arrange
        $data = [
            [
                'channelTitle',
                'title',
                'video_id',
                'description'
            ],
        ];

        // act
        $response = $this->get(route('api.get.videos'));

        // assert
        $response->assertStatus(200);
//        $response->assertStatus(302);
        $response->assertJsonStructure($data);

    }
}
