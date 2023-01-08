<?php

namespace App\Http\Controllers;

use App\Actions\Account\GetAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $action = new GetAction();
        $account = $action->withData($user->id)->execute();
        return view('dashboard')->with(['account' => $account]);
    }
}
