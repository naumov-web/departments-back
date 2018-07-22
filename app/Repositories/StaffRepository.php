<?php 

namespace App\Repositories;

use App\Staff;

class StaffRepository {

    /**
     * Get staffes list
     *
     * @return array
     */
    public static function index() {
        $query = Staff::query();
        return [
            'items' => $query->get()->each(function($item){
                $item->setAppends(
                    ['gender', 'departmentNames']
                );
            })
        ];
    }

    /**
     * Create staff
     *
     * @param $data
     * @return bool
     */
    public static function create($data) {
        $staff = new Staff();
        $staff->fill($data);
        return $staff->save() && $staff->departments()->sync($data['department_ids']??[]);
    }

    /**
     * Update staff
     *
     * @param Staff $staff
     * @param $data
     * @return bool
     */
    public static function update(Staff $staff, $data) {
        $staff->fill($data);
        return $staff->save() && $staff->departments()->sync($data['department_ids']??[]);
    }

    /**
     * Get one staff item
     *
     * @param Staff $staff
     * @return Staff
     */
    public static function item(Staff $staff) {
        return $staff->load('departments');
    }

    /**
     * Delete staff
     *
     * @param Staff $staff
     * @return bool|null
     * @throws \Exception
     */
    public static function delete(Staff $staff) {
        $staff->departments()->detach();
        return $staff->delete();
    }
  
}