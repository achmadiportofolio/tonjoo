@extends('dashboard')

@section('dashboard_content')
    <div class="row">
        <div class="col-lg-12" style="padding: 10px;">
            <h4 class="text-uppercase">input data transaksi</h4>
            <hr>

            <form action="{{route('sewaKendaraan.update', $vr->id )}}" method="POST" style="padding: 10px;">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-lg-3">Description</div>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="vehicle_rent_description"
                                          id="vehicle_rent_description" rows="5"
                                          required>{{$vr->vehicle_rent_description }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-lg-4">Code</div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="vehicle_rent_code"
                                           id="vehicle_rent_code" placeholder="Code"
                                           value="{{$vr->vehicle_rent_code}}"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">Rate Euro</div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="vehicle_rent_rate"
                                           id="vehicle_rent_rate" placeholder="Rate Euro"
                                           value="{{$vr->vehicle_rent_rate}}"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">Date Paid</div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="vehicle_rent_date"
                                           id="vehicle_rent_date" placeholder="Date Paid"
                                           value="{{$vr->vehicle_rent_date->format('Y-m-d')}}"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Data transaksi -->
                <div class="row">
                    <div class="col-lg-12" style="border: 1px solid rgba(0, 0, 0, 0.7); padding: 10px;">
                        <h4> Data Transaksi</h4>
                        <hr>
                        <div class="row" style="padding: 10px;">
                            <div class="col-lg-12">

                                <!-- dinamic list-->
                                @php
                                    $vr->vehicleRentDetail = $vr->vehicleRentDetail->groupBy('group_code');
                                @endphp
                                <div class="row" style="padding: 10px;">
                                    <div class="col-lg" id="list_transaksi">

                                        @foreach($vr->vehicleRentDetail as $key_uid => $vehicleRentDetail)
                                            <div class="row row-transaksi"
                                                 style="border: solid rgba(0, 0, 0, 0.1); padding: 10px;"
                                                 data-id="{{(string) $key_uid}}">
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="col-lg-2">Category</div>
                                                        <div class="col-lg-10">
                                                            <select name="detail[{{(string) $key_uid}}][category]"
                                                                    class="form-control category "
                                                                    required>
                                                                <option value="0" {{$vehicleRentDetail->first()->category_id==0?'selected': ''}}>
                                                                    Income
                                                                </option>
                                                                <option value="1" {{$vehicleRentDetail->first()->category_id==1?'selected': ''}}>
                                                                    Expense
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-10">
                                                            <table class="table user-transaksi">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Nama Transaksi</th>
                                                                    <th scope="col">Nominal</th>
                                                                    <th scope="col">#</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($vehicleRentDetail as $key => $row)
                                                                    <tr>
                                                                        <th>
                                                                            <input type="text"
                                                                                   class="form-control detail_name"
                                                                                   id=""
                                                                                   name="detail[{{(string) $key_uid}}][data][{{$key}}][vehicle_rent_detail_transaction_name]"
                                                                                   value="{{$row->vehicle_rent_detail_transaction_name}}"
                                                                                   placeholder="Nama Transaksi"
                                                                                   required>
                                                                        </th>
                                                                        <td>
                                                                            <input type="number"
                                                                                   class="form-control detail_nominal"
                                                                                   name="detail[{{(string) $key_uid}}][data][{{$key}}][vehicle_rent_detail_nominal]"
                                                                                   value="{{$row->vehicle_rent_detail_nominal}}"
                                                                                   placeholder="Nominal"
                                                                                   required>
                                                                        </td>
                                                                        <td>
                                                                            @if($key > 0)
                                                                                <button class="btn btn-danger remove-users-transaksi-row">
                                                                                    -
                                                                                </button>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <button class="btn btn-success add-users-transaksi">+</button>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row float-right" style="padding: 10px;">
                            <div class="col-lg-12">
                                <button class="btn btn-success" id="add_list_Transaksi">Tambah</button>
                            </div>
                        </div>

                    </div>
                </div>

                <hr>
                <div class="row float-right">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="submit" class="btn btn-danger ">Back</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
@push('dashboard_script')
    <script type="text/javascript">
        $(document).ready(function () {

            function createUUID() {
                var s = [];
                var hexDigits = "0123456789abcdef";
                for (var i = 0; i < 36; i++) {
                    s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
                }
                s[14] = "4";  // bits 12-15 of the time_hi_and_version field to 0010
                s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1);  // bits 6-7 of the clock_seq_hi_and_reserved to 01
                s[8] = s[13] = s[18] = s[23] = "-";

                var uuid = s.join("");
                return uuid;
            }

            function readyForm() {
                let dataUUID01 = createUUID()
                let dataUUID02 = createUUID()
                let row_first = $('#list_transaksi div:nth-child(1)')
                row_first.attr('data-id', dataUUID01)
                row_first.find('.detail_name').attr('name', 'detail[' + dataUUID01 + '][data][' + dataUUID02 + '][vehicle_rent_detail_transaction_name]')
                row_first.find('.detail_nominal').attr('name', 'detail[' + dataUUID01 + '][data][' + dataUUID02 + '][vehicle_rent_detail_nominal]')
                row_first.find('.category').attr('name', 'detail[' + dataUUID01 + '][category]')

            }

            // readyForm()
            $('#add_list_Transaksi').on('click', function (e) {
                e.preventDefault();
                let dataUID = createUUID();
                let dataUUID02 = createUUID()
                let el_list_transaksi = '<div class="row row-transaksi" style="border: solid rgba(0, 0, 0, 0.1); padding: 10px;" data-id="' + dataUID + '">\n' +
                    '     <div class="col-md-11">\n' +
                    '         <div class="row">\n' +
                    '             <div class="col-lg-2">Category</div>\n' +
                    '             <div class="col-lg-10">\n' +
                    '                 <select name="detail[' + dataUID + '][category]"  class="form-control">\n' +
                    '                     <option value="0">Income</option>\n' +
                    '                     <option value="1">Expense</option>\n' +
                    '                 </select>\n' +
                    '             </div>\n' +
                    '         </div>\n' +
                    '         <div class="row">\n' +
                    '             <div class="col-lg-2"></div>\n' +
                    '             <div class="col-lg-10">\n' +
                    '                 <table class="table user-transaksi">\n' +
                    '                     <thead>\n' +
                    '                     <tr>\n' +
                    '                         <th scope="col">Nama Transaksi</th>\n' +
                    '                         <th scope="col">Nominal</th>\n' +
                    '                         <th scope="col">#</th>\n' +
                    '                     </tr>\n' +
                    '                     </thead>\n' +
                    '                     <tbody>\n' +
                    '                     <tr>\n' +
                    '                         <th >\n' +
                    '                             <input type="text" class="form-control"  name="detail[' + dataUID + '][data][' + dataUUID02 + '][vehicle_rent_detail_transaction_name]" placeholder="Nama Transaksi"\n' +
                    'required >\n' +
                    '                         </th>\n' +
                    '                         <td>\n' +
                    '                             <input type="number" class="form-control" name="detail[' + dataUID + '][data][' + dataUUID02 + '][vehicle_rent_detail_nominal]" placeholder="Nominal"\n' +
                    'required >\n' +
                    '                         </td>\n' +
                    '                         <td>\n' +
                    '                           ' +
                    '                         </td>\n' +
                    '                     </tr>\n' +
                    '                     </tbody>\n' +
                    '                 </table>\n' +
                    '             </div>\n' +
                    '         </div>\n' +
                    '     </div>\n' +
                    '     <div class="col-lg-1">\n' +
                    '         <button class="btn btn-success add-users-transaksi">+</button>\n' +
                    '         <button class="btn btn-danger remove-users-transaksi">-</button>\n' +
                    '     </div>\n' +
                    ' </div>'
                $('#list_transaksi').append(el_list_transaksi);

            });

            $('#list_transaksi').on('click', function (e) {
                e.preventDefault();
                let objEl = $(e.target);
                if (objEl.hasClass('add-users-transaksi')) {
                    let row_transaksi_scope = objEl.closest('.row-transaksi');
                    let dataUID = row_transaksi_scope.attr('data-id');
                    let dataUUID02 = createUUID()
                    let body_table = row_transaksi_scope.find('table.user-transaksi > tbody');

                    let new_row = '<tr>\n' +
                        '    <th >\n' +
                        '        <input type="text" class="form-control" name="detail[' + dataUID + '][data][' + dataUUID02 + '][vehicle_rent_detail_transaction_name]" placeholder="Nama Transaksi"\n' +
                        '               required >\n' +
                        '    </th>\n' +
                        '    <td>\n' +
                        '        <input type="number" class="form-control"  name="detail[' + dataUID + '][data][' + dataUUID02 + '][vehicle_rent_detail_nominal]" placeholder="Nominal"\n' +
                        '               required >\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <button class="btn btn-danger remove-users-transaksi-row">-</button>\n' +
                        '    </td>\n' +
                        '</tr>'
                    body_table.append(new_row)
                    return false;
                }
                if (objEl.hasClass('remove-users-transaksi')) {
                    let row_transaksi_scope = objEl.closest('.row-transaksi');
                    row_transaksi_scope.remove();
                    return false;
                }
                if (objEl.hasClass('remove-users-transaksi-row')) {
                    let row_transaksi_tr = objEl.closest('tr');
                    row_transaksi_tr.remove();
                    return false;
                }
                return false;
            });


        });
    </script>
@endpush
@push('dashboard_styles')
    <style>
        .row-transaksi {
            margin-bottom: 10px;
        }
    </style>
@endpush
