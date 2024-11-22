<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function user_can_log_in_with_valid_credentials()
    {
        // Arrange: Create a user
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Act: Attempt to log in
        $response = $this->post('/login/post', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Assert: Check if login is successful
        $response->assertRedirect('/'); // Assuming the user is redirected after login
        $this->assertAuthenticatedAs($user);
    }
}
