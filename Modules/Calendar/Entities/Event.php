<?php

namespace Modules\Calendar\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // protected $fillable = ['categorie', 'description', 'title', 'image', 'start_date','end_date'];
    protected $with = ['calendar'];
    protected $fillable = ['google_id', 'name', 'description', 'allday', 'started_at', 'ended_at'];
//     public function user()
//     {
// // liaison entre Event et user 
//         return $this->belongsTo('App\User','user_id', 'id');

//     }
//     public function reservation()
//     {
//         return $this->hasMany('Modules\Calendar\Entities\Reservation','reservation_id');
//     }
//     public function rooms(){
//             return $this->belongsToMany("Modules\Calendar\Entities\Room", "reservations","event_id", "room_id");
//         }
public function calendar()
{
    return $this->belongsTo(Calendar::class);
}

public function getStartedAtAttribute($start)
{
    return $this->asDateTime($start)->setTimezone($this->calendar->timezone);
}

public function getEndedAtAttribute($end)
{
    return $this->asDateTime($end)->setTimezone($this->calendar->timezone);
}

public function getDurationAttribute()
{
    return $this->started_at->diffForHumans($this->ended_at, true);
}
}
