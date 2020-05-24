<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseCategoryRequest;
use Illuminate\Contracts\Support\Renderable;
use App\Repositories\ExpenseCategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ExpenseCategoryController extends Controller
{
    private $expenseCategoryRepository;

    /**
     * Construct instance.
     *
     * @param ExpenseCategoryRepository $expenseCategoryRepository
     */
    public function __construct(ExpenseCategoryRepository $expenseCategoryRepository)
    {
        $this->expenseCategoryRepository = $expenseCategoryRepository;
    }

    /**
     * Expense Category listing instance.
     *
     * @return Renderable
     */
    public function index()
    {
        $list = $this->expenseCategoryRepository->getExpenseCategoryList();

        return view('expense_categories.list', ['categories' => $list]);
    }

    /**
     * Save role instance.
     *
     * @param ExpenseCategoryRequest $request
     * @return RedirectResponse
     */
    public function save(ExpenseCategoryRequest $request)
    {
        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $request->post('name'),
            'description' => $request->post('description')
        ];

        $this->expenseCategoryRepository->saveExpenseCategory($data);

        return redirect()->route('expense.categories.list');
    }

    /**
     * Update role instance.
     *
     * @param ExpenseCategoryRequest $request
     * @return RedirectResponse
     */
    public function update(ExpenseCategoryRequest $request)
    {
        $data = [
            'name' => $request->post('name'),
            'description' => $request->post('description')
        ];

        $this->expenseCategoryRepository->updateExpenseCategory($request->post('uuid'), $data);

        return redirect()->route('expense.categories.list');
    }

    /**
     * Delete role instance.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->expenseCategoryRepository->deleteExpenseCategory($request->post('uuid'));

        return redirect()->route('expense.categories.list');
    }
}
