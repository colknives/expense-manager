<?php

namespace App\Repositories\Mysql;

use App\Models\User;

class UserRepository implements \App\Repositories\UserRepository
{
    /**
     * Get user list method
     *
     * @return array
     */
    public function getUserList(){

        return User::with('role')->get()->all();
    }

    /**
     * Save user method
     *
     * @param array $data
     * @return array
     */
    public function saveUser(array $data){

        return User::create($data);
    }

    /**
     * Update user method
     *
     * @param string $uuid
     * @param array $data
     * @return array
     */
    public function updateUser(string $uuid, array $data){

        return User::where('uuid', $uuid)->update($data);
    }

    /**
     * Delete user method
     *
     * @param string $uuid
     * @return array
     */
    public function deleteUser(string $uuid){

        return User::where('uuid', $uuid)->delete();
    }
}
