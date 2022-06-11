<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CellMember;

class CellsMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cellmembers = CellMember::all();
        return $cellmembers;
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
        $cellmember = new CellMember();
        $cellmember->cell_id = $request->cell_id;
        $cellmember->parishioner_id = $request->parishioner_id;
        $cellmember->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cellmember = CellMember::findOrFail($id);
        return $cellmember;
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
        $cellmember = CellMember::findOrFail($id);
        $cellmember->cell_id = $request->cell_id;
        $cellmember->parishioner_id = $request->parishioner_id;
        $cellmember->save();
        return $cellmember;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cellmember = CellMember::destroy($id);
    }
}
