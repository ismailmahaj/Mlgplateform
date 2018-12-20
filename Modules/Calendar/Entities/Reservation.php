<?php

namespace Modules\Calendar\Entities;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [];

    // public function event(){
    //     return $this->belongsTo("Modules\Calendar\Entities\Event");
    // }

    // public function room(){
    //     return $this->HasMany("Modules\Calendar\Entities\Room","id", "room_id");
    // }
}
