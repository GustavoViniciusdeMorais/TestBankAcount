<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Actions\Balance\GetAction;
use App\Actions\Balance\CreateAction;
use App\Http\Requests\BalanceRequest;
use App\Actions\Balance\UpdateAction;
use App\Actions\Account\GetAction AS GetAccountAction;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = $this->getAccount();
        return view('balance.index')->with(['account' => $account]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = $this->getAccount();
        return view('balance.store')->with(['account' => $account]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BalanceRequest $request)
    {
        try {
            $action = new CreateAction();
            $result = $action->withData($request->all())->execute();

            $console = app()->runningInConsole();

            if ($console) {
                return $result;
            } else {
                return redirect()->route('balances.index');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $action = new GetAction();
            return $action->withData($id)->execute();
        } catch (\Exception $e) {
            return [
                'msg' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTrace()
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, BalanceRequest $request)
    {
        try {
            $data = [
                'id' => $id,
                'value' => $request->value,
                'account_id' => $request->account_id
            ];
            $action = new UpdateAction();
            return $action->withData($data)->execute();
        } catch (\Exception $e) {
            return [
                'msg' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTrace()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAccount()
    {
        $user = Auth::user();
        $action = new GetAccountAction();
        return $action->withData($user->id)->execute();
    }
}
