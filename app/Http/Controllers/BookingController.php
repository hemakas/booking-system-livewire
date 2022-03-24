<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Channel;
use App\Models\RatePlan;
use App\Models\Room;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();

        return view('bookings.index', 
        [
            'bookings' => $bookings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        // dd($request->channel);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
