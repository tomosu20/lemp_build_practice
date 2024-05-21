<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Database\Events\TransactionBeginning;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Test;

class PostControllerTest extends TestCase
{
    use DatabaseTransactions;
    private $user;

    protected function setUp()
    {
        parent::setUp();

        // Arrange（準備）
        $this->user = factory(User::class)->create([
            'password' => bcrypt('secret'),
        ]);
        $response = $this->post('login', [
            'email' => $this->user->email,
            'password' => 'secret',
        ]);
    }

    public function testGetIndex()
    {
        // Arrange（準備）

        // Act（実行）
        $response = $this->get(route('post.index'));

        // Assert（検証）
        $response->assertStatus(200);
        $response->assertViewIs('post.index');
        $response->assertSeeText('Posts');
    }

    public function testCreatePost()
    {
        // Arrange（準備）

        // Act（実行）
        $response = $this->get(route('post.create'));

        // Assert（検証）
        $response->assertStatus(200);
        $response->assertViewIs('post.create');
        $response->assertSeeText('Add');

        // Arrange（準備）
        $postData = [
            'title' => 'test-title',
            'content' => 'test-content',
            'user_id' => $this->user->id,
        ];

        // Act（実行）
        $response = $this->post(route('post.store', $postData));

        // Assert（検証）
        $response->assertStatus(302)->assertRedirect(route('post.index'));
    }

    public function testShowPost()
    {
        // Arrange（準備）
        $post = factory(Post::class)->create();

        // Act（実行）
        $response = $this->get(route('post.show', $post));

        // Assert（検証）
        $response->assertStatus(200);
        $response->assertViewIs('post.show');
        $response->assertSeeText($post->title);
        $response->assertSeeText($post->content);
    }

    public function testEditAndUpdatePost()
    {
        // Arrange（準備）
        $post = factory(Post::class)->create();

        // Act（実行）
        $response = $this->get(route('post.edit', $post));

        // Assert（検証）
        $response->assertStatus(200);
        $response->assertViewIs('post.edit');


        // Arrange（準備）
        $updatePost = [
            'id' => $post->id,
            'title' => 'test-title',
            'content' => 'test-content',
        ];

        // Act（実行）
        $response = $this->put(route('post.update', $updatePost));

        // Assert（検証）
        $response->assertStatus(200);
        $response->assertViewIs('post.show');
        $response->assertSeeText($updatePost['title']);
        $response->assertSeeText($updatePost['content']);
    }

    public function testDeletePost()
    {
        // Arrange（準備）
        $post = factory(Post::class)->create();

        // Act（実行）
        $response = $this->get(route('post.show', $post));
        $response->assertStatus(200);
        $response = $this->delete(route('post.delete', $post));

        // Assert（検証）
        $response->assertStatus(200);
        $this->get(route('post.show', $post))->assertStatus(404);
        $response->assertViewIs('post.index');
        $response->assertViewMissing($post->id);
    }
}
