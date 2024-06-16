@extends('layouts.adminmart')

@section('breadcrumb')
Dasbor
@endsection

@section('breadcrumbmenu')
Dasbor
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
            @if (Auth::user()->id == 1)
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Aset
                        Tetap
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('categories')}}" class="sidebar-link"><span
                                class="hide-menu"> Kategori </span></a></li>
                    <li class="sidebar-item"><a href="{{url('fixedasset')}}" class="sidebar-link"><span
                                class="hide-menu"> Data Aset Tetap </span></a></li>
                </ul>
            </li>
            @endif
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Mutasi
                        Aset Tetap
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('mutation')}}" class="sidebar-link"><span class="hide-menu">
                                Lihat Mutasi</span></a></li>
                    @if(Auth::user()->id == 1)
                    <li class="sidebar-item"><a href="{{url('location')}}" class="sidebar-link"><span class="hide-menu">
                                Lokasi </span></a></li>
                                @endif
                </ul>
            </li>
                @if(Auth::user()->id == 1)
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Jadwal
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('types')}}" class="sidebar-link"><span class="hide-menu">
                                Tipe Perbaikan </span></a></li>
                    <li class="sidebar-item"><a href="{{url('schedule')}}" class="sidebar-link"><span class="hide-menu">
                                Kalender </span></a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->id == 1)
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Sumber
                        Daya
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('unit')}}" class="sidebar-link"><span class="hide-menu">
                                Unit </span></a></li>
                    <li class="sidebar-item"><a href="{{url('people')}}" class="sidebar-link"><span class="hide-menu">
                                Orang </span></a></li>
                    <li class="sidebar-item"><a href="{{url('vendor')}}" class="sidebar-link"><span class="hide-menu">
                                Vendor </span></a></li>
                </ul>
            </li>
            @endif
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

@section('content')
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a href="#welcome" data-toggle="tab" aria-expanded="true" class="nav-link active">
            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
            <span class="d-none d-lg-block">Informasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#guideline" data-toggle="tab" aria-expanded="false" class="nav-link">
            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
            <span class="d-none d-lg-block">Pedoman</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#lactivity" data-toggle="tab" aria-expanded="false" class="nav-link">
            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
            <span class="d-none d-lg-block">Info Pengguna</span>
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="welcome">
        {{-- <p>Selamat datang di Sistem Manajemen Aset Berbasis SaaS. Ini merupakan sistem yang digunakan untuk mengelola
            aset tetap perusahaan. Sistem ini dapat memenuhi kebutuhan banyak perusahaan dalam satu waktu, karena
            menggunakan basis SaaS (Software as a Service). Hal ini dapat mempermudah dan meringankan proses bisnis dari
            banyak
            perusahaan.</p>
        <br> --}}
        <h3 class="text-dark font-weight-medium mb-0"><strong>Informasi Sistem</strong></h3>
        <br>
        <div class="card-group">
            <div class="card border-right bg-info">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-white mb-1 font-weight-medium">{{$getDataAsset}}</h2>
                            </div>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total Aset Tetap</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white" style="font-size: 42px"><i class="fas fa-boxes"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right bg-info">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-white mb-1 w-100 text-truncate font-weight-medium">{{$getDataMutation}}</h2>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total Mutasi Aset
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white" style="font-size: 42px"><i class="fas fa-shipping-fast"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right bg-info">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-white mb-1 font-weight-medium">{{$getDataSchedule}}</h2>
                            </div>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total Jadwal Maintenance
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white" style="font-size: 42px"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-group">
            <div class="card border-right bg-info">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-white mb-1 font-weight-medium">{{$getOnProgressSchedule}}</h2>
                            </div>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total On Progress
                                Maintenance</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white" style="font-size: 42px"><i class="fas fa-clock"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right bg-info">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-white mb-1 w-100 text-truncate font-weight-medium">{{$getPostponedSchedule}}
                            </h2>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total Postponed
                                Maintenance
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white" style="font-size: 42px"><i
                                    class="fas fa-exclamation-triangle"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right bg-info">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-white mb-1 font-weight-medium">{{$getExecutedSchedule}}</h2>
                            </div>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Total Executed
                                Maintenance</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white" style="font-size: 42px"><i
                                    class="fas fa-calendar-check"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="guideline">
        <div class="row">
            <div class="col-sm-3 mb-2 mb-sm-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                        role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                        <span class="d-none d-lg-block">Pengenalan Sistem</span>
                    </a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">
                        <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                        <span class="d-none d-lg-block">Inisiasi</span>
                    </a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                        aria-controls="v-pills-settings" aria-selected="false">
                        <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                        <span class="d-none d-lg-block">Memasukan Data</span>
                    </a>
                    <a class="nav-link" id="v-pills-ubah-tab" data-toggle="pill" href="#v-pills-ubah" role="tab"
                        aria-controls="v-pills-ubah" aria-selected="false">
                        <i class="mdi mdi-ubah-outline d-lg-none d-block mr-1"></i>
                        <span class="d-none d-lg-block">Mengubah Data</span>
                    </a>
                    <a class="nav-link" id="v-pills-hapus-tab" data-toggle="pill" href="#v-pills-hapus" role="tab"
                        aria-controls="v-pills-hapus" aria-selected="false">
                        <i class="mdi mdi-hapus-outline d-lg-none d-block mr-1"></i>
                        <span class="d-none d-lg-block">Menghapus Data</span>
                    </a>
                    <a class="nav-link" id="v-pills-validasi-tab" data-toggle="pill" href="#v-pills-validasi" role="tab"
                        aria-controls="v-pills-validasi" aria-selected="false">
                        <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                        <span class="d-none d-lg-block">Validasi / Pembatalan</span>
                    </a>
                    <a class="nav-link" id="v-pills-qrcode-tab" data-toggle="pill" href="#v-pills-qrcode" role="tab"
                        aria-controls="v-pills-qrcode" aria-selected="false">
                        <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                        <span class="d-none d-lg-block">QR Code</span>
                    </a>
                </div>
            </div> <!-- end col-->

            <div class="col-sm-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Apa sistem ini?</strong></h3>
                        <p class="mb-2" align="justify">Sistem Manajemen Aset ini dirancang menjadi Software as a
                            Service untuk menjadi
                            layanan yang dapat memenuhi kebutuhan banyak perusahaan dalam satu waktu. </p>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Apa itu layanan SaaS?</strong></h3>
                        <p class="mb-2" align="justify">Layanan SaaS atau Software as a Service adalah
                            jenis layanan cloud computing yang ada pada internet,
                            yang memungkinkan beberapa pengguna untuk menggunakan layanan tersebut secara bersamaan,
                            tanpa menginterupsi aktivitas mereka masing-masing.</p>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Fitur apa saja yang disediakan?</strong>
                        </h3>
                        <p class="mb-2" align="justify">Pada sistem manajemen aset ini,
                            disediakan beberapa fitur yang dapat menunjang proses bisnis pada perusahaan.
                            Fitur sistem terdiri dari:
                            <ul>
                                <li>Dashboard yang menampilkan informasi penting terkait manajemen aset sebuah
                                    perusahaan</li>
                                <li>Pendataan aset tetap dilengkapi perhitungan depresiasi otomatis dan nilai buku</li>
                                <li>Pencatatan mutasi atau perpindahan aset tetap</li>
                                <li>Penjadwalan maintenance atau perbaikan aset tetap selama 1 tahun secara otomatis
                                </li>
                                <li>Pembuatan QR Code untuk setiap aset tetap yang tersimpan pada sistem</li>
                            </ul>
                        </p>

                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Pembuatan Akun</strong></h3>
                        <p class="mb-2" align="justify">
                            <ol>
                                <li>Pengguna menuju halaman utama sistem</li>
                                <li>Pengguna menekan register</li>
                                <li>Pengguna mengisi data yang diminta pada form register</li>
                                <li>Pengguna WAJIB men-checkmark register as tenant (daftar sebagai tenant)</li>
                                <li>Pengguna menekan tombol register</li>
                                <li>Akun berhasil dibuat</li>
                                <li>Menunggu verifikasi dari admin sistem</li>
                                <li>Setelah diverifikasi, pengguna dapat menggunakan sistem</li>
                            </ol>
                        </p>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Penggunaan Sistem</strong></h3>
                        <p class="mb-2" align="justify">
                            Pengguna perlu memasukan beberapa data sebelum benar-benar dapat menggunakan sistem secara
                            keseluruhan.
                            Data yang dimaksud wajib ditambahkan pada sistem karena terkait dengan penggunaan fitur
                            sistem.
                            Data terdiri dari kategori aset tetap, lokasi mutasi aset, tipe perbaikan aset, unit atau
                            divisi perusahaan, dan orang atau karyawan pada perusahaan.
                            Pembahasan penggunaan sistem berlanjut pada tab memasukan data, mengubah data, dan menghapus
                            data.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Utama</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/af42f1e6-d163-4e7e-8124-bddbb1703722?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <iframe src="https://app.tango.us/app/embed/044030a6-ebb5-4576-9818-cca49b6c2645?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <iframe src="https://app.tango.us/app/embed/4bc91dc4-adf9-4042-9b13-62a21f20cda6?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <iframe src="https://app.tango.us/app/embed/07685d45-ff88-4c65-ad21-8a9e0dcb317e?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <iframe src="https://app.tango.us/app/embed/539dbb36-d460-4589-a168-7944670440c5?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/0245056c-857f-44c9-a877-eb9ec95bbb70?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Mutasi Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/56759306-2ea1-45fd-9da0-c47acc517322?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Perbaikan Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/36300787-eafb-4e0d-9946-c2a4a5d4a91b?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <div class="tab-pane fade" id="v-pills-ubah" role="tabpanel" aria-labelledby="v-pills-ubah-tab">
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Utama</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/bb43cf5e-e10e-49d3-8fc1-ce11255e7155?iframe" sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin" security="restricted" title="Tango Workflow" width="100%" height="400px" referrerpolicy="strict-origin-when-cross-origin" frameborder="0" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" allowfullscreen="allowfullscreen"></iframe>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/59d0e540-4f08-4eb6-abb9-e8e2511b6091?iframe" sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin" security="restricted" title="Tango Workflow" width="100%" height="400px" referrerpolicy="strict-origin-when-cross-origin" frameborder="0" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" allowfullscreen="allowfullscreen"></iframe>
                        <h3><strong>Data Perbaikan Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/0b0c522f-93c2-4aef-968a-ecb2dfeeebbf?iframe" sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin" security="restricted" title="Tango Workflow" width="100%" height="400px" referrerpolicy="strict-origin-when-cross-origin" frameborder="0" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <div class="tab-pane fade" id="v-pills-hapus" role="tabpanel" aria-labelledby="v-pills-hapus-tab">
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Utama</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/d4be614f-45da-43b5-b8e5-61fce6e3e8ad?iframe" sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin" security="restricted" title="Tango Workflow" width="100%" height="400px" referrerpolicy="strict-origin-when-cross-origin" frameborder="0" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" allowfullscreen="allowfullscreen"></iframe>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/fe235cc2-fd21-4f3e-bafe-489ff87a439f?iframe" sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin" security="restricted" title="Tango Workflow" width="100%" height="400px" referrerpolicy="strict-origin-when-cross-origin" frameborder="0" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" allowfullscreen="allowfullscreen"></iframe>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Data Perbaikan Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/cd763ab7-c5e3-42b6-bbfc-77a74ca7c35b?iframe" sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin" security="restricted" title="Tango Workflow" width="100%" height="400px" referrerpolicy="strict-origin-when-cross-origin" frameborder="0" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <div class="tab-pane fade" id="v-pills-validasi" role="tabpanel"
                        aria-labelledby="v-pills-validasi-tab">
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Validasi Mutasi Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/c4828410-fb19-4bf2-a8f2-9869c2f51f34?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                        <h3 class="text-dark font-weight-medium mb-0"><strong>Pembatalan Mutasi Aset Tetap</strong></h3>
                        <iframe src="https://app.tango.us/app/embed/5af1d1a4-a1a6-41f3-89ad-cf640813b404?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <div class="tab-pane fade" id="v-pills-qrcode" role="tabpanel" aria-labelledby="v-pills-qrcode-tab">
                        <iframe src="https://app.tango.us/app/embed/f53a9abf-55f5-40b7-8538-df101c23a153?iframe"
                            sandbox="allow-scripts allow-top-navigation-by-user-activation allow-popups allow-same-origin"
                            security="restricted" title="Tango Workflow" width="100%" height="400px"
                            referrerpolicy="strict-origin-when-cross-origin" frameborder="0"
                            webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"
                            allowfullscreen="allowfullscreen"></iframe>
                    </div>
                </div> <!-- end tab-content-->
            </div> <!-- end col-->
        </div>
    </div>
    <div class="tab-pane" id="lactivity">
        <ul>
            <li>User: {{$users}}</li>
            <li>Email: {{$email}}</li>
        </ul>
    </div>
</div>
@endsection