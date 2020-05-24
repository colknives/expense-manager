<?php

namespace App\Repositories\Mysql;

use App\Models\Role;

class RoleRepository implements \App\Repositories\RoleRepository
{
    /**
     * Get role list method
     *
     * @return array
     */
    public function getRoleList(){

        return Role::get()->all();
    }

    /**
     * Save role method
     *
     * @param array $data
     * @return array
     */
    public function saveRole(array $data){

        return Role::create($data);
    }

    /**
     * Update role method
     *
     * @param string $uuid
     * @param array $data
     * @return array
     */
    public function updateRole(string $uuid, array $data){

        return Role::where('uuid', $uuid)->update($data);
    }

    /**
     * Delete role method
     *
     * @param string $uuid
     * @return array
     */
    public function deleteRole(string $uuid){

        return Role::where('uuid', $uuid)->delete();
    }
}
