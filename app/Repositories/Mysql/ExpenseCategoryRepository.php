<?php

namespace App\Repositories\Mysql;

use App\Models\ExpenseCategory;

class ExpenseCategoryRepository implements \App\Repositories\ExpenseCategoryRepository
{
    /**
     * Get expense category list method
     *
     * @return array
     */
    public function getExpenseCategoryList(){

        return ExpenseCategory::get()->all();
    }

    /**
     * Save expense category method
     *
     * @param array $data
     * @return array
     */
    public function saveExpenseCategory(array $data){

        return ExpenseCategory::create($data);
    }

    /**
     * Update expense category method
     *
     * @param string $uuid
     * @param array $data
     * @return array
     */
    public function updateExpenseCategory(string $uuid, array $data){

        return ExpenseCategory::where('uuid', $uuid)->update($data);
    }

    /**
     * Delete expense category method
     *
     * @param string $uuid
     * @return array
     */
    public function deleteExpenseCategory(string $uuid){

        return ExpenseCategory::where('uuid', $uuid)->delete();
    }
}
