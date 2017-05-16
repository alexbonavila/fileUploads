<?php

namespace Tests\Browser;

use Faker\Factory;
use Illuminate\Http\UploadedFile;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileControllerTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_user_are_created_ok()
    {
        $faker=Factory::create();

        $user = [
            'name' => $name=$faker->name,
            'email' => $email=$faker->unique()->safeEmail,
            'password' => $password=$faker->password,
            'file' => UploadedFile::fake()->image('guapo.png')
        ];

        $this->browse(function (Browser $browser) use ($user){
            $browser->visit('/profile')
                ->type('name', $user["name"])
                ->type('email', $user["email"])
                ->type('password', $user["password"])
                ->attach('file', __DIR__.'/photos/guapo.png')
                    ->assertSee('Laravel');
        });
    }
}
