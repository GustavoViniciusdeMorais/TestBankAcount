<?php

namespace App\Actions;

use Illuminate\Support\Facades\Validator;
use App\Lib\Exceptions\MyException;

abstract class BaseAction
{
    protected $data;
    protected $rules;
    protected $message = "Operação realizada com sucesso!";
    protected $errorMessage = "Erro na operação!";

    abstract public function execute();

    public function withData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
        return $this;
    }

    public function validate()
    {
        $validator = Validator::make($this->data, $this->rules);
 
        if ($validator->fails()) {
            throw new MyException("Dados inválidos");
        }
        
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function success($result = null)
    {
        $response = [
            'status' => 'success',
            'message' => $this->message,
            'data'    => $result,
        ];

        return response()->json($response, 200);
    }

    public function failure($error = null, $code = 404)
    {
        $response = [
            'status'=>'error',
            'message' => isset($error) ? $error : $this->errorMessage,
            'data' => [
                'error'=>$error->getMessage(),
                'file'=>$error->getFile(),
                'line'=>$error->getLine(),
                'stack'=>$error->getTrace(),
            ]
        ];

        return response()->json($response, $code);
    }
}