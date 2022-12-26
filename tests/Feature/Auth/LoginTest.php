<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_user_login_using_email_password()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }
}
