<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test users are created ok
     *
     * @return void
     */
    public function testUsersCreatedOk()
    {
        //prepare
        Storage::fake('local');

        $faker = Factory::create();
        $user = [
            'name' => $name=$faker->name,
            'email' => $email=$faker->unique()->safeEmail,
            'password' => $password=bcrypt('secret'),
            'file' => UploadedFile::fake()->image('guapo.png')
        ];

        $auth_user=Factory(User::class)->create();

        //execute
        $response = $this->actingAs($auth_user, 'api')->json('post','api/v1/user', $user);

        //assert
        $response->assertStatus(200)
        ->assertJson(['created'=> true]);

        $this->assertDatabaseHas('users',[
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'file' => 'lameva/foto.png'
        ]);

        Storage::disk('local')->assertExists('guapo.png');
    }
}
