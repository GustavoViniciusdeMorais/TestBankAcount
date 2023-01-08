<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Lib\Traits\AuthForTest;

class UserTest extends TestCase
{
    use AuthForTest;

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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_GetAccount()
    {
        $this->testAuth();

        $expected = [
            'id' => 1,
            'name' => 'Gustavo'
        ];

        $this->get(route('accounts.show', ['account' => '1']))
            ->dump()
            ->assertStatus(200)
            ->assertJsonFragment($expected);
    }
}
