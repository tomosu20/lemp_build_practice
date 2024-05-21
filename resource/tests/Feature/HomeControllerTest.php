<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        // Arrange（準備）
        $user = factory(User::class)->create([
            'password' => bcrypt('secret'),
        ]);
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        // Act（実行）
        $response = $this->get('home');

        // Assert（検証）
        $response->assertStatus(200);
    }
}
