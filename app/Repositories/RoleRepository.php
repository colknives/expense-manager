<?php

namespace App\Repositories;

interface RoleRepository
{
    /**
     * Get role list method
     *
     * @return array
     */
    public function getRoleList();

    /**
     * Save role method
     *
     * @param array $data
     * @return array
     */
    public function saveRole(array $data);

    /**
     * Update role method
     *
     * @param string $uuid,
     * @param array $data
     * @return array
     */
    public function updateRole(string $uuid, array $data);

    /**
     * Delete role method
     *
     * @param string $uuid,
     * @return array
     */
    public function deleteRole(string $uuid);

}
