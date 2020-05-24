<?php

namespace App\Repositories;

interface ExpenseCategoryRepository
{
    /**
     * Get expense category list method
     *
     * @return array
     */
    public function getExpenseCategoryList();

    /**
     * Save expense category method
     *
     * @param array $data
     * @return array
     */
    public function saveExpenseCategory(array $data);

    /**
     * Update expense category method
     *
     * @param string $uuid,
     * @param array $data
     * @return array
     */
    public function updateExpenseCategory(string $uuid, array $data);

    /**
     * Delete expense category method
     *
     * @param string $uuid,
     * @return array
     */
    public function deleteExpenseCategory(string $uuid);

}
