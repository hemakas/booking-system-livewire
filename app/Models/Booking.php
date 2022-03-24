<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_of_rooms',
        'check_in',
        'check_out',
        'no_of_adults',
        'no_of_children',
        'booking_date',
        'first_name',
        'last_name',
        'contact_mobile',
        'contact_email',
        'total_amount',
        'comment',
        'channel_id',
        'room_id',
        'rate_plan_id'
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function ratePlan()
    {
        return $this->belongsTo(RatePlan::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
