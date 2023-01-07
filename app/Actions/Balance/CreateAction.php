<?php 

namespace App\Actions\Balance;

use App\Actions\BaseAction;
use App\Models\Balance;
use App\Http\Resources\BalanceResource;

class CreateAction extends BaseAction
{

    public function execute()
    {
        $balance = Balance::create($this->data);
        return new BalanceResource($balance);
    }
}
