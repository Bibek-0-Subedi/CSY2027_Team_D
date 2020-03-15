<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function path(){
        return route('student.show', $this);
    }
}
