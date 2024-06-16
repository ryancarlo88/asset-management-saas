@extends('layouts.adminmart')

@section('breadcrumb')
Permohonan Verifikasi Pengguna
@endsection

@section('breadcrumbmenu')
PVP
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
            <li class="sidebar-item"> 
                <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" aria-expanded="false">
                    <i data-feather="log-out" class="feather-icon"></i>
                    <span class="hide-menu">Keluar</span></a>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        
                    </form>
                </li>
                
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>    
@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<div>
    <strong>{{session('status')}}</strong>
</div>
</div>
@endif
<div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered no-wrap">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Perusahaan</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Domain Terdaftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
            <input type="hidden" name='id' value='{{$u->id}}'>
            <tr id="tr_{{$u->id}}">
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->cpyname}}</td>
                <td>{{$u->address}}</td>
                <td>{{$u->postalcode}}</td>
                <td>{{$u->domain}}</td>
                <td>
                    <a href="{{url('/verify/'.$u->id)}}" class="btn waves-effect waves-light btn-success">Verify</a>
                    <button type="submit" class="btn waves-effect waves-light btn-danger"
                        onclick="if(confirm('Apakah anda ingin membatalkan verifikasi pengguna ini?')) deleteDataFromTR({{$u->id}})">Hapus</button>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
function deleteDataFromTR(id){
    $.post('{{route('user.cancelVerification')}}',{_token:"<?php echo csrf_token(); ?>", id:id},
        function(data){
            if(data.status == 'ok'){
                alert(data.msg)
                $('#tr_'+ id).remove();
            }
            else{
                alert(data.msg)
            }
        }
    )};
</script>
    
@endsection