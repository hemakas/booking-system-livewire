<?php

namespace App\Http\Controllers;

use App\Models\RatePlan;
use Illuminate\Http\Request;

class RatePlanController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('rateplans.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ratePlanName' => 'required',
        ]);

        RatePlan::create([
            'name' => $request->ratePlanName,
        ]);

        return back()->with('status','Channel created Successfully');
    }

    public function show(RatePlan $ratePlan)
    {
        //
    }

    public function edit(RatePlan $ratePlan)
    {
        //
    }

    public function update(Request $request, RatePlan $ratePlan)
    {
        //
    }

    public function destroy(RatePlan $ratePlan)
    {
        //
    }
}
