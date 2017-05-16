<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{
    /**
     * Test users are created ok
     *
     * @return void
     */
    public function testUsersCreatedOk()
    {
        //prepare
        $faker = Factory::create();
        $user = [
            'name' => $name=$faker->name,
            'email' => $email=$faker->unique()->safeEmail,
            'password' => $password=bcrypt('secret')
        ];
        //execute

        //assert

        $response = $this->json('post','api/v1/user',['name' => 'Sally']);

        $response->assertStatus(200)
        ->assertJson(['created'=> true]);

        $this->assertDatabaseHas('users',[
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }
}
