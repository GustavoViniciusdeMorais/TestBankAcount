<?php

namespace App\Actions\Account;

use App\Actions\BaseAction;
use App\Models\User;
use App\Models\Account;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;
use App\Lib\Traits\CpfValidator;
use App\Lib\Exceptions\MyException;

class CreateAction extends BaseAction
{
    use CpfValidator;

    public function execute()
    {
        $validCpf = $this->validateCpf($this->data['cpf']);

        if ($validCpf) {
            $user = User::create($this->data);

            $uuid = (string) Str::uuid();
            Account::create([
                'uuid' => $uuid,
                'user_id' => $user->id
            ]);

            return new UserResource($user);
        }

        throw new MyException("CPF inválido");
    }
}
