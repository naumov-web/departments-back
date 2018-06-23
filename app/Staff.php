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
}