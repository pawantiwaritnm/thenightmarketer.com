<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStatusHistory extends Model
{
    public $timestamps = false; // created_at handled in SQL default
    protected $table = 'event_status_history';
    protected $fillable = ['event_id','from_status','to_status','note','changed_by'];
    public function event(){ return $this->belongsTo(Event::class); }
}
