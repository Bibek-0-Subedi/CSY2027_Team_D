<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function path(){
        return route('staff.show', $this);
    }
}
