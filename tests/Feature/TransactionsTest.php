<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class TransactionsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function searchTransactions()
    {
        $data = [
            'start_date' => '2022-02-02',
            'end_date' => '2023-09-09'
        ];

        $this->get(route('accounts.transactions.search'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
            );
    }
}
