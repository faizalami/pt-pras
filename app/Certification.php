<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'user_id',
        'certification',
        'institution',
        'month_obtained',
        'year_obtained',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
