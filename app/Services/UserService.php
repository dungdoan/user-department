<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserService
{
    /**
     * Get list users with department
     *
     * @return Collection
     */
    public function getUsers()
    {
        return User::select(['users.*', 'departments.name as department'])
        ->join('departments', 'departments.id', '=', 'users.department_id')
        ->get();
    }

    /**
     * Create a new user
     *
     * @param array $userData
     * @return string message
     */
    public function create($userData)
    {
        try {
            $result = User::create($userData);
            if ($result) {
                return 'The user has been created';
            }
        } catch (QueryException $e) {
            return 'The user has not been created';
        }
    }

    /**
     * Get user by department id
     *
     * @param $departmentId
     * @return Collection
     */
    public function getByDepartment($departmentId)
    {
        return User::where(['department_id' => $departmentId])->get();
    }
}
