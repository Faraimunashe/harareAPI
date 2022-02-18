<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Logs;
use App\Models\Paynowlog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return 'Users not allowed';
        } elseif (Auth::user()->hasRole('clerk')) {
            return 'Not allowed';
        } elseif (Auth::user()->hasRole('admin')) {

            $cusers = User::all()->count();
            $caccounts = Accounts::all()->count();
            $clogs = Logs::all()->count();
            $cpaynow = Paynowlog::all()->count();

            return view('dashboard', [
                'users' => $cusers,
                'accounts' => $caccounts,
                'logs' => $clogs,
                'paynow' => $cpaynow
            ]);
        }
    }
}
