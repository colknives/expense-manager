<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use Illuminate\Contracts\Support\Renderable;
use App\Repositories\ExpenseRepository;
use App\Repositories\ExpenseCategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ExpenseController extends Controller
{
    private $expenseRepository;

    private  $expenseCategoryRepository;

    /**
     * Construct instance.
     *
     * @param ExpenseRepository $expenseRepository
     * @param ExpenseCategoryRepository $expenseCategoryRepository
     */
    public function __construct(
        ExpenseRepository $expenseRepository,
        ExpenseCategoryRepository $expenseCategoryRepository)
    {
        $this->expenseRepository = $expenseRepository;
        $this->expenseCategoryRepository = $expenseCategoryRepository;
    }

    /**
     * Expense listing instance.
     *
     * @return Renderable
     */
    public function index()
    {
        $list = $this->expenseRepository->getExpenseListByUser(Auth::user()->uuid);

        $categories = $this->expenseCategoryRepository->getExpenseCategoryList();

        return view('expenses.list', ['expenses' => $list, 'categories' => $categories]);
    }

    /**
     * Save expense instance.
     *
     * @param ExpenseRequest $request
     * @return RedirectResponse
     */
    public function save(ExpenseRequest $request)
    {
        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'user_uuid' => Auth::user()->uuid,
            'category_uuid' => $request->post('category_uuid'),
            'amount' => $request->post('amount'),
            'entry_date' => $request->post('entry_date')
        ];

        $this->expenseRepository->saveExpense($data);

        return redirect()->route('expenses.list');
    }

    /**
     * Update expense instance.
     *
     * @param ExpenseRequest $request
     * @return RedirectResponse
     */
    public function update(ExpenseRequest $request)
    {
        $data = [
            'user_uuid' => Auth::user()->uuid,
            'category_uuid' => $request->post('category_uuid'),
            'amount' => $request->post('amount'),
            'entry_date' => $request->post('entry_date')
        ];

        $this->expenseRepository->updateExpense($request->post('uuid'), $data);

        return redirect()->route('expenses.list');
    }

    /**
     * Delete expense instance.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->expenseRepository->deleteExpense($request->post('uuid'));

        return redirect()->route('expenses.list');
    }
}
