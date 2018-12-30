@extends('base')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{url('/')}}" class="text-decoration-none">
                        <h4>Home</h4>
                    </a>
                </li>
                <li class="list-group-item disabled" aria-disabled="true"><h4>Dashboard</h4></li>
                <li class="list-group-item">
                    <h5>Data Transaksi </h5>
                </li>
                <li class="list-group-item {{ Route::currentRouteName()=='sewaKendaraan.create'?'list-group-item-success': '' }} ">
                    <a href="{{route('sewaKendaraan.create')}}" class="text-decoration-none"> Tambah Data Transaksi </a>
                </li>
                <li class="list-group-item {{ Route::currentRouteName()=='sewaKendaraan.index'?'list-group-item-success': '' }} ">
                    <a href="{{route('sewaKendaraan.index')}}" class="text-decoration-none"> List Data Transaksi </a>
                </li>
                <li class="list-group-item {{ Route::currentRouteName()=='sewaKendaraan.index'?'list-group-item-success': '' }} ">
                    <a href="{{route('sewaKendaraan.index')}}" class="text-decoration-none"> Rekap Transaksi </a>
                </li>
                <li class="list-group-item {{ Route::currentRouteName()=='landing.page'?'list-group-item-success': '' }}">
                    <a href="{{url('/landing_page')}}" class="text-decoration-none">
                        <h4>Layout</h4>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9">
            @yield('dashboard_content')
        </div>
    </div>
@endsection('content')

@push('base.javascripts')
    @stack('dashboard_script')
@endpush

@push('base.styles')
    @stack('dashboard_styles')
@endpush