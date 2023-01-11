<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /** @var DepartmentService */
    private $departmentService;

    public function __construct()
    {
        $this->departmentService = new DepartmentService;
    }

    /**
     * Show list of departments
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departmentService->getListDepartments();

        return view('departments/index',
            [
                'departments' => $departments,
            ]
        );
    }

    /**
     * Render a form for creating department
     *
     * @return void
     */
    public function new()
    {
        return view('departments/new');
    }

    /**
     * Create a new department
     *
     * @param Request $request
     * @return Redirect
     */
    public function create(Request $request)
    {
        $response = $this->departmentService->create($request->post());
        return redirect('/department')->with('message', $response);;
    }

    /**
     * Delete a department
     *
     * @param Request $request
     * @return Redirect
     */
    public function delete(Request $request)
    {
        $response = $this->departmentService->delete($request->post());
        return redirect('/department')->with('message', $response);;
    }
}
