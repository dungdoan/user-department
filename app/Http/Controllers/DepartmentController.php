<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Show list of departments
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = DB::table('departments')->get();

        return view('departments/index',
            [
                'departments' => $departments,
            ]
        );
    }
}
