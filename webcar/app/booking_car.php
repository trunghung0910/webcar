<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking_car extends Model
{
    public function car(){
        return $this->hasOne(car::class,'id','car_id');
    }
}
