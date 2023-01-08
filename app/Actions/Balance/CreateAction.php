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
        $balance = $this->checkBalanceExists();

        if ($balance) {
            $balance = $this->updateBalace($balance);
        } else {
            $balance = $this->createBalance();
        }

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

    public function checkBalanceExists()
    {
        return Balance::where(
            'account_id', $this->data['account_id']
        )->first();
    }

    public function updateBalace($balance)
    {
        // print_r(json_encode(['updateBalace'=>$balance->value]));echo "\n\n";exit;
        $sentValue = isset($this->data['value']) ? $this->data['value'] : 0;
        $newValue = $sentValue + $balance->value;
        $balance->update([
            'value' => $newValue,
            'account_id' => $this->data['account_id']
        ]);
        return $balance;
    }

    public function createBalance()
    {
        $balance = Balance::create($this->data);
        return $balance;
    }
}
