<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Show list of users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $departments = DB::table('departments')->get();

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
        $data = $request->post();

        $user = User::where([
            'id' => $data['user_id'],
        ])
        ->first();

        $result = $user->update(['department_id' => $data['department']]);

        return Redirect::back();
    }
}
