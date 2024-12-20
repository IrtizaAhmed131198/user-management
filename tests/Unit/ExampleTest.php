<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

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
