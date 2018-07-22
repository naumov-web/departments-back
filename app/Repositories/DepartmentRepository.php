<?php

namespace App\Repositories;

use App\Department;

class DepartmentRepository {

    /**
     * Get departments list
     *
     * @param $params
     * @return array
     */
    public static function index($params = []) {
        $query = Department::query();
        if ($params['with_staffes']??null)
            $query->with('staffes');
        return [
            'items' => $query->get()
        ];
    }

    /**
     * Create department
     *
     * @param $data
     * @return bool
     */
    public static function create($data) {
        $staff = new Department();
        $staff->fill($data);
        return $staff->save();
    }

    /**
     * Update department
     *
     * @param Department $department
     * @param $data
     * @return mixed
     */
    public static function update(Department $department, $data) {
        $department->fill($data);
        return $department->save();
    }

    /**
     * Get one department
     *
     * @param Department $department
     * @return Department
     */
    public static function item(Department $department) {
        return $department;
    }

    /**
     * Delete one department
     *
     * @param Department $department
     * @return bool|null
     * @throws \Exception
     */
    public static function delete(Department $department) {
        return $department->delete();
    }

}