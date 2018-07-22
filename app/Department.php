<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';
    
    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get relation to staffes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function staffes()
    {
        return $this->belongsToMany('App\Staff', 'department_staffes', 'department_id', 'staff_id');
    }

}