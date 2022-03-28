<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'roomName' => 'required',
        ]);

        Room::create([
            'name' => $request->roomName,
        ]);

        return back()->with('status','Room created Successfully');
    }

    public function show(Room $room)
    {
        //
    }

    public function edit(Room $room)
    {
        //
    }

    public function update(Request $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        //
    }
}
