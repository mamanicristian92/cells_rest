<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cells;

class CellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cells = Cell::all();
        return $cells;
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
        $cell = new Cell();
        $cell->name = $request->name;
        $cell->leader_id = $request->leader_id;
        $cell->assistant_id = $request->assistant_id;
        $cell->address = $request->address;
        $cell->city = $request->city;
        $cell->city_id = $request->city_id;
        $cell->state_id = $request->state_id;
        $cell->save();
        //return $cell;
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
        $cell = Cell::findOrFail($id);
        $cell->name = $request->name;
        $cell->leader_id = $request->leader_id;
        $cell->assistant_id = $request->assistant_id;
        $cell->address = $request->address;
        $cell->city = $request->city;
        $cell->city_id = $request->city_id;
        $cell->state_id = $request->state_id;
        $cell->save();
        return $cell;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cell = Cell::destroy($id);
    }
}
