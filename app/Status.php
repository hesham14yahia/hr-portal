<?php

namespace App;

use App\Attendance;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function statusAtts(){
        return $this->hasOne('App\Attendance', 'status_id');
    }
}
