@extends('layouts.adminmart')

@section('breadcrumb')
Tenant Terdaftar
@endsection

@section('breadcrumbmenu')
Tenant
@endsection

@section('leftsidebar')
<div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap"><span class="hide-menu">Menu Utama</span></li>
            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('dashboardmaster')}}"
            aria-expanded="false"><i data-feather="bar-chart-2" class="feather-icon"></i>
                <span class="hide-menu">Verifikasi</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('tenants')}}"
            aria-expanded="false"><i data-feather="clipboard" class="feather-icon"></i>
                <span class="hide-menu">Tenant Terdaftar</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" aria-expanded="false">
                    <i data-feather="log-out" class="feather-icon"></i>
                    <span class="hide-menu">Keluar</span></a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>    
@endsection

@section('content')
<div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered no-wrap">
        <thead>
            <tr>
                <th>Userame</th>
                <th>Email</th>
                <th>Nama Perusahaan</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Domain Terdaftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
            <input type="hidden" name='id' value='{{$u->id}}'>
            <tr>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->cpyname}}</td>
                <td>{{$u->address}}</td>
                <td>{{$u->postalcode}}</td>
                <td>{{$u->domain}}</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection