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
        $balance = Balance::where('id', $this->data['id'])->first();

        $canDraw = $this->canWithDraw($this->data['value'], $balance->value);

        if ($canDraw) {
            $newValue = $balance->value - $this->data['value'];

            $newData = [
                'account_id' => $this->data['account_id'],
                'value' => $newValue
            ];
            
            Transaction::create(
                [
                    'old_value' => $balance->value,
                    'new_value' => $this->data['value'],
                    'account_id' => $this->data['account_id'],
                    'balance_id' => $balance->id
                ]
            );
            
            $balance->update($newData);
        }

        return new BalanceResource($balance);
    }

    public function canWithDraw($drawValue, $currentValue)
    {
        if ($currentValue > $drawValue) {
            return true;
        } else {
            return false;
        }
    }
}
