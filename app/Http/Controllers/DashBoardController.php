<?php

namespace App\Http\Controllers;

use App\Actions\Account\GetAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Actions\Transaction\SimpleChart;

class DashBoardController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $action = new GetAction();
        $account = $action->withData($user->id)->execute();

        $simpleChart = new SimpleChart();
        $transactions = $simpleChart->execute();

        return view('dashboard')->with([
            'account' => $account,
            'transactions' => $transactions
        ]);
    }
}
