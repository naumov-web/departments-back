<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staffes';

    protected $fillable = [
        'name',
        'surname',
        'lastname',
        'gender_id',
        'salary'
    ];

    protected $appends = [
        'gender'
    ];

    /**
     * Gender attribute accessor
     *
     * @return mixed
     */
    public function getGenderAttribute()
    {
        $id = $this->gender_id;
        $collection = collect(config('gender'));
        $g = $collection->where('id', $id)->first();
        if ($g)
            return $g['name'];
    }

    /**
     * Department names accessor
     *
     * @return string
     */
    public function getDepartmentNamesAttribute()
    {
        $dl = $this->departments;
        $names = [];
        foreach ($dl as $dli) {
            $names[] = $dli->name;
        }
        return implode(', ', $names);
    }

    /**
     * Get relation to departments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany('App\Department', 'department_staffes', 'staff_id', 'department_id');
    }

}