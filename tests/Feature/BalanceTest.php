<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class BalanceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function showBalance()
    {
        $data = [
            'id' => '1',
        ];

        $this->get(route('accounts.balance.show'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
            );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function registerBalance()
    {
        $data = [
            'value' => 100.00,
            'account_id' => '1'
        ];

        $expected = [
            'data' => [
                'value' => 100.00,
                'account_id' => '1'
            ]
        ];

        $this->post(route('accounts.balance.store'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJsonFragment($expected);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function updateBalance()
    {
        $data = [
            'id' => '1',
            'data' => [
                'value' => 200.00,
                'account_id' => '1'
            ]
        ];

        $expected = [
            'data' => [
                'value' => 200.00,
                'account_id' => '1'
            ]
        ];

        $this->post(route('accounts.balance.update'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJsonFragment($expected);
    }
}
