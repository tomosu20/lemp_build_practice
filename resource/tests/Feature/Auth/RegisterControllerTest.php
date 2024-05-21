<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        // Arrange（準備）
        $createUser = [
            'name' => 'testUser',
            'email' => 'test@sample.com',
            'password' => 'secret',
        ];

        // Act（実行）
        $response = $this->post('register', $createUser);

        // Assert（検証）
        $response->assertStatus(302)
            ->assertRedirect('');
    }
}
