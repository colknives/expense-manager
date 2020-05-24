<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Contracts\Support\Renderable;
use App\Repositories\RoleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class RoleController extends Controller
{
    private $roleRepository;

    /**
     * Construct instance.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Role listing instance.
     *
     * @return Renderable
     */
    public function index()
    {
        $list = $this->roleRepository->getRoleList();

        return view('roles.list', ['roles' => $list]);
    }

    /**
     * Save role instance.
     *
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function save(RoleRequest $request)
    {
        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $request->post('name'),
            'description' => $request->post('description')
        ];

        $this->roleRepository->saveRole($data);

        return redirect()->route('roles.list');
    }

    /**
     * Update role instance.
     *
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function update(RoleRequest $request)
    {
        $data = [
            'name' => $request->post('name'),
            'description' => $request->post('description')
        ];

        $this->roleRepository->updateRole($request->post('uuid'), $data);

        return redirect()->route('roles.list');
    }

    /**
     * Delete role instance.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->roleRepository->deleteRole($request->post('uuid'));

        return redirect()->route('roles.list');
    }
}
