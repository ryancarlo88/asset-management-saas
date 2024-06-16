@extends('layouts.adminmart')

@section('breadcrumb')
Create Schedule
@endsection

@section('breadcrumbmenu')
Create Schedule
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
        
        <form method="POST" action="{{route('schedule.store')}}">
            @csrf
            <div class="row mt-3">
                <div class="col-md-2">
                    <h6>Tanggal Awal</h6>
                </div>
                <div class="col-md-2">
                    <h6>Tanggal Akhir</h6>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <input type="date" name="inpSDate" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="date" name="inpEDate" class="form-control" required>
                </div>
            </div>

            <h6>Tipe Perbaikan</h6>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1" name="inpType" required>
                    <option value="">Pilih Tipe Perbaikan</option>
                    @foreach ($type as $t)
                        <option value="{{$t->id}}">{{$t->type}}</option>
                    @endforeach
                </select>
            </div>

            <h6>Vendor</h6>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1" name="inpVendor" required>
                    <option value="">Pilih Vendor</option>
                    @foreach ($vendor as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <h6>Status</h6>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect2" name="inpStatus" required>
                    <option value="">Pilih Status Jadwal</option>
                    <option value="Scheduled">Scheduled</option>
                    <option value="On Progress">On Progress</option>
                    <option value="Postponed">Postponed</option>
                    <option value="Executed">Executed</option>
                </select>
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
                    <textarea class="form-control" rows="3" name="inpDesc" placeholder="Tambah catatan disini..." required></textarea>
                </div>
            </div>
            <div style="float: right;">
                <a href="{{url('/schedule')}}" type="button" class="btn btn-light">Batal</a>
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
            markup = "<tr><td>" + "<input type='text' name='inpItem["+id+"]' class='asset_name' required>" + "</td>" +
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
</script>
    
@endsection