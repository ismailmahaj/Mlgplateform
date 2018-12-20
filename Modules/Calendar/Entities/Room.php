<?php

namespace Modules\Calendar\Entities;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [];


    public function reservation(){
        return $this->hasMany("Modules\Calendar\Entities\Reservation","reservation_id");
    }
    public function event(){
            return $this->belongsToMany("Modules\Calendar\Entities\Event", "reservations" , "room_id", "event_id");
        }
    
}
