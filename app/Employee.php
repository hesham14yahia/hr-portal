<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Attendance;

class Employee extends Model
{
    public function Attendances(){
        return $this->hasMany('App\Attendance', 'employee_id');
    }
}
