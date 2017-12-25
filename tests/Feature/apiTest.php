<?php

namespace Tests\Feature;

use App\post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase; // using DB
use Illuminate\Foundation\Testing\DatabaseMigrations; // not using DB

class apiTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group api
     * @group video
     * comand line : vendor/bin/phpunit --group=api
     * using this phpDocs can help function name no-need testjsonTest in this way
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


    public function testpostTest()
    {
        //tdd
        // arrange
        factory(post::class, 5)->create();
        factory(post::class, 5)->create(['active' => 2]);

        $data = [
            [
                'active',
                'content',
                'user_id'
            ],
        ];

        // act
        $response = $this->get(route('api.get.datas'));

        // assert
        $response->assertStatus(200);
//        $response->assertStatus(302);
        $response->assertJsonStructure($data);

    }
}
