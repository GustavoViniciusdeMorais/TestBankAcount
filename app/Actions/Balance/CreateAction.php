<?php

namespace App\Actions\Balance;

use App\Actions\BaseAction;
use App\Models\Balance;
use App\Http\Resources\BalanceResource;
use App\Models\Transaction;

class CreateAction extends BaseAction
{

    public function execute()
    {
        $balance = Balance::create($this->data);

        Transaction::create(
            [
                'old_value' => 0,
                'new_value' => $this->data['value'],
                'account_id' => $this->data['account_id'],
                'balance_id' => $balance->id
            ]
        );

        return new BalanceResource($balance);
    }
}
