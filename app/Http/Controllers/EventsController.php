<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        return $events;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->eventtype_id = $request->eventtype_id;
        $event->locationname = $request->locationname;
        $event->address = $request->address;
        $event->city_id = $request->city_id;
        $event->city = $request->city;
        $event->starttime = $request->starttime;
        $event->endtime = $request->endtime;
        if ($request->photopath != null) {
            $path = $request->file('photopath')->store('public/events');
            $path = substr($path,6);
            $event->photopath = url("/storage".$path);
        }
        else {
            $event->photopath = null;
        }
        $event->save();
        //return $event;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event=Event::findOrFail($id);
        return $event;
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
        $event = Event::findOrFail($request->id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->eventtype_id = $request->eventtype_id;
        $event->locationname = $request->locationname;
        $event->address = $request->address;
        $event->city_id = $request->city_id;
        $event->city = $request->city;
        $event->starttime = $request->starttime;
        $event->endtime = $request->endtime;
        if ($request->photopath != null) {
            $path = $request->file('photopath')->store('public/events');
            $path = substr($path,6);
            $event->photopath = url("/storage".$path);
        }
        else {
            $event->photopath = null;
        }
        $event->save();
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::destroy($id);
    }
}
