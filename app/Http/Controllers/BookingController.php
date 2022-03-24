<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Channel;
use App\Models\RatePlan;
use App\Models\Room;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::paginate(5);

        return view('bookings.index', 
        [
            'bookings' => $bookings
        ]);
    }

    public function create(Request $request)
    {
        $channels = Channel::all();
        $ratePlans = RatePlan::all();
        $rooms = Room::all();
        
        return view('bookings.create', 
        [
            'channels' => $channels,
            'ratePlans' => $ratePlans,
            'rooms' => $rooms,
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'channel' => 'required',
            'room' => 'required',
            'ratePlan' => 'required',
            'comment' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'contactMobile' => 'required',
            'contactEmail' => 'required',
        ]);

        Booking::create([
            'no_of_rooms' => $request->noOfRooms,
            // 'check_in' => $request->checkin,
            // 'check_out' => $request->checkout,
            'no_of_adults' => $request->noOfAdults,
            'no_of_children' => $request->noOfChildren,
            // 'booking_date' => $request->bookingDate,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'contact_mobile' => $request->contactMobile,
            'contact_email' => $request->contactEmail,
            'total_amount' => $request->totalAmount,
            'comment' => $request->comment,
            'channel_id' => $request->channel,
            'room_id' => $request->room,
            'rate_plan_id' => $request->ratePlan,
        ]);

        return redirect()->route('bookings.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
