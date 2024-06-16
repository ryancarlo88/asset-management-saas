<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
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
        $data = new Location();
        $data->loc_name = $request->get('inpLocName');
        $data->loc_type = $request->get('radio-stacked');
        $data->save();
        $status = 'Lokasi baru berhasil ditambahkan!';
        $location = Location::all();
        return view('user\location', compact('status', 'location'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $location = Location::find($id);
            $location->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Lokasi berhasil dihapus!'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Lokasi gagal dihapus. Mungkin digunakan pada data lain.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        try {
            $id = $request->get('id');
            $field = $request->field;
            $value = $request->value;

            $location = Location::find($id);
            $location->$field = $value;
            if ($field == 'loc_type' || $field == 'loc_name') {
                if ($field == 'loc_type') {
                    if ($value == 'Intracompany' || $value == 'Intercompany') {
                        $location->save();
                        return response()->json(array(
                            'status' => 'oke',
                            'msg' => 'Data berhasil disimpan'
                        ), 200);
                    }
                } else if ($field == 'loc_name') {
                    $location->save();
                    return response()->json(array(
                        'status' => 'oke',
                        'msg' => 'Data berhasil disimpan'
                    ), 200);
                }
            } else {
                return response()->json(array(
                    'status' => 'error',
                    'msg' => 'Data gagal disimpan. Terjadi kesalahan pada pembaruan.'
                ), 200);
            }
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Data gagal disimpan. Terjadi kesalahan pada pembaruan.'
            ), 200);
        }
    }
}
