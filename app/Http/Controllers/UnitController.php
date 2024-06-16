<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = new Unit();
        $data->unit = $request->get('inpUnit');
        $data->save();
        $unit = Unit::all();
        $status = 'Unit baru berhasil ditambahkan!';
        return view('user\unit', compact('unit', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $unit = Unit::find($id);
            $unit->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Unit successfully deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Unit deletion failed. It maybe used in other data.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $id = $request->get('id');
        $field = $request->field;
        $value = $request->value;

        $unit = Unit::find($id);
        $unit->$field = $value;
        $unit->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data berhasil disimpan'
        ), 200);
    }
}
