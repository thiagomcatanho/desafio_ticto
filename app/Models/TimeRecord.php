<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeRecord extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
