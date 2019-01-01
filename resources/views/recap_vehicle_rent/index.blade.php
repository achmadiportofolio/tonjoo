@extends('dashboard')

@section('dashboard_content')
    <div class="row">
        <div class="col-lg-12" style="padding: 10px;">
            <h4 class="text-uppercase">Rekap transaksi</h4>
            <hr>
            <div class="row filter">
                <div class="col-lg-12">

                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 ">

                    <form class="form-inline float-right" action="{{route('rekapSewaKendaraan.index')}}" method="GET">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input name="start_date" value="{{request()->get('start_date')}}" type="text"
                               class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Start Date">

                        <label class=" mb-2 mr-sm-2" for="inlineFormInputGroupUsername2">s/d</label>
                        <div class="input-group mb-2 mr-sm-2">

                            <input name="end_date" value="{{request()->get('end_date')}}" type="text"
                                   class="form-control" id="inlineFormInputGroupUsername2" placeholder="End Date">
                        </div>
                        <select name="category_id" class="form-control mb-2 mr-sm-2">
                            <option value="">
                                All
                            </option>
                            <option value="0" {{request()->get('category_id')==='0'?'selected': ''}}>
                                Income
                            </option>
                            <option value="1" {{request()->get('category_id')==1?'selected': ''}}>
                                Expense
                            </option>
                        </select>
                        <input name="vehicle_rent_description" value="{{request()->get('vehicle_rent_description')}}"
                               type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                               placeholder="Description">

                        <button type="submit" class="btn btn-primary mb-2">cari</button>
                        <a href="{{route('sewaKendaraan.index')}}" class="btn btn-danger mb-2">Reset</a>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nominal (IDR )</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vehicleRent as $rent)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$rent->vehicle_rent_date->format("d F Y") }}</td>
                                <td>{{$rent->category_name }}</td>
                                <td style="text-align: right;">{{ number_format($rent->vehicle_rent_detail_nominal, 0, ',', '.' ) }}</td>
                            </tr>
                        @endforeach
                        @if($vehicleRent->count()<=0)
                            <tr>
                                <th scope="row">#</th>
                                <td colspan="6" style="text-align: center;"><strong>Data Tidak Ditemukan</strong></td>
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
