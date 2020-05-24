<?php

namespace App\Repositories;

interface UserRepository
{
    /**
     * Get user list method
     *
     * @return array
     */
    public function getUserList();

    /**
     * Save user method
     *
     * @param array $data
     * @return array
     */
    public function saveUser(array $data);

    /**
     * Update user method
     *
     * @param string $uuid,
     * @param array $data
     * @return array
     */
    public function updateUser(string $uuid, array $data);

    /**
     * Delete user method
     *
     * @param string $uuid,
     * @return array
     */
    public function deleteUser(string $uuid);

}
