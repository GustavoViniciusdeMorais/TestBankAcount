<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Transaction\GetAllAction;

class TransactionController extends Controller
{
    
    public function index(Request $request)
    {
        try {
            $action = new GetAllAction();
            $result = $action->withData($request->all())->execute();

            $console = app()->runningInConsole();

            if ($console) {
                return $result;
            } else {
                return view('transactions.index')
                    ->with([
                        'transactions' => $result
                    ]);
            }
        } catch (\Exception $e) {
            return [
                'msg' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTrace()
            ];
        }
    }
}
