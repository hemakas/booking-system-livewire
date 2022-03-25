<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Channel;
use App\Models\RatePlan;
use App\Models\Room;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->paginate(8);

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

        $bookingDate = Carbon::createFromFormat('m/d/Y', $request->bookingDate)->format('Y-m-d');
        $checkIn = Carbon::createFromFormat('m/d/Y', $request->checkIn)->format('Y-m-d');
        $checkOut = Carbon::createFromFormat('m/d/Y', $request->checkOut)->format('Y-m-d');


        Booking::create([
            'no_of_rooms' => $request->noOfRooms,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'no_of_adults' => $request->noOfAdults,
            'no_of_children' => $request->noOfChildren,
            'booking_date' => $bookingDate,
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
        $booking = Booking::find($id);
        $channels = Channel::all();
        $ratePlans = RatePlan::all();
        $rooms = Room::all();

        return view('bookings.edit', [
            'booking' => $booking,
            'channels' => $channels,
            'ratePlans' => $ratePlans,
            'rooms' => $rooms,
        ]);
        
    }


    public function update(Request $request, $id)
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

        $booking = Booking::find($id);

        $booking->no_of_rooms = $request->noOfRooms;
        // $booking->check_in = $request->checkin;
        // $booking->check_out = $request->checkout;
        $booking->no_of_adults = $request->noOfAdults;
        $booking->no_of_children = $request->noOfChildren;
        // $booking->booking_date = $request->bookingDate;
        $booking->first_name = $request->firstName;
        $booking->last_name = $request->lastName;
        $booking->contact_mobile = $request->contactMobile;
        $booking->contact_email = $request->contactEmail;
        $booking->total_amount = $request->totalAmount;
        $booking->comment = $request->comment;
        $booking->channel_id = $request->channel;
        $booking->room_id = $request->room;
        $booking->rate_plan_id = $request->ratePlan;

        $booking->update();

        return redirect()->route('bookings.index')->with('status','Booking Updated Successfully');;

    }


    public function destroy(Booking $booking)
    {
        
        $booking->delete();

        return back();
    }
}
