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
     * Assign user to new department
     *
     * @param array $userData
     * @return void
     */
    public function assign($userData)
    {
        try {
            $user = User::where([
                'id' => $userData['user_id'],
            ])
            ->first();

            $user->update(['department_id' => $userData['department']]);

            if ($user->department_id == $userData['department']) {
                return 'The user has been assigned';
            }

            return 'The user has not been assigned';
        } catch (QueryException $e) {
            return 'The user has not been assigned';
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
