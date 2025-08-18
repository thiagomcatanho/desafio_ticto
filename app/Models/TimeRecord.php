<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeRecord extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
    ];

    /**
     * Get user associeted with this time record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
