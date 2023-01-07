<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        $data = [
            'name' => 'Gustavo',
            'cpf' => '33120354147',
            'email' => 'gustavo@test.com',
            'password' => '123456',
            'c_password' => '123456'
        ];

        $expected = [
            'name' => 'Gustavo',
            'cpf' => '33120354147',
            'email' => 'gustavo@test.com'
        ];

        $this->post(route('register'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJsonFragment($expected);
    }
}
