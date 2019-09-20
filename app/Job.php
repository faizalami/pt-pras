<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function applications() {
        return $this->hasMany('App\Application');
    }

    public function users() {
        return $this->hasManyThrough('App\User', 'App\Application');
    }
}
