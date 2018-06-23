<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Repositories\StaffRepository;

class StaffesController extends Controller
{
  
    public function index() {
        
    }
  
    public function item(Staff $staff) {
        
    }
  
    public function create() {
        
    }
  
    public function update(Staff $staff) {
        
    }
  
    public function delete(Staff $staff) {
        return [
            'success' => StaffRepository::delete($staff)
        ];
    }
  
}