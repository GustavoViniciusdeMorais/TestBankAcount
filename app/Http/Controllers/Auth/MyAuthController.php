<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BaseController;
use App\Models\Configuration;

class MyAuthController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $payed = $this->validatePayment();

        if (
            $payed
            && Auth::attempt(['email' => $request->email, 'password' => $request->password])
        ) { 
            $user = Auth::user(); 
            // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            // $success['name'] =  $user->name;
   
            // return $this->sendResponse($success, 'User login successfully.');
            return redirect(Redirect::intended()->getTargetUrl());
        } else {
            if (!$payed) {
                Session::flash('error', 'O pagamento não foi processado!');
            } else {
                Session::flash('error', 'Email ou senha incorretos!');
            }
            
            return view('auth.login');
        } 
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

    public function validatePayment()
    {
        $payedConfig = Configuration::where('name', 'payed')->first();

        if (isset($payedConfig)
            && !$payedConfig->value
        ) {
            return false;
        }

        return true;
    }
}