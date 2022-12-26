<?php

namespace Tests\Feature\Employee;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_employee()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
                    ->withSession(['banned' => false])
                    ->followingRedirects()
                    ->post('employee-store',[
                            'first_name' => 'asela',
                            'last_name' => 'dasko'
                    ])
                    ->assertStatus(200);
    }
}
