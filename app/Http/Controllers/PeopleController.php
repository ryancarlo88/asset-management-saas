<?php

namespace App\Http\Controllers;

use App\People;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PeopleController extends Controller
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
        return view('user.people');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkStaff = $request->get('notStaff');
        if ($checkStaff == 1) {
            $data = new People();
            $data->name = $request->get('inpName');
            $data->users_id = 1;
            $data->units_id = $request->get('inpUnit');
            $data->save();
        } else {
            $akun = new User();
            $akun->name = $request->get('inpName');
            $akun->email = $request->get('inpEmail');
            $hashed = Hash::make($request->get('inpPassword'));
            $akun->password = $hashed;
            $akun->save();

            $idakun = $akun->id;
            $data = new People();
            $data->name = $request->get('inpName');
            $data->users_id = $idakun;
            $data->units_id = $request->get('inpUnit');
            $data->save();
        }
        //buatin akun people


        $status = 'Orang baru berhasil ditambahkan!';
        $people = People::all();
        $unit = Unit::all();
        return view('user\people', compact('people', 'status', 'unit'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        //
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $people = People::find($id);
            $people->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'People successfully deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'People deletion failed. It maybe used in other data.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $id = $request->get('id');
        $field = $request->field;
        $value = $request->value;

        $people = People::find($id);
        $people->$field = $value;
        $people->save();

        $akun = User::find($id);
        $akun->name = $value;
        $akun->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data berhasil disimpan'
        ), 200);
    }
}
