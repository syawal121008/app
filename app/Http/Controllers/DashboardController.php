<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\Products;
use App\Transactions;
use App\Users;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function cashierdashboard()
    {
        return view('dashboard.cashier');
    }

    public function admindashboard()
    {
        $countproduct = Products::count();
        $countuser = Users::count();
        $countcustomer = Customers::count();
        $conttotal = Transactions::sum('total_amount');

        $transactions = Transactions::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->groupBy('month')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('month')
            ->get();

        $month = [];
        $totals = [];

        foreach ($transactions as $transaction) {
            $month[] = Carbon::create()->month($transaction->month)->format('F');
            $totals[] = $transaction->total;
        }

        return view('dashboard.admin', compact('countproduct', 'countuser', 'countcustomer', 'conttotal', 'month', 'totals'));
    }
}

