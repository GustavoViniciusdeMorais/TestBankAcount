<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Balance\GetAction;
use App\Actions\Balance\CreateAction;
use App\Http\Requests\BalanceRequest;
use App\Actions\Balance\UpdateAction;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // print_r(json_encode(['update']));echo "\n\n";exit;
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
}
