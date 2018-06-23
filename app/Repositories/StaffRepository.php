<?php 

namespace App\Repositories;

use App\Staff;

class StaffRepository {
  
    public static function create($data) {
        $staff = new Staff();
        return $staff->save();
    }
  
    public static function update(Staff $staff, $data) {
        $staff->fill($data);
    }
  
    public static function item(Staff $staff) {
        return $staff;
    }
  
    public static function delete(Staff $staff) {
        return $staff->delete();
    }
  
}