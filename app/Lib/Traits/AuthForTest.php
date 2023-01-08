<?php

namespace App\Lib\Traits;

use App\Models\User;

trait AuthForTest
{

    public function testAuth()
    {
        $user = User::where('id', 1)->first();
        $this->actingAs($user);
        return true;
    }
}
