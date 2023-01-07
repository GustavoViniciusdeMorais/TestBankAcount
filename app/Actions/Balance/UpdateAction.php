<?php 

namespace App\Actions\Balance;

use App\Actions\BaseAction;
use App\Models\Balance;
use App\Http\Resources\BalanceResource;

class UpdateAction extends BaseAction
{

    public function execute()
    {
        $newData = [
            'account_id' => $this->data['account_id'],
            'value' => $this->data['value']
        ];

        $balance = Balance::where('id', $this->data['id'])->first();
        $balance->update($newData);
        
        return new BalanceResource($balance);
    }
}
