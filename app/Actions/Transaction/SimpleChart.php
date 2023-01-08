<?php

namespace App\Actions\Transaction;

use App\Actions\BaseAction;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class SimpleChart extends BaseAction
{

    public function execute()
    {
        $transactions = $this->getTransactions();
        return $this->formatChartData($transactions);
    }

    public function getTransactions()
    {
        return Transaction::query()
            ->whereRaw('HOUR(created_at) > 0 AND HOUR(created_at) < 24')
            ->groupBy('transaction_hour')
            ->select([
                DB::raw('HOUR(created_at) AS transaction_hour'),
                DB::raw('COUNT(*) AS qty')
            ])
            ->get();
    }

    public function formatChartData($transactions)
    {
        $result = null;

        if (!empty($transactions) && count($transactions) > 0) {
            $result[] = ['Horário', 'Quantidade'];

            $key = 0;
            foreach ($transactions as $transaction) {
                $result[++$key] = [$transaction->transaction_hour, intval($transaction->qty)];
            }
        }
        return [
            'result' => $result,
        ];
    }
}
