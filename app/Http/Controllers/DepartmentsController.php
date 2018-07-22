<?php

namespace App\Http\Controllers;

use App\Department;
use App\Repositories\DepartmentRepository;
use App\Http\Requests\SaveDepartmentRequest;

class DepartmentsController extends Controller
{

    /**
     * Get departments list
     *
     * @return array
     */
    public function index() {
        return DepartmentRepository::index();
    }

    /**
     * Get departments list with staffes
     *
     * @return array
     */
    public function indexWithStaffes() {
        return DepartmentRepository::index([
            'with_staffes' => true
        ]);
    }

    /**
     * Get one department
     *
     * @param Department $department
     * @return \App\Repositories\Staff
     */
    public function item(Department $department) {
        return DepartmentRepository::item($department);
    }

    /**
     * Create department
     *
     * @return array
     */
    public function create(SaveDepartmentRequest $request) {
        $data = $request->all();
        return [
            'success' => DepartmentRepository::create($data)
        ];
    }

    /**
     * Update department
     *
     * @param Department $department
     * @param SaveDepartmentRequest $request
     * @return array
     */
    public function update(Department $department, SaveDepartmentRequest $request) {
        $data = $request->all();
        return [
            'success' => DepartmentRepository::update($department, $data)
        ];
    }

    /**
     * Delete department
     *
     * @param Department $department
     * @return array
     * @throws \Exception
     */
    public function delete(Department $department) {
        return [
            'success' => DepartmentRepository::delete($department)
        ];
    }

}