<?php

namespace Tests\Feature\User;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(200)
            ->assertJson([
                'status' => '200',
                'message' => 'User registered successfully',
            ])
            ->assertJsonStructure([
                'data' => ['user', 'access_token'],
            ]);

        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    public function test_register_user_with_invalid_data()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'invalid_email',
            'password' => 'short',
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(400)
            ->assertJsonStructure([
                'error' => ['email', 'password'],
            ]);

        $this->assertDatabaseMissing('users', ['name' => 'John Doe']);
    }
}
