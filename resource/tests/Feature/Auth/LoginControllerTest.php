<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class LoginControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        // Arrange（準備）
        $user = factory(User::class)->create([
            'password' => bcrypt('secret'),
        ]);

        // Assert（検証）
        $this->get('home')
            ->assertStatus(302)
            ->assertRedirect('login');
        $this->assertFalse(Auth::check());

        // Act（実行）
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        // Assert（検証）
        $this->assertTrue(Auth::check());
        $response->assertRedirect('home');
    }
}
