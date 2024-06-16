@extends('layouts.adminmart')

@section('breadcrumb')
Mutasi Aset
@endsection

@section('breadcrumbmenu')
Mutasi Aset
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
            {{-- @if(Auth::user()->id == 1) --}}
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
            {{-- @endif --}}
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Mutasi
                        Aset Tetap
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('mutation')}}" class="sidebar-link"><span class="hide-menu">
                                Lihat Mutasi</span></a></li>
                                {{-- @if(Auth::user()->id == 1) --}}
                    <li class="sidebar-item"><a href="{{url('location')}}" class="sidebar-link"><span class="hide-menu">
                                Lokasi </span></a></li>
                                {{-- @endif --}}
                </ul>
            </li>
            {{-- @if(Auth::user()->id == 1) --}}
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
            {{-- @endif --}}
            {{-- @if(Auth::user()->id == 1) --}}
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Sumber
                        Daya
                    </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="{{url('unit')}}" class="sidebar-link"><span class="hide-menu">
                                Unit </span></a></li>
                    <li class="sidebar-item"><a href="{{url('people')}}" class="sidebar-link"><span class="hide-menu">
                                Orang </span></a></li>
                                <li class="sidebar-item"><a href="{{url('vendor')}}" class="sidebar-link"><span class="hide-menu"> Vendor </span></a></li>
                </ul>
            </li>
            {{-- @endif --}}
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
@if ($status == 'Mutasi Aset baru berhasil ditambahkan!')
<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div>
        <strong>Mutasi Aset baru berhasil ditambahkan!</strong>
    </div>
</div>
@endif
{{-- @if(Auth::user()->id == 1) --}}
<div class="btn-list">
    <a href="{{url('/mutation/create')}}" class="btn btn-primary">Tambah Mutasi Aset Tetap</a>
    {{-- <button type="button" data-toggle="modal" data-target="#scrollable-modal" href="#basic" class="btn btn-primary">Create New Asset Mutation</button> --}}
</div>
{{-- @endif --}}
<br>
<div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered no-wrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipe</th>
                <th>Tanggal</th>
                <th>Penerima</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mutation as $m)
            <tr id="tr_{{$m->id}}">
                <td id="td_id_{{$m->id}}">{{$m->id}}</td>
                <td id="td_type_{{$m->id}}">{{$m->loc_type}}</td>
                <td id="td_date_{{$m->id}}">{{$m->date}}</td>
                <td id="td_receiver_{{$m->id}}">{{$m->name}}</td>
                <td id="td_status_{{$m->id}}">{{$m->status}}</td>
                <td>
                    <input type="hidden" name="isValidated" id="validate" value="Validated">
                    <button type="submit" class="btn waves-effect waves-light btn-success" onclick="if(confirm('Apakah anda mau memvalidasi mutasi aset ini?')) validateDataFromTR({{$m->id}})">Validasi</button>
                    <button type="button" data-toggle="modal" href="#basic{{$m->id}}"
                        class="btn btn-danger">Batalkan</button>
                    {{-- <button type="submit" class="btn waves-effect waves-light btn-danger" onclick="if(confirm('Do you want to cancel this asset mutation?')) cancelDataFromTR({{$m->id}})">Cancel</button>
                    --}}
                    <a class="btn waves-effect waves-light btn-info"
                        href="{{url('/detailmutation/'.$m->id)}}">Detail</a>
                    {{-- <a class="btn waves-effect waves-light btn-warning" href="{{url('/updatemutation/'.$m->id)}}">Edit</a>
                    <button type="submit" class="btn waves-effect waves-light btn-danger"
                        onclick="if(confirm('Do you want to delete this asset mutation?')) deleteDataFromTR({{$m->id}})">Delete</button>
                    --}}
                </td>
            </tr>

            <div class="modal fade" id="basic{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Pembatalan Mutasi Aset
                            </h4>

                        </div>
                        <div class="modal-body">
                            <h6>Alasan Pembatalan</h6>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="inpReason" id="reason{{$m->id}}"
                                    placeholder="Alasan untuk pembatalan mutasi ..."></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            {{-- <input type="text" name="idB" value="{{$m->id}}"> --}}
                            <input type="hidden" name="isCancelled" id="cancel" value="Cancelled">
                            <button type="button" class="btn waves-effect waves-light btn-danger"
                                onclick="if(confirm('Apakah anda mau membatalkan mutasi aset ini?')) cancelDataFromTR({{$m->id}})">Batal</button>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            @endforeach
    </table>
</div>

{{-- <div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog"
		                                    aria-labelledby="scrollableModalTitle" aria-hidden="true">
			                                    <div class="modal-dialog modal-dialog-scrollable">
			                                        <div class="modal-content">
			                                            <div class="modal-header">
			                                                <h4 class="modal-title" id="scrollableModalTitle">New Asset Mutation</h4>
			                                                
			                                            </div>
			                                            <div class="modal-body">
                                                            <h6>Date</h6>
			                                                <form>
                                                                <div class="form-group">
                                                                    <input type="date" class="form-control">
                                                                </div>
                                                            </form>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h6>Sender</h6>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h6>Receiver</h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" placeholder="Sender's Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" placeholder="Receiver's Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h6>Source Location</h6>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h6>Target Location</h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" placeholder="Source Location">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" placeholder="Target Location">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h6>Type</h6>

                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="customControlValidation2"
                                                                        name="radio-stacked">
                                                                    <label class="custom-control-label" for="customControlValidation2">Intracompany</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="customControlValidation3"
                                                                        name="radio-stacked">
                                                                    <label class="custom-control-label" for="customControlValidation3">Intercompany</label>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <h6>Fixed Asset</h6>
                                                            </div>
                                                            <div class="mt-3">
                                                            <h6>Description</h6>
                                                                    <form>
                                                                         <div class="form-group">
                                                                                 <textarea class="form-control" rows="3" placeholder="Additional Notes Here ..."></textarea>
                                                                         </div>
                                                                    </form>
                                                        </div>
                                                                
                                                            
			                                            </div>
			                                            <div class="modal-footer">
			                                                <button type="button" class="btn btn-light"
			                                                    data-dismiss="modal">Discard</button>
			                                                <button type="button" class="btn btn-primary">Create</button>
			                                            </div>
			                                        </div><!-- /.modal-content -->
			                                    </div><!-- /.modal-dialog -->
			                                </div> --}}


@endsection
@section('script')
<script>
    function validateDataFromTR(id) {
        $.post("{{route('mutation.validateData')}}", {
                _token: "<?php echo csrf_token(); ?>",
                id: id
            },
            function (data) {
                if (data.status == 'ok') {
                    alert(data.msg)
                } else {
                    alert(data.msg)
                }
                location.reload();
            }
        )
    };

    function cancelDataFromTR(id) {
        var reason = $('#reason'+ id).val();
        $.post("{{route('mutation.cancelData')}}", {
                _token: "<?php echo csrf_token(); ?>",
                id: id,
                reason: reason
            },
            function (data) {
                if (data.status == 'ok') {
                    alert(data.msg)
                } else {
                    alert(data.msg)
                }
                location.reload();
            }
        )
    };
</script>

@endsection