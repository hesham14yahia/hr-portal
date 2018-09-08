<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Employee;
use App\Status;

class Attendance extends Model

{
    protected $fillable = ['employee_id', 'status_id'];

    public function employee() {
        return $this->belongsTo('App\Employee', 'employee_id');
    }

}
