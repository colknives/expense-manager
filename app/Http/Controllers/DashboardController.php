<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExpenseRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $expenseRepository;

    /**
     * Construct instance.
     *
     * @return void
     */
    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $expenses = $this->expenseRepository->getTotalExpensePerCategory(Auth::user()->uuid);

        return view('dashboard', ['expenses' => $expenses]);
    }
}
