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
            return $action->withData($request->all())->execute();
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
