<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\User;
use Auth;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    // /**
    //  * A basic test example.
    //  *
    //  * @return void
    //  */
    // public function testBasicTest()
    // {
    //     // $response = $this->get('/');

    //     // $response->assertStatus(200);

    // }

    /**
     * @test
     */
    public function login_view()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function unauthenticated_user_cannot_view_home()
    {
        $response = $this->get('products/1/reviews/create');

        $response->assertRedirect('login');
    }
    /**
     * @test
     */
    public function valid_user_can_login()
    {
        // Storage::fake('app/public/avatars');

        // $user = User::create([
        //         'name' => 'test_user',
        //         'email' => 'testuser@test.com',
        //         'password' => bcrypt('testtest'),
        //         'avatar' => UploadedFile::fake()->image('avatar.jpg')
        //     ]);

        // ユーザーを1つ作成
        $user = factory(User::class)->create([
            'password'  => bcrypt('testtest')
        ]);

        // まだ、認証されていないことを確認
        $this->assertFalse(Auth::check());

        // ログインを実行
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'testtest'
        ]);

        // 認証されていることを確認
        $this->assertTrue(Auth::check());

        // ログイン後にホームページにリダイレクトされるのを確認
        $response->assertRedirect('home');
    }
}
