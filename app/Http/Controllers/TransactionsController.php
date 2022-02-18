<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Logs::join('accounts', 'logs.acc_id', '=', 'accounts.id')
            ->select(
                'accounts.account_number',
                'logs.id',
                'logs.action',
                'logs.method',
                'logs.amount',
                'logs.start_balance',
                'logs.end_balance',
                'logs.status',
                'logs.reference',
                'logs.created_at'
            )
            ->get();

        return view('admin.transactions', [
            'transactions' => $transactions
        ]);
    }
}
