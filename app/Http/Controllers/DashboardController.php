<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalIncome = Transaction::where('user_id', Auth::id())
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id', Auth::id())
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $recentTransactions = Transaction::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalIncome',
            'totalExpense',
            'balance',
            'recentTransactions'
        ));
    }
}
