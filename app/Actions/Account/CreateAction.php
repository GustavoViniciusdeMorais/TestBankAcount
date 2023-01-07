<?php

namespace App\Actions\Account;

use App\Actions\BaseAction;
use App\Models\User;
use App\Models\Account;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;

class CreateAction extends BaseAction
{

    public function execute()
    {
        $this->validateCpf();
        $user = User::create($this->data);

        $uuid = (string) Str::uuid();
        Account::create([
            'uuid' => $uuid,
            'user_id' => $user->id
        ]);

        return new UserResource($user);
    }

    public function validateCpf()
    {
        print_r(json_encode([
            'validate cpf' => $this->data
        ]));echo "\n\n";exit;
    }
}