<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
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
        $data = new Vendor();
        $data->name = $request->get('inpVendor');
        $data->address = $request->get('inpAddress');
        $data->desc = $request->get('inpDesc');
        $data->save();

        $status = 'Vendor baru berhasil ditambahkan!';
        $vendor = Vendor::all();

        return view('user\vendor', compact('vendor', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $vendor = Vendor::find($id);
            $vendor->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Vendor berhasil dihapus!'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Penghapusan vendor gagal. Mungkin digunakan pada data yang lain.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $id = $request->get('id');
        $field = $request->field;
        $value = $request->value;

        $vendor = Vendor::find($id);
        $vendor->$field = $value;
        $vendor->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data berhasil disimpan'
        ), 200);
    }
}
