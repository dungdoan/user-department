<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\DepartmentService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /** @var DepartmentService */
    private $departmentService;

    /** @var UserService */
    private $userService;

    public function __construct()
    {
        $this->departmentService = new DepartmentService;
        $this->userService = new UserService;
    }

    /**
     * Show list of users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getUsers();
        $departments = $this->departmentService->getListDepartments();

        return view('users/index',
            [
                'users' => $users,
                'departments' => $departments,
            ]
        );
    }

    /**
     * Assign the user to new department
     *
     * @param Request $request
     * @return void
     */
    public function assign(Request $request)
    {
        $response = $this->userService->assign($request->post());

        return Redirect::back()->with('message', $response);
    }

    /**
     * Render a form for creating user
     *
     * @return void
     */
    public function new()
    {
        return view('users/new',
            [
                'departments' => $this->departmentService->getListDepartments(),
            ]
        );
    }

    /**
     * Create a new user
     *
     * @param Request $request
     * @return Redirect
     */
    public function create(Request $request)
    {
        $response = $this->userService->create($request->post());
        return redirect('/user')->with('message', $response);
    }
}
