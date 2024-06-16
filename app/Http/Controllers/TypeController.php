<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        return view('user.types');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Type();
        $data->type = $request->get('inpType');
        $data->save();
        $type = Type::all();
        $status = 'Tipe perbaikan baru berhasil ditambahkan!';
        return view('user\types', compact('type', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $type = Type::find($id);
            $type->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Maintenance Type successfully deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Maintenance Type deletion failed. It maybe used in other data.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $id = $request->get('id');
        $field = $request->field;
        $value = $request->value;

        $type = Type::find($id);
        $type->$field = $value;
        $type->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data berhasil disimpan'
        ), 200);
    }
}
