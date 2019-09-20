<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'join_date'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function job() {
        return $this->belongsTo('App\Job');
    }
}
