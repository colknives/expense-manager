<?php

namespace App\Repositories\Mysql;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseRepository implements \App\Repositories\ExpenseRepository
{
    /**
     * Get expense list method
     *
     * @return array
     */
    public function getExpenseList(){

        return Expense::with('category')->get()->all();
    }

    /**
     * Get expense list by user method
     *
     * @param string $uuid
     * @return array
     */
    public function getExpenseListByUser(string $uuid){

        return Expense::with('category')->where('user_uuid', $uuid)->get()->all();
    }

    /**
     * @param string $uuid
     * @return array
     */
    public function getTotalExpensePerCategory(string $uuid)
    {
        return Expense::select([
                'expense_categories.name',
                DB::raw('SUM( expenses.amount ) as expense_amount')
            ])
            ->where('user_uuid', $uuid)
            ->join('expense_categories', 'expense_categories.uuid', '=', 'expenses.category_uuid')
            ->groupBy('expense_categories.name')
            ->get()->all();
    }

    /**
     * Save expense method
     *
     * @param array $data
     * @return array
     */
    public function saveExpense(array $data){

        return Expense::create($data);
    }

    /**
     * Update expense method
     *
     * @param string $uuid
     * @param array $data
     * @return array
     */
    public function updateExpense(string $uuid, array $data){

        return Expense::where('uuid', $uuid)->update($data);
    }

    /**
     * Delete expense method
     *
     * @param string $uuid
     * @return array
     */
    public function deleteExpense(string $uuid){

        return Expense::where('uuid', $uuid)->delete();
    }
}
