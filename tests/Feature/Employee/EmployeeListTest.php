<?php

namespace Tests\Feature\Employee;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_paginated_list_of_employees()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('employees'))
            ->assertStatus(200);
    }
}
