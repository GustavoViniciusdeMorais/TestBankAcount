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
    public function test_showBalance()
    {
        $data = [
            'balance' => '1',
        ];

        $expected = [
            'account_id' => 1
        ];

        $this->get(route('balances.show', $data))
            ->dump()
            ->assertStatus(200)
            ->assertJsonFragment($expected);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_registerBalance()
    {
        $data = [
            'value' => 100.00,
            'account_id' => '1'
        ];

        $expected = [
            'value' => 100.00,
            'account_id' => '1'
        ];

        $this->post(route('balances.store'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJsonFragment($expected);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_updateBalance()
    {
        $data = [
            'value' => 200.00,
            'account_id' => '1'
        ];

        $expected = [
            'value' => 200.00,
            'account_id' => '1'
        ];

        $this->put(
                route('balances.update', ['balance' => 1]),
                $data
            )
            ->dump()
            ->assertStatus(200)
            ->assertJsonFragment($expected);
    }
}
