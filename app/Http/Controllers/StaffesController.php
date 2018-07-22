<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Repositories\StaffRepository;
use App\Http\Requests\SaveStaffRequest;

class StaffesController extends Controller
{

    /**
     * Get staffes list
     *
     * @return array
     */
    public function index() {
        return StaffRepository::index();
    }

    /**
     * Get one staff
     *
     * @param Staff $staff
     * @return Staff
     */
    public function item(Staff $staff) {
        return StaffRepository::item($staff);
    }
  
    public function create(SaveStaffRequest $request) {
        $data = $request->all();
        return [
            'success' => StaffRepository::create($data)
        ];
    }
  
    public function update(Staff $staff, SaveStaffRequest $request) {
        $data = $request->all();
        return [
            'success' => StaffRepository::update($staff, $data)
        ];
    }
  
    public function delete(Staff $staff) {
        return [
            'success' => StaffRepository::delete($staff)
        ];
    }
  
}