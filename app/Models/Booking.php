<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function setDateAttr($val)
    {
        return Carbon::createFromFormat('m/d/Y', $val)->format('Y-m-d');
    }

    public function getCheckInAttr()
    {
        if($this->attributes['check_in']) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['check_in'])->format('m/d/Y');
        } else {
            return Carbon::today()->format('m/d/Y');
        }
    }

    public function getCheckOutAttr()
    {
        if($this->attributes['check_out']) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['check_out'])->format('m/d/Y');
        } else {
            return Carbon::today()->format('m/d/Y');
        }
    }
    
    public function getBookingDateAttr()
    {
        if($this->attributes['booking_date']) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['booking_date'])->format('m/d/Y');
        } else {
            return Carbon::today()->format('m/d/Y');
        }
    }

}
