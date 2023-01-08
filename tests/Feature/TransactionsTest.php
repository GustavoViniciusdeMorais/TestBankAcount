<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Lib\Traits\AuthForTest;

class TransactionsTest extends TestCase
{
    use AuthForTest;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_searchTransactions()
    {
        $this->testAuth();

        $data = [
            'start_date' => '2023-01-02',
            'end_date' => '2023-09-09'
        ];

        $expected = [
            'balance_id' => 1
        ];

        $this->post(route('transactions.index'), $data)
            ->dump()
            ->assertStatus(200)
            ->assertJsonFragment($expected);
    }
}
