<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'channelName' => 'required',
        ]);

        Channel::create([
            'name' => $request->channelName,
        ]);

        return back()->with('status','Channel created Successfully');
    }

    public function show(Channel $channel)
    {
        //
    }

    public function edit(Channel $channel)
    {
        //
    }

    public function update(Request $request, Channel $channel)
    {
        //
    }

    public function destroy(Channel $channel)
    {
        //
    }
}
