@extends('dashboard')

@section('dashboard_content')
    <div class="row">
        <div class="col-lg-12" style="padding: 10px;">
            <h4 class="text-uppercase">Daftar transaksi</h4>
            <hr>
            <div class="row filter">
                <div class="col-lg-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!! $vehicleRent->appends(\Illuminate\Support\Facades\Input::except('page')) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Code</th>
                            <th scope="col">Rate Euro</th>
                            <th scope="col">Kategory</th>
                            <th scope="col">Nama Transaksi</th>
                            <th scope="col">Nominal (IDR )</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vehicleRent as $rent)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td >{{$rent->vehicle_rent_description }}</td>
                            <td >{{$rent->vehicle_rent_code }}</td>
                            <td >{{$rent->vehicle_rent_rate }}</td>
                            <td >{{$rent->category_name }}</td>
                            <td >{{$rent->vehicle_rent_detail_transaction_name }}</td>
                            <td >{{ number_format($rent->vehicle_rent_detail_nominal, 2, ',', '.' ) }}</td>
                            <td >
                                <a class="btn btn-info" href="{{route('sewaKendaraan.edit', $rent->id)}}" role="button">Edit Parent</a>
                                <a class="btn btn-info" href="{{route('sewaKendaraan.edit', $rent->vehicle_rent_detail_id)}}" role="button">Edit</a>
                                <a class="btn btn-warning" href="{{route('sewaKendaraan.destroy', $rent->id )}}" role="button">Delete Parent</a>
                                <a class="btn btn-warning" href="{{route('sewaKendaraan.destroy', $rent->vehicle_rent_detail_id )}}" role="button">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @if($vehicleRent->count()<=0)
                        <tr>
                            <th scope="row">#</th>
                            <td colspan="6"> Data Tidak Ditemukan</td>
                        </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!! $vehicleRent->appends(\Illuminate\Support\Facades\Input::except('page')) !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@push('dashboard_script')
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endpush
@push('dashboard_styles')
    <style>

    </style>
@endpush
