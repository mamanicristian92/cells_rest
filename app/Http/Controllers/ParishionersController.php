<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parishioner;

class ParishionersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parishioners=Parishioner::all();
        return $parishioners;
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
        $parishioner = new Parishioner();
        $parishioner->lastname = $request->lastname;
        $parishioner->firstname = $request->firstname;
        $parishioner->doctype = $request->doctype;
        $parishioner->docnumber = $request->docnumber;
        $parishioner->birthday = $request->birthday;
        $parishioner->address = $request->address;
        $parishioner->city_id = $request->city_id;
        $parishioner->phonenumber = $request->phonenumber;
        $parishioner->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parishioner = Parishioner::findOrFail($id);
        return $parishioner;
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
        $parishioner = Parishioner::findOrFail($request->id);
        $parishioner->lastname = $request->lastname;
        $parishioner->firstname = $request->firstname;
        $parishioner->doctyep = $request->doctype;
        $parishioner->docnumber = $request->docnumber;
        $parishioner->birthday = $request->birthday;
        $parishioner->address = $request->address;
        $parishioner->city_id = $request->city_id;
        $parishioner->city = $request->city;
        $parishioner->phonenumber = $request->phonenumber;

        $parishioner->save();
        return $parishioner;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parishioner = Parishioner::destroy($id);
    }
}

