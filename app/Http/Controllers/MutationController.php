<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Location;
use App\Mutation;
use App\People;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;
use function PHPUnit\Framework\isNull;

class MutationController extends Controller
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
        return view('user\createmutation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Mutation();
        $data->date = $request->get('inpDate');
        $data->slocation = $request->get('loc_id1');
        $data->tlocation = $request->get('loc_id2');
        $data->receiver = $request->get('receiver_id');
        $data->notes = $request->get('inpNotes');
        $data->users_id = User::first()->id;
        $data->save();

        $arr_asset = $request->get('inpItem');

        foreach ($arr_asset as $key => $value) {
            $asset = Asset::where('name', $value)->first();
            // $asset->location = $data->tlocation;
            $asset->save();
            $data->asset()->attach($asset->id);
        }

        $status = 'Mutasi Aset baru berhasil ditambahkan!';
        $mutation = DB::table('mutations')
            ->select('mutations.id', 'mutations.slocation', 'mutations.tlocation', 'mutations.receiver', 'mutations.date', 'mutations.status', 'mutations.notes', 'peoples.name', 'locations.loc_type')
            ->join('peoples', 'mutations.receiver', 'peoples.id')
            ->join('locations', 'mutations.tlocation', 'locations.id')
            ->join('users', 'mutations.users_id', 'users.id')
            ->get();

        return view('user\mutation', compact('status', 'mutation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function show(Mutation $mutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function edit(Mutation $mutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mutation $mutation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }

    public function getAsset(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $asset = Asset::orderby('name', 'asc')->select('name', 'code')->limit(10)->get();
        } else {
            $asset = Asset::orderby('name', 'asc')->select('name', 'code')->where('name', 'like', '%' . $search . '%')->limit(10)->get();
        }

        $response = array();
        foreach ($asset as $a) {
            $response[] = array("value" => $a->code, "label" => $a->name);
        }

        return response()->json($response);
    }

    public function getLocation(Request $request)
    {
        $search = $request->search;
        $typeLoc = $request->radiostacked;
        $nondefinedLoc = Location::all()->whereNull('loc_type');
        $inter = Location::all()->where('loc_type', '=', 'Intercompany');
        $intra = Location::all()->where('loc_type', '=', 'Intracompany');
        $merged = collect([]);

        if ($search != '') {
            $nondefinedLoc = Location::whereNull('loc_type')->where('loc_name', 'like', '%' . $search . '%')->limit(10)->get();
            $inter = Location::where('loc_type', '=', 'Intercompany')->where('loc_name', 'like', '%' . $search . '%')->limit(10)->get();
            $intra = Location::where('loc_type', '=', 'Intracompany')->where('loc_name', 'like', '%' . $search . '%')->limit(10)->get();
        }
        if ($typeLoc == 'Intracompany') {
            $merged = $intra->merge($nondefinedLoc);
        } elseif ($typeLoc == 'Intercompany') {
            $merged = $inter->merge($nondefinedLoc);
        } else {
            $merged = $inter->merge($nondefinedLoc)->merge($intra);
        }
        $res = $merged->all();
        $response = array();
        foreach ($res as $l) {
            $response[] = array("value" => $l->id, "label" => $l->loc_name);
        }

        return response()->json($response);
    }

    public function getReceiver(Request $request)
    {
        $search = $request->search;
        $typeLoc = $request->radiostacked;
        $people = DB::table('peoples')
            ->join('units', 'units_id', 'units.id')
            ->select('peoples.id', 'peoples.name', 'units.unit')
            ->where('peoples.name', 'like', '%' . $search . '%')
            ->limit(10)
            ->get();

        if ($typeLoc == 'Intracompany') {
            $people = DB::table('peoples')
                ->join('units', 'units_id', 'units.id')
                ->select('peoples.id', 'peoples.name', 'units.unit')
                ->where('peoples.name', 'like', '%' . $search . '%')
                ->where('units.unit', 'not like', '%' . '3rd Party' . '%')
                ->limit(10)
                ->get();
        } elseif ($typeLoc == 'Intercompany') {
            $people = DB::table('peoples')
                ->join('units', 'units_id', 'units.id')
                ->select('peoples.id', 'peoples.name', 'units.unit')
                ->where('peoples.name', 'like', '%' . $search . '%')
                ->where('units.unit', 'like', '%' . '3rd Party' . '%')
                ->limit(10)
                ->get();
        } else {
            $people = DB::table('peoples')
                ->join('units', 'units_id', 'units.id')
                ->select('peoples.id', 'peoples.name', 'units.unit')
                ->where('peoples.name', 'like', '%' . $search . '%')
                ->limit(10)
                ->get();
        }

        foreach ($people as $p) {
            $response[] = array("value" => $p->id, "label" => $p->name);
        }

        return response()->json($response);
    }

    // public function showMutationDetails($id)
    // {
    //     $m = DB::table('mutations')
    //         ->select('mutations.id', 'mutations.slocation', 'mutations.tlocation', 'mutations.receiver', 'mutations.date', 'mutations.status', 'mutations.notes', 'users.name', 'locations.loc_type')
    //         ->where('mutations.id', '=', $id)
    //         ->join('peoples', 'mutations.receiver', 'peoples.id')
    //         ->join('locations', 'mutations.tlocation', 'locations.id')
    //         ->join('users', 'mutations.users_id', 'users.id')
    //         ->get();

    //     $assets = DB::table('detail_mutations')
    //         ->where('mutations_id', $id)
    //         ->join('fixed_assets', 'detail_mutations.fixed_assets_id', 'fixed_assets.id')
    //         ->get();
    //     return view('user.detailmutation', compact('m', 'assets'));
    // }

    public function showMutationDetails($id)
    {
        $m = DB::table('mutations')
            ->select('mutations.id', 'mutations.slocation', 'mutations.tlocation', 'mutations.receiver', 'mutations.date', 'mutations.status', 'mutations.notes', 'users.name', 'locations.loc_type')
            ->where('mutations.id', '=', $id)
            ->join('peoples', 'mutations.receiver', 'peoples.id')
            ->join('locations', 'mutations.tlocation', 'locations.id')
            ->join('users', 'mutations.users_id', 'users.id')
            ->get();

        $assets = DB::table('detail_mutations')
            ->where('mutations_id', $id)
            ->join('fixed_assets', 'detail_mutations.fixed_assets_id', 'fixed_assets.id')
            ->get();
        return view('user.detailmutation', compact('m', 'assets'));
    }

    // public function deleteData(Request $request)
    // {
    //     try {
    //         $id = $request->get('id');
    //         $mutation = Mutation::find($id);
    //         $mutation->asset()->detach();
    //         $mutation->delete();
    //         return response()->json(array(
    //             'status' => 'ok',
    //             'msg' => 'Mutation successfully deleted'
    //         ), 200);
    //     } catch (\PDOException $e) {
    //         return response()->json(array(
    //             'status' => 'error',
    //             'msg' => 'Mutation deletion failed. It maybe used in other data.'
    //         ), 200);
    //     }
    // }

    // public function editData(Request $request)
    // {
    //     $id = $request->get('inpID');
    //     $mutation = Mutation::find($id);

    //     $mutation->date = $request->get('inpDate');
    //     $mutation->slocation = $request->get('loc_id1');
    //     $mutation->tlocation = $request->get('loc_id2');
    //     $mutation->receiver = $request->get('receiver_id');
    //     $mutation->notes = $request->get('inpNotes');
    //     $mutation->users_id = User::first()->id;
    //     $mutation->save();

    //     $arr_asset = $request->get('inpItem');
    //     $mutation->asset()->detach();

    //     foreach ($arr_asset as $key => $value) {
    //         $idasset = Asset::where('name', $value)->first()->id;
    //         $mutation->asset()->attach($idasset);
    //     }

    //     return redirect('/mutation')->with('status', 'Asset Mutation Successfully Updated!');
    // }

    // public function dataForUpdate($id)
    // {
    //     $m = Mutation::find($id);
    //     return view('user.updatemutation', compact('m'));
    // }

    public function validateMutation(Request $request)
    {
        try {
            $id = $request->get('id');
            $mutation = Mutation::find($id);
            if (!is_null($mutation->status)) {
                return response()->json(array(
                    'status' => 'warning',
                    'msg' => 'Mutasi ' . $id . ' hanya dapat divalidasi atau dibatalkan sekali!'
                ), 200);
            } else {
                $mutation->status = 'Validated';
                $mutation->save();

                $arr_asset = DB::table('detail_mutations')->where('mutations_id', '=', $id)->get();
                foreach ($arr_asset as $key => $value) {
                    $asset = Asset::find($value->fixed_assets_id);
                    $asset->location = $mutation->tlocation;
                    $asset->save();
                }
                return response()->json(array(
                    'status' => 'ok',
                    'msg' => 'Mutasi ' . $id . ' berhasil divalidasi'
                ), 200);
            }
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal untuk memvalidasi mutasi ' . $id
            ), 200);
        }
    }

    public function cancelMutation(Request $request)
    {
        try {
            $id = $request->get('id');
            $mutation = Mutation::find($id);
            if (!is_null($mutation->status)) {
                return response()->json(array(
                    'status' => 'warning',
                    'msg' => 'Mutasi ' . $id . ' hanya dapat divalidasi atau dibatalkan sekali!'
                ), 200);
            } else {
                $mutation->status = 'Cancelled';
                $mutation->reason = $request->get('reason');
                $mutation->save();

                $arr_asset = DB::table('detail_mutations')->where('mutations_id', '=', $id)->get();
                foreach ($arr_asset as $key => $value) {
                    $asset = Asset::find($value->fixed_assets_id);
                    $asset->location = $mutation->slocation;
                    $asset->save();
                }
                return response()->json(array(
                    'status' => 'ok',
                    'msg' => 'Mutasi ' . $id . ' berhasil dibatalkan'
                ), 200);
            }
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal untuk membatalkan mutasi ' . $id
            ), 200);
        }
    }
}
