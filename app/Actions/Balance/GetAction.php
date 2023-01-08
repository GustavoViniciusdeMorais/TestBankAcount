<?php

namespace App\Actions\Balance;

use App\Actions\BaseAction;
use App\Models\Balance;
use App\Http\Resources\BalanceResource;

class GetAction extends BaseAction
{

    public function execute()
    {
        $balance = Balance::where(
            'account_id',
            $this->data
        )
            ->first();
        return new BalanceResource($balance);
    }
}
