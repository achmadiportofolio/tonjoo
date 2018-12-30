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
                {{--<div class="col-lg-6">--}}
                    {{--{!! $vehicleRent->appends(\Illuminate\Support\Facades\Input::except('page')) !!}--}}
                {{--</div>--}}
                <div class="col-lg-12 ">
                    {{--<form class="form-inline" method="GET" ACTION="{{route('sewaKendaraan.index')}}" >--}}

                        {{--<button class="btn btn-success"></button>--}}
                    {{--</form>--}}

                    {{--<form action="{{route('sewaKendaraan.index')}}" method="GET" class="form-inline">--}}
                        {{--<div class="form-row align-items-lg-stretch">--}}
                            {{--<div class="col-sm-3 my-1">--}}
                                {{--<label class="sr-only" for="inlineFormInputName">Start Date</label>--}}
                                {{--<input type="text" class="form-control" id="inlineFormInputName" placeholder="Start Date">--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-3 my-1">--}}
                                {{--<label class="sr-only" for="inlineFormInputGroupUsername">End Date</label>--}}
                                {{--<div class="input-group">--}}
                                    {{--<div class="input-group-prepend">--}}
                                        {{--<div class="input-group-text">s/d</div>--}}
                                    {{--</div>--}}
                                    {{--<input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="End Date">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-auto my-1">--}}
                                {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    <form class="form-inline float-right" action="{{route('sewaKendaraan.index')}}" method="GET">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input name="start_date" value="{{request()->get('start_date')}}" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Start Date">

                        <label class=" mb-2 mr-sm-2" for="inlineFormInputGroupUsername2">s/d</label>
                        <div class="input-group mb-2 mr-sm-2">
                            {{--<div class="input-group-prepend">--}}
                                {{--<div class="input-group-text">@</div>--}}
                            {{--</div>--}}
                            <input name="end_date" value="{{request()->get('end_date')}}" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="End Date">
                        </div>
                        {{--<div class="input-group mb-2 mr-sm-2">--}}
                            <select name="category_id" class="form-control mb-2 mr-sm-2" >
                                <option value="0" {{request()->get('category_id')==0?'selected': ''}}>
                                    Income
                                </option>
                                <option value="1" {{request()->get('category_id')==1?'selected': ''}}>
                                    Expense
                                </option>
                            </select>
                        {{--</div>--}}
                        <input name="vehicle_rent_detail_transaction_name" value="{{request()->get('vehicle_rent_detail_transaction_name')}}" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Description">



                        {{--<div class="form-check mb-2 mr-sm-2">--}}
                            {{--<input class="form-check-input" type="checkbox" id="inlineFormCheck">--}}
                            {{--<label class="form-check-label" for="inlineFormCheck">--}}
                                {{--Remember me--}}
                            {{--</label>--}}
                        {{--</div>--}}

                        <button type="submit" class="btn btn-primary mb-2">cari</button>
                    </form>
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
