<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\Location;
use App\Mutation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AssetController extends Controller
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
        return view('user.fixedasset');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Asset();
        $data->name = $request->get('inpName');
        $data->code = $request->get('inpCode');
        $data->cost = $request->get('inpCost');
        $data->res_value = $request->get('inpResValue');
        $data->drate = (($request->get('inpCost') - $request->get('inpResValue')) / $request->get('inpAge')) / $request->get('inpCost');
        $data->year = $request->get('inpAge');
        $data->status = $request->get('inpStatus');
        $data->desc = $request->get('inpDesc');
        $data->users_id = User::first()->id;
        $data->categories_id = $request->get('inpCategory');
        $data->save();

        $status = 'Aset tetap baru berhasil ditambahkan!';
        $category = Category::all();
        $asset = Asset::all();

        return view('user\fixedasset', compact('status', 'category', 'asset'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        //
    }

    public function showAssetDetails($id)
    {
        $a = Asset::find($id);
        $ADE = ($a->cost - $a->res_value) / $a->year;
        $a->drate = $ADE / $a->cost * 100;
        $dcost = $a->cost;

        $bookvalue = [];
        for ($i = 1; $i <= $a->year; $i++) {
            array_push($bookvalue, ['year' => $i, 'start' => $dcost, 'rate' => $ADE, 'end' => $dcost - $ADE]);
            $dcost -= $ADE;
            # code...
        }
        if ($a->location) {
            $a['loc_name'] = Location::find($a->location)->loc_name;
        }

        return view('user.detailasset', compact('a', 'ADE', 'bookvalue'));
    }

    public function generateQrCode($id)
    {
        $a = Asset::find($id);
        $info_a_id = $a->id;
        $info_a_name = $a->name;
        $info_a_code = $a->code;
        $info_a_loc = $a->location;
        $info_a_sts = $a->status;
        $data = "ID Aset: " . $info_a_id . "\n" . "Nama Aset: " . $info_a_name . "\n" . "Kode Aset: " . $info_a_code . "\n" . "Lokasi: " . $info_a_loc . "\n" . "Status: " . $info_a_sts;
        $qr = QrCode::size(250)->generate($data);

        return view('user.barcode', ['id' => $info_a_id, 'name' => $info_a_name, 'code' => $info_a_code, 'location' => $info_a_loc, 'status' => $info_a_sts, 'qr' => $qr]);
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $asset = Asset::find($id);
            $asset->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Data Aset tetap berhasil dihapus.'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal menghapus data aset tetap. Mungkin sudah digunakan di data lain.'
            ), 200);
        }
    }

    public function showAssetDetailsForUpdate($id)
    {
        $a = Asset::find($id);
        $category = Category::all();
        return view('user.updateasset', compact('a', 'category'));
    }

    public function updateData(Request $request)
    {
        $id = $request->get('inpID');
        $asset = Asset::find($id);

        $asset->name = $request->get('inpName');
        $asset->code = $request->get('inpCode');
        $asset->cost = $request->get('inpCost');
        $asset->res_value = $request->get('inpResValue');
        $asset->drate = (($request->get('inpCost') - $request->get('inpResValue')) / $request->get('inpAge')) / $request->get('inpCost');
        $asset->year = $request->get('inpAge');
        $asset->status = $request->get('inpStatus');
        $asset->desc = $request->get('inpDesc');
        $asset->categories_id = $request->get('inpCategory');
        $asset->save();

        $status = '2';
        $pesan = 'Aset tetap berhasil diperbarui!';
        $category = Category::all();
        $asset = Asset::all();

        return view('user\fixedasset', compact('status', 'category', 'asset', 'pesan'));
    }

    public function uploadBerita(Request $request)
    {
        try {
            $id = $request->get('inpID2');
            $asset = Asset::find($id);

            $this->validate($request, [
                'inpFile' => 'required|file|mimes:pdf|max:2048'
            ]);

            $asset->file = $request->file('inpFile');
            $file_name = time() . "_" . $asset->file->getClientOriginalName();
            $upload_storage = 'data_file';
            $asset->file->move($upload_storage, $file_name);

            $asset->file = $file_name;
            $asset->save();

            return response()->json(array(
                'status' => 'ok',
                'msg' => 'File PDF berhasil diupload.'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal mengupload file PDF.'
            ), 200);
        }
    }
}
