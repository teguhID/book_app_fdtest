<?php

namespace Tests\Feature;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

use Tests\TestCase;

use App\Models\User;
use App\Models\Books;

class FeatureTest extends TestCase
{
    public function test_user_registration(): void
    {
        $response = $this->postJson('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $user = User::where('email', 'john@example.com')->first();

        $this->assertNotNull($user);

        $user->delete();

        $response->assertStatus(201);
    }

    public function test_verification_email_is_sent()
    {
        Notification::fake();

        $user = User::where('email', 'dummy_4@gmail.com')->first();

        if (!$user) {
            $this->markTestSkipped('User with email dummy_4@gmail.com not found in the database.');
        }

        $user->notify(new VerifyEmail);

        Notification::assertSentTo($user, VerifyEmail::class);
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $response = $this->postJson('/login', [
            'email' => 'dummy_4@gmail.com',
            'password' => 'pass',
        ]);

        $response->assertStatus(200);
    }

    public function test_can_get_books_list_with_authentication()
    {
        $user = User::where('email', 'dummy_4@gmail.com')->first();

        if (!$user) {
            $this->markTestSkipped('User with email dummy_4@gmail.com not found in the database.');
        }

        $response = $this->actingAs($user)->get(route('books'));

        $response->assertStatus(302);
    }
}
