<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Lib\Traits\AuthForTest;

class BalanceTest extends TestCase
{
    use AuthForTest;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_registerBalance()
    {
        $this->testAuth();

        $data = [
            'value' => 100.00,
            'account_id' => '1'
        ];

        $expected = [
            'account_id' => '1'
        ];

        $this->post(route('balances.store'), $data)
            ->dump()
            ->assertJsonFragment($expected);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_updateBalance()
    {
        $this->testAuth();

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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_showBalance()
    {
        $this->testAuth();
        
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
}
