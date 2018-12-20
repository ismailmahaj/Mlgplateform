<?php

namespace Modules\Calendar\Entities;

use Illuminate\Database\Eloquent\Model;

class calendar extends Model
{
    protected $fillable = ['google_id', 'name', 'color', 'timezone'];

    public function googleAccount()
    {
        return $this->belongsTo(GoogleAccount::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
