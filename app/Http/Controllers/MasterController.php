<?php

namespace App\Http\Controllers;

use App\Tenant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function dashboardmaster()
    {
        $user = DB::select('SELECT * FROM users u WHERE u.domain NOT IN (SELECT domain FROM domains);');
        return view('master\dashboardmaster', compact('user'));
    }

    public function tenants()
    {
        $user = DB::select('SELECT * FROM users u WHERE u.domain IN (SELECT domain FROM domains);');
        return view('master\tenants', compact('user'));
    }

    public function createtenancy(Request $request, $id)
    {
        $user = User::find($id);
        // Untuk buat tenant
        $tenant = Tenant::create(); // ini buat tenant sama db otomatis
        $tenant->domains()->create([
            'domain' => $user->domain,
        ]);

        // Buat masuk db tenant
        tenancy()->initialize($tenant);
        $tenant = new User();
        $tenant->name = $user->name;
        $tenant->email = $user->email;
        $tenant->password = $user->password;
        $tenant->save();
        tenancy()->end();

        return redirect('/dashboardmaster')->with('status', 'Tenant Berhasil Diverifikasi!');
    }

    public function cancelVerification(Request $request)
    {
        try {
            $id = $request->get('id');
            $user = User::find($id);
            $user->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Verifikasi User Berhasil Dibatalkan!'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal Melakukan Verifikasi User!'
            ), 200);
        }
    }
}
