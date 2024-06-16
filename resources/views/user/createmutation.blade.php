@extends('layouts.adminmart')

@section('breadcrumb')
Tambah Mutasi Aset
@endsection

@section('breadcrumbmenu')
Tambah Mutasi Aset
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
<div class="card">
    <div class="card-body">
        <h6>Tanggal</h6>
        <form method="POST" action="{{route('mutation.store')}}">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <input type="date" name="inpDate" class="form-control" required>
                </div>
            </div>
            <h6>Type</h6>

            <div class="form-check form-check-inline">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" value="Intracompany" required>
                    <label class="custom-control-label" for="customControlValidation2">Intracompany</label>
                </div>
            </div>
            <div class="form-check form-check-inline">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" value="Intercompany">
                    <label class="custom-control-label" for="customControlValidation3">Intercompany</label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h6>Lokasi Awal</h6>
                </div>
                <div class="col-md-6">
                    <h6>Lokasi Tujuan</h6>
                </div>
            </div>
            <div class="row">
                <input type="hidden" id="loc_id1" name="loc_id1">
                <input type="hidden" id="loc_id2" name="loc_id2">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="loc_name" name="inpSLoc"  id="loc_name1" placeholder="Lokasi Awal" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="loc_name" name="inpTLoc" id="loc_name2" placeholder="Lokasi Tujuan" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>Penerima</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="receiver_id" name="receiver_id">
                        <input type="text" class="form-control" id="receiver_name" name="inpReceiver" placeholder="Nama Penerima" required>
                    </div>
                </div>
            </div>
            
            <div>
                <h6>Aset Tetap</h6>
                <button type="button" class="btn btn-primary" id="add-row">Tambah Baris</button>
                <table id="" class="table table-striped table-bordered no-wrap">
                    <thead>
                        <tr>
                            <th>
                                <h6>Nama Aset</h6>
                            </th>
                            <th>
                                <h6>Kode</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="inpItem[1]" class='asset_name' required></td>
                            <td><input type="text" name="inpCode1" class='asset_code' readonly></td>
                        </tr>
                </table>
            </div>

            <div class="mt-3">
                <h6>Deskripsi</h6>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="inpNotes" placeholder="Tambah catatan disini..." required></textarea>
                </div>
            </div>
            <div style="float: right;">
                <a href="{{url('/mutation')}}" type="button" class="btn btn-light">Batal</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

    </div>
</div>


@endsection


@section('script')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {

        $(".asset_name").autocomplete({
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: "{{route('mutation.getAsset')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                $('.asset_name').val(ui.item.label); // display the selected text
                $('.asset_code').val(ui.item.value); // save selected id to input
                return false;
            }
        });

    });
    let id = 2;
    $(document).ready(function () {
        $("#add-row").click(function () {
            markup = "<tr><td>" + "<input type='text' name='inpItem["+id+"]' class='asset_name' required> " + "</td>" +
                "<td><input type='text' name='inpCode"+id+"' class='asset_code' readonly></td></tr>";
            tableBody = $("table tbody");
            tableBody.append(markup);
            id++;
            $(".asset_name").each(function () {
                $(this).autocomplete({
                    source: function (request, response) {
                        // Fetch data
                        $.ajax({
                            url: "{{route('mutation.getAsset')}}",
                            type: 'post',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function (data) {
                                response(data);
                            }
                        });
                    },
                    select: function (event, ui) {
                        // Set selection
                        $(this).val(ui.item
                        .label); // display the selected text
                        $(this).parent().next().children().val(ui.item
                        .value); // save selected id to input
                        return false;
                    }
                });
            });

        });
    });

    $(document).ready(function () {


$("#loc_name1").autocomplete({
    source: function (request, response) {
        // Fetch data
        $.ajax({
            url: "{{route('mutation.getLocation')}}",
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term,
                radiostacked: $('input[name="radio-stacked"]:checked').val()
            },
            success: function (data) {
                response(data);
            }
        });
    },
    select: function (event, ui) {
        // Set selection
        $('#loc_name1').val(ui.item.label);
        $('#loc_id1').val(ui.item.value); // display the selected text 
        return false;
    }
});


});

$(document).ready(function () {


$("#loc_name2").autocomplete({
    source: function (request, response) {
        // Fetch data
        $.ajax({
            url: "{{route('mutation.getLocation')}}",
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term,
                radiostacked: $('input[name="radio-stacked"]:checked').val()
            },
            success: function (data) {
                response(data);
            }
        });
    },
    select: function (event, ui) {
        // Set selection
        $('#loc_name2').val(ui.item.label);
        $('#loc_id2').val(ui.item.value); // display the selected text 
        return false;
    }
});


});

$(document).ready(function () {


$("#receiver_name").autocomplete({
    source: function (request, response) {
        // Fetch data
        $.ajax({
            url: "{{route('mutation.getReceiver')}}",
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term,
                radiostacked: $('input[name="radio-stacked"]:checked').val()
            },
            success: function (data) {
                response(data);
            }
        });
    },
    select: function (event, ui) {
        // Set selection
        $('#receiver_name').val(ui.item.label);
        $('#receiver_id').val(ui.item.value); // display the selected text 
        return false;
    }
});


});
</script>
@endsection
