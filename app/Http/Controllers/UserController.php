<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\RoleRepository;
use Illuminate\Contracts\Support\Renderable;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    private $userRepository;

    private $roleRepository;

    /**
     * Construct instance.
     *
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * User listing instance.
     *
     * @return Renderable
     */
    public function index()
    {
        $list = $this->userRepository->getUserList();
        $roles = $this->roleRepository->getRoleList();

        return view('users.list', ['users' => $list, 'roles' => $roles]);
    }

    /**
     * Save user instance.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function save(UserRequest $request)
    {
        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'role_uuid' => $request->post('role_uuid'),
            'password' => Hash::make($request->post('password'))
        ];

        $this->userRepository->saveUser($data);

        return redirect()->route('users.list');
    }

    /**
     * Update user instance.
     *
     * @param UpdateUserRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request)
    {
        $data = [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'role_uuid' => $request->post('role_uuid')
        ];

        $this->userRepository->updateUser($request->post('uuid'), $data);

        return redirect()->route('users.list');
    }

    /**
     * Delete user instance.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->userRepository->deleteUser($request->post('uuid'));

        return redirect()->route('users.list');
    }
}
