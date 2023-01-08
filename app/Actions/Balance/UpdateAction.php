<?php

namespace App\Actions\Balance;

use App\Actions\BaseAction;
use App\Models\Balance;
use App\Http\Resources\BalanceResource;
use App\Models\Transaction;

class UpdateAction extends BaseAction
{

    public function execute()
    {
        $newData = [
            'account_id' => $this->data['account_id'],
            'value' => $this->data['value']
        ];

        $balance = Balance::where('id', $this->data['id'])->first();
        
        Transaction::create(
            [
                'old_value' => $balance->value,
                'new_value' => $this->data['value'],
                'account_id' => $this->data['account_id'],
                'balance_id' => $balance->id
            ]
        );
        
        $balance->update($newData);

        return new BalanceResource($balance);
    }
}
