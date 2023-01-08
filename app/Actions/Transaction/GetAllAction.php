<?php

namespace App\Actions\Transaction;

use App\Actions\BaseAction;
use App\Http\Resources\TransactionsCollection;
use App\Models\Transaction;

class GetAllAction extends BaseAction
{
    public function execute()
    {
        // print_r(json_encode([$this->data]));echo "\n\n";exit;
        $transaction = Transaction::whereBetween('created_at', [
                $this->data['start_date'],
                $this->data['end_date']
            ])
            ->paginate(10);
        return new TransactionsCollection($transaction);
    }
}
