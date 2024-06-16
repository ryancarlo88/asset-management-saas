@extends('layouts.adminmart')

@section('breadcrumb')
Aset Tetap
@endsection

@section('breadcrumbmenu')
Aset Tetap
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

@section('content')
@if ($status == 'Aset tetap baru berhasil ditambahkan!')
<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div>
        <strong>Aset tetap baru berhasil ditambahkan!</strong>
    </div>
</div>
@elseif($status == '2')
<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div>
        <strong>{{$pesan}}</strong>
    </div>
</div>
@endif
<div class="btn-list">
    <button type="button" data-toggle="modal" href="#basic" class="btn btn-primary">Tambah Aset Tetap</button>
</div>
<br>
<div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered no-wrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Aset</th>
                <th>Kategori</th>
                <th>Kode</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asset as $a)
            <tr id="tr_id_{{$a->id}}">
                <td id="td_id_{{$a->id}}">{{$a->id}}</td>
                <td id="td_name_{{$a->id}}">{{$a->name}}</td>
                <td id="td_category_{{$a->id}}">{{$a->category->category}}</td>
                <td id="td_code_{{$a->id}}">{{$a->code}}</td>
                <td id="td_location_{{$a->id}}">{{$a['loc_name']}}</td>
                <td id="td_status_{{$a->id}}">{{$a->status}}</td>
                <td>
                    <a class="btn waves-effect waves-light btn-info" href="{{url('/detailasset/'.$a->id)}}">Detail</a>
                    <a class="btn waves-effect waves-light btn-info" href="{{url('/barcode/'.$a->id)}}"
                        target="_blank">QR Code</a>
                    <a class="btn waves-effect waves-light btn-warning" href="{{url('/updateasset/'.$a->id)}}" >Perbarui</a>
                    <button type="submit" class="btn waves-effect waves-light btn-danger" onclick="if(confirm('Apakah anda yakin menghapus data aset tetap ini?')) deleteDataFromTR({{$a->id}})">Hapus</button>
                </td>
            </tr>
            @endforeach

    </table>
</div>



<div class="modal fade" id="basic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Aset Tetap Baru</h4>

            </div>
            <div class="modal-body">
                <h6>Kategori</h6>
                <form method="POST" action="{{route('asset.store')}}">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="inpCategory" required>
                            <option value="">Pilih Kategori Aset</option>
                            @foreach ($category as $c)
                            <option value="{{$c->id}}">{{$c->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h6>Nama Aset</h6>
                    <div class="form-group">
                        <input type="text" class="form-control" id="placeholder" name="inpName"
                            placeholder="Nama Aset" required>
                    </div>
                    <h6>Kode</h6>
                    <div class="form-group">
                        <input type="text" class="form-control" id="placeholder" name="inpCode"
                            placeholder="Kode Aset" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Status</h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="inpStatus" required>
                            <option value="">Pilih Status Aset</option>
                            <option value="On Procurement">On Procurement</option>
                            <option value="Assigned">Assigned</option>
                            <option value="Disposed">Disposed</option>
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
                                <input type="number" class="form-control" name="inpCost" placeholder="Harga" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="inpAge" placeholder="Umur" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="inpResValue" placeholder="Nilai Sisa" required>
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
                            placeholder="Isi deskripsi disini..." required></textarea>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
@endsection

@section('script')
<script>
    function deleteDataFromTR(id){
        $.post('{{route('fixedasset.deleteData')}}',{_token:"<?php echo csrf_token(); ?>", id:id},
            function(data){
                if(data.status == 'ok'){
                    alert(data.msg)
                    $('#tr_'+ id).remove();
                }
                else{
                    alert(data.msg)
                }
                location.reload();
            }
        )};
</script>
    
@endsection