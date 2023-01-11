<?php

namespace App\Services;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentService
{
    /**
     * Get all departments
     *
     * @return collections
     */
    public function getListDepartments()
    {
        return Department::get();
    }

    /**
     * Create a new department
     *
     * @param array $departmentData
     * @return string message
     */
    public function create($departmentData)
    {
        try {
            $result = Department::create($departmentData);
            if ($result) {
                return 'The department has been created';
            }
        } catch (QueryException $e) {
            return 'The department has not been created';
        }
    }

    /**
     * Delete a department
     *
     * @param array $departmentData
     * @return string message
     */
    public function delete($departmentData)
    {
        try {
            $userService = new UserService;
            $users = $userService->getByDepartment($departmentData['department_id']);
            if ($users->count()) {
                return 'The department still has user';
            }

            $result = Department::where('id', $departmentData['department_id'])->delete();
            if ($result) {
                return 'The department has been created';
            }
        } catch (QueryException $e) {
            return 'The department has not been created';
        }
    }
}
