<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\Location;
use App\Mutation;
use App\People;
use App\Schedule;
use App\Type;
use App\Unit;
use App\User;
use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ControllerSystem extends Controller
{
    public function dashboarduser()
    {
        if (Auth::check()) {
            // dd(session()->all());
            // dd(Auth::user());
            $getDataAsset = Asset::count();
            $getDataMutation = Mutation::count();
            $getDataSchedule = Schedule::count();
            $getExecutedSchedule = Schedule::where('status', '=', 'Executed')->count();
            $getPostponedSchedule = Schedule::where('status', '=', 'Postponed')->count();
            $getOnProgressSchedule = Schedule::where('status', '=', 'On Progress')->count();
            $users = Auth::user()->name;
            $email = Auth::user()->email;
            // $users = session()->get('users');
            // $email = session()->get('email');
            return view('user\dashboarduser', compact('getDataAsset', 'getDataMutation', 'getDataSchedule', 'users', 'getExecutedSchedule', 'getPostponedSchedule', 'getOnProgressSchedule', 'email'));
        }
    }

    public function asset()
    {
        $status = '';
        $category = Category::all();
        $asset = Asset::all();
        foreach ($asset as $a) {
            if ($a->location) {
                $a['loc_name'] = Location::find($a->location)->loc_name;
            }
        }
        return view('user\fixedasset', compact('category', 'asset', 'status'));
    }

    public function mutation()
    {
        $status = '';
        $iduser = Auth::user()->id;
        $nameuser = Auth::user()->name;
        $idreceiver = People::where('name', $nameuser)->first();
        if ($iduser == 1) {
            $mutation = DB::table('mutations')
                ->select('mutations.id', 'mutations.slocation', 'mutations.tlocation', 'mutations.receiver', 'mutations.date', 'mutations.status', 'mutations.notes', 'peoples.name', 'locations.loc_type')
                ->join('peoples', 'mutations.receiver', 'peoples.id')
                ->join('locations', 'mutations.tlocation', 'locations.id')
                ->join('users', 'mutations.users_id', 'users.id')
                ->get();
        } else {
            $mutation = DB::table('mutations')
                ->select('mutations.id', 'mutations.slocation', 'mutations.tlocation', 'mutations.receiver', 'mutations.date', 'mutations.status', 'mutations.notes', 'peoples.name', 'locations.loc_type')
                ->join('peoples', 'mutations.receiver', 'peoples.id')
                ->join('locations', 'mutations.tlocation', 'locations.id')
                ->join('users', 'mutations.users_id', 'users.id')
                ->where('mutations.receiver', '=', $idreceiver->id)
                ->where('peoples.name', '=', $nameuser)
                ->get();
        }

        return view('user\mutation', compact('mutation', 'status'));
    }
    public function schedule()
    {
        $status = '';
        $schedule = Schedule::all();
        return view('user\schedule', compact('schedule', 'status'));
    }
    public function categories()
    {
        $status = '';
        $category = Category::all();
        return view('user\categories', compact('category', 'status'));
    }
    public function types()
    {
        $status = '';
        $type = Type::all();
        return view('user\types', compact('type', 'status'));
    }

    public function location()
    {
        $status = '';
        $location = Location::all();
        return view('user\location', compact('location', 'status'));
    }

    public function unit()
    {
        $status = '';
        $unit = Unit::all();
        return view('user\unit', compact('unit', 'status'));
    }

    public function people()
    {
        $status = '';
        $people = People::all();
        $unit = Unit::all();
        return view('user\people', compact('people', 'unit', 'status'));
    }

    public function loginpage()
    {
        return view('user\login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $getDataAsset = Asset::count();
            $getDataMutation = Mutation::count();
            $getDataSchedule = Schedule::count();
            $getExecutedSchedule = Schedule::where('status', '=', 'Executed')->count();
            $getPostponedSchedule = Schedule::where('status', '=', 'Postponed')->count();
            $getOnProgressSchedule = Schedule::where('status', '=', 'On Progress')->count();
            $datauser = User::where('email', '=', $request->email)->get();
            $users = $datauser[0]->name;
            $email = $datauser[0]->email;
            $iduser = Auth::user()->id;
            // $iduser = Auth::user()->id;
            // $nameuser = Auth::user()->name;
            // $idreceiver = People::where('name', $nameuser)->first();
            session(['users' => $users, 'email' => $email, 'id' => $iduser]);
            // dd(session()->all());
            // dd(Auth::user());
            return view('user\dashboarduser', compact('getDataAsset', 'getDataMutation', 'getDataSchedule', 'users', 'getExecutedSchedule', 'getPostponedSchedule', 'getOnProgressSchedule', 'email'));
        }
        return redirect('/loginpage');
    }

    public function vendor()
    {
        $status = '';
        $vendor = Vendor::all();
        return view('user\vendor', compact('status', 'vendor'));
    }

    public function logouttenant()
    {
        // dd(session()->all());
        Auth::logout();
        session()->flush();
        return redirect('/loginpage');
    }
}
