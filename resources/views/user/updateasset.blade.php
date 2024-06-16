@extends('layouts.adminmart')

@section('breadcrumb')
Perbarui Fixed Asset
@endsection

@section('breadcrumbmenu')
Perbarui Fixed Asset
@endsection

@section('leftsidebar')
<div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap"><span class="hide-menu">Menu Utama</span></li>
            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('dashboarduser')}}"
                    aria-expanded="false"><i data-feather="bar-chart-2" class="feather-icon"></i>
                    <span class="hide-menu">Dasbor</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Aset Tetap
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('categories')}}" class="sidebar-link"><span
                                class="hide-menu"> Kategori </span></a></li>
                    <li class="sidebar-item"><a href="{{url('fixedasset')}}" class="sidebar-link"><span
                                class="hide-menu"> Data Aset Tetap </span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                    class="hide-menu">Mutasi Aset Tetap
                </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="{{url('mutation')}}" class="sidebar-link"><span class="hide-menu"> Lihat Mutasi</span></a></li>
                <li class="sidebar-item"><a href="{{url('location')}}" class="sidebar-link"><span class="hide-menu"> Lokasi </span></a></li>
            </ul>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                        class="hide-menu">Jadwal
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('types')}}" class="sidebar-link"><span class="hide-menu">
                                Tipe Perbaikan </span></a></li>
                    <li class="sidebar-item"><a href="{{url('schedule')}}" class="sidebar-link"><span class="hide-menu">
                                Kalender </span></a></li>
                </ul>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                        class="hide-menu">Sumber Daya
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('unit')}}" class="sidebar-link"><span class="hide-menu"> Unit </span></a></li>
                    <li class="sidebar-item"><a href="{{url('people')}}" class="sidebar-link"><span class="hide-menu"> Orang </span></a></li>
                    <li class="sidebar-item"><a href="{{url('vendor')}}" class="sidebar-link"><span class="hide-menu"> Vendor </span></a></li>
                </ul>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('tenant.logouttenant') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" aria-expanded="false">
                    <i data-feather="log-out" class="feather-icon"></i>
                    <span class="hide-menu">Keluar</span></a>
            </li>
            <form id="logout-form" action="{{ route('tenant.logouttenant') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
            {{--  <li class="list-divider"></li>
            <li class="nav-small-cap"><span class="hide-menu">UI Components</span></li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                        class="hide-menu">Bootstrap
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="docs-ui-buttons.html" class="sidebar-link"><span class="hide-menu"> Buttons </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-modals.html" class="sidebar-link"><span class="hide-menu"> Modals </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-tabs.html" class="sidebar-link"><span class="hide-menu"> Tabs </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-tooltip-popover.html" class="sidebar-link"><span class="hide-menu"> Tooltip & Popover </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-notification.html" class="sidebar-link"><span class="hide-menu"> Notification </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-progressbar.html" class="sidebar-link"><span class="hide-menu"> Progressbar </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-typography.html" class="sidebar-link"><span class="hide-menu"> Typography </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-bootstrapui.html" class="sidebar-link"><span class="hide-menu"> Bootstrap UI </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-breadcrumb.html" class="sidebar-link"><span class="hide-menu"> Breadcrumb </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-listmedia.html" class="sidebar-link"><span class="hide-menu"> List Media </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-grid.html" class="sidebar-link"><span class="hide-menu"> Grid </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-carousel.html" class="sidebar-link"><span class="hide-menu"> Carousel </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-scrollspy.html" class="sidebar-link"><span class="hide-menu"> Scrollspy </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-toasts.html" class="sidebar-link"><span class="hide-menu"> Toasts </span></a></li>
                    <li class="sidebar-item"><a href="docs-ui-spinner.html" class="sidebar-link"><span class="hide-menu"> Spinner </span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="edit" class="feather-icon"></i><span
                        class="hide-menu">Customized
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="docs-custom-datatables.html" class="sidebar-link"><span class="hide-menu"> Datatables </span></a></li>
                    <li class="sidebar-item"><a href="docs-custom-widgets.html" class="sidebar-link"><span class="hide-menu"> Widgets </span></a></li>
                    <li class="sidebar-item"><a href="docs-custom-chart-chartjs.html" class="sidebar-link"><span class="hide-menu"> ChartJs </span></a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
@endsection

@section('no')
<li class="breadcrumb-item text-muted" aria-current="page">{{$a->id}}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h6>Kategori</h6>
                <form method="POST" action="{{route('fixedasset.updateData')}}">
                    @csrf
                    <input type="hidden" name="inpID" value="{{$a->id}}">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="inpCategory">
                            @foreach ($category as $c)
                            <option value="{{$c->id}}" {{($c->id == $a->category->id) ? 'selected' : ''}}>{{$c->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h6>Nama Aset</h6>
                    <div class="form-group">
                        <input type="text" class="form-control" id="placeholder" name="inpName"
                            placeholder="Asset Name" value="{{$a->name}}" required>
                    </div>
                    <h6>Kode</h6>
                    <div class="form-group">
                        <input type="text" class="form-control" id="placeholder" name="inpCode"
                            placeholder="Asset Code" value="{{$a->code}}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Status</h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="inpStatus">
                            <option value="On Procurement" {{($a->status == 'On Procurement') ? 'selected' : ''}}>On Procurement</option>
                            <option value="Assigned" {{($a->status == 'Assigned') ? 'selected' : ''}}>Assigned</option>
                            <option value="Disposed" {{($a->status == 'Disposed') ? 'selected' : ''}}>Disposed</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Harga</h6>
                        </div>
                        <div class="col-md-4">
                            <h6>Umur</h6>
                        </div>
                        <div class="col-md-4">
                            <h6>Nilai Residu</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="inpCost" placeholder="Costs" value="{{$a->cost}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="inpAge" placeholder="Age" value="{{$a->year}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="inpResValue" placeholder="Res. Value" value="{{$a->res_value}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Deskripsi</h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="inpDesc"
                            placeholder="Isi deskripsi disini..." required>{{$a->desc}}</textarea>
                    </div>
                    <div style="float: right;">
                        <a href="{{url('/fixedasset')}}" type="button" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
    </div>
    <div class="card-body">
        <h6>Upload Berita Acara Pelepasan Aset (File PDF)</h6>
        <form method="POST" action="{{route('fixedasset.uploadBerita')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="inpID2" value="{{$a->id}}">
                <input type="file" class="form-control" id="placeholder" name="inpFile">
                <div style="float: right;">
                <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection


@section('script')
<script>
 
</script>
@endsection
