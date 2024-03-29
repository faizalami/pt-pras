<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'photo',
        'cv',
        'expected_salary',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
