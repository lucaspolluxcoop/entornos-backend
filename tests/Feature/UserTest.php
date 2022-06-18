<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Laravel\Passport\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_sign_in()
    {
        $clientSecret = Client::find(2)->secret;

        $credentials = [
            "grant_type"    => "password",
            "client_id"     => 2,
            "client_secret" => $clientSecret,
            'username'      => 'test@tunota.com',
            'password'      => '12341234'
        ];

        $response = $this->post('/oauth/token',$credentials);

        $response->assertJsonStructure(['token_type','expires_in', 'access_token', 'refresh_token']);

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_register()
    {
        $newClient = [
            'email'     => 'test@test.com',
            'username'  => 'testtest',
            'password'  => '12341234'
        ];

        $response = $this->post('/api/users',$newClient);

        $this->assertDatabaseHas('users',['email' => $newClient['email']]);

        $response->assertStatus(200);
    }
}