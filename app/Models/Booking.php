<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function channel()
    {
        return $this->hasOne(Channel::class);
    }

    public function ratePlan()
    {
        return $this->hasOne(RatePlan::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }
}
