<?php

namespace App\Actions\Transaction;

use App\Actions\BaseAction;
use App\Http\Resources\TransactionsCollection;
use App\Models\Transaction;

class GetAllAction extends BaseAction
{
    public function execute()
    {
        $this->checkSearch();
        $transaction = Transaction::whereBetween('created_at', [
                $this->data['start_date'],
                $this->data['end_date']
            ])
            ->paginate(10);
        return new TransactionsCollection($transaction);
    }

    public function checkSearch()
    {
        if (!isset($this->data['start_date'])
            && !isset($this->data['end_date'])
        ) {
            $this->data['start_date'] = '2023-01-01';
            $this->data['end_date'] = '2023-12-30';
        }
    }
}
