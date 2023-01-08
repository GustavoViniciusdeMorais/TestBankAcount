<?php

namespace App\Actions\Account;

use App\Actions\BaseAction;
use App\Models\User;
use App\Http\Resources\UserResource;

class GetAction extends BaseAction
{

    public function execute()
    {
        $user = User::where('id', $this->data)->with(['account.balance'])->first();
        return new UserResource($user);
    }
}
