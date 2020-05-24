<?php

namespace App\Repositories;

interface ExpenseRepository
{
    /**
     * Get expense list method
     *
     * @return array
     */
    public function getExpenseList();

    /**
     * Get expense list by user method
     *
     * @param string $uuid
     * @return array
     */
    public function getExpenseListByUser(string $uuid);

    /**
     * @param string $uuid
     * @return array
     */
    public function getTotalExpensePerCategory(string $uuid);

    /**
     * Save expense method
     *
     * @param array $data
     * @return array
     */
    public function saveExpense(array $data);

    /**
     * Update expense method
     *
     * @param string $uuid,
     * @param array $data
     * @return array
     */
    public function updateExpense(string $uuid, array $data);

    /**
     * Delete expense method
     *
     * @param string $uuid,
     * @return array
     */
    public function deleteExpense(string $uuid);

}
