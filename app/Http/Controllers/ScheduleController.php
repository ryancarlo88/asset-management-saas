<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Schedule;
use App\Type;
use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Schedule::all();
            $arr_schedule = [];
            foreach ($data as $key => $value) {
                # code...
                array_push($arr_schedule, ['id' => $value->id, 'title' => 'Maintenance ID ' . $value->id, 'start' => $value->start_date, 'end' => $value->end_date, 'url' => url('/detailschedule/' . $value->id)]);
            }

            return response()->json($arr_schedule);
        }

        return view('user.calendar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        $asset = Asset::all();
        $vendor = Vendor::all();
        return view('user\createschedule', compact('type', 'asset', 'vendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < 12; $i++) {
            $sdate = Carbon::parse($request->get('inpSDate'))->addMonths($i);
            $edate = Carbon::parse($request->get('inpEDate'))->addMonths($i);

            $data = new Schedule();
            $data->start_date = $sdate;
            $data->end_date = $edate;
            $data->types_id = $request->get('inpType');
            $data->desc = $request->get('inpDesc');
            $data->status = $request->get('inpStatus');
            $data->vendors_id = $request->get('inpVendor');
            $data->save();

            $arr_asset = $request->get('inpItem');

            foreach ($arr_asset as $key => $value) {
                $asset = Asset::where('name', $value)->first();
                $asset->save();
                $data->asset()->attach($asset->id);
            }
        }

        $status = 'Jadwal perbaikan baru berhasil ditambahkan!';
        $schedule = Schedule::all();

        return view('user\schedule', compact('status', 'schedule'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }

    public function showScheduleDetails($id)
    {
        $s = Schedule::find($id);
        $assets = DB::table('detail_schedules')
            ->where('schedules_id', $id)
            ->join('fixed_assets', 'detail_schedules.fixed_assets_id', 'fixed_assets.id')
            ->get();
        return view('user.detailschedule', compact('s', 'assets'));
    }

    public function showScheduleDetailsForUpdate($id)
    {
        $s = Schedule::find($id);
        $type = Type::all();
        $vendor = Vendor::all();
        $assets = DB::table('detail_schedules')
            ->where('schedules_id', $id)
            ->join('fixed_assets', 'detail_schedules.fixed_assets_id', 'fixed_assets.id')
            ->get();
        return view('user.updateschedule', compact('s', 'assets', 'type', 'vendor'));
    }

    public function deleteData(Request $request)
    {

        $id = $request->get('id');
        $maintenance = Schedule::find($id);
        $maintenance->asset()->detach();
        $maintenance->delete();

        // $status = 'Jadwal perbaikan aset ' . $id . ' berhasil dihapus!';
        $status = '3';
        $pesan = 'Jadwal perbaikan aset ' . $id . ' berhasil dihapus!';
        $schedule = Schedule::all();
        return view('user\schedule', compact('status', 'schedule', 'pesan'));
    }

    public function updateData(Request $request)
    {
        $id = $request->get('inpID');
        $maintenance = Schedule::find($id);

        $maintenance->start_date = $request->get('inpSDate');
        $maintenance->end_date = $request->get('inpEDate');
        $maintenance->types_id = $request->get('inpType');
        $maintenance->desc = $request->get('inpDesc');
        $maintenance->status = $request->get('inpStatus');
        $maintenance->vendors_id = $request->get('inpVendor');
        $maintenance->save();

        $arr_asset = $request->get('inpItem');
        $maintenance->asset()->detach();

        foreach ($arr_asset as $key => $value) {
            $idasset = Asset::where('name', $value)->first()->id;
            $maintenance->asset()->attach($idasset);
        }

        $status = '2';
        $pesan = 'Jadwal perbaikan aset ' . $id . ' berhasil diubah!';
        $schedule = Schedule::all();
        return view('user\schedule', compact('status', 'schedule', 'pesan'));
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
}
