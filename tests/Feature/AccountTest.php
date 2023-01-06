<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function createAccount()
    {
        $data = [
            'name' => 'Gustavo',
            'cpf' => '33120354147'
        ];

        $expected = [
            'data' => [
                'name' => 'Gustavo',
                'cpf' => '33120354147'
            ];
        ];

        $this->post(route('accounts.store'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJson($expected);
    }
}
