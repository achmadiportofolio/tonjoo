@extends('dashboard')

@section('dashboard_content')
    <div class="row">
        <div class="col-lg-12" style="padding: 10px;">
            <h4 class="text-uppercase">input data transaksi</h4>
            <hr>

            <form action="{{route('sewaKendaraan.store')}}" method="POST" style="padding: 10px;">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-lg-3">Description</div>
                            <div class="col-lg-9">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-lg-4">Code</div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"
                                           >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">Rate Euro</div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"
                                           >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">Date Paid</div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"
                                           >
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
                            <div class="col-lg-12" >

                                <!-- dinamic list-->
                                <div class="row" style="padding: 10px;">
                                    <div class="col-lg" id="list_transaksi">

                                        <div class="row row-transaksi" style="border: solid rgba(0, 0, 0, 0.1); padding: 10px;">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="col-lg-2">Category</div>
                                                    <div class="col-lg-10">
                                                        <select name="catetory[]"  class="form-control">
                                                            <option value="0">Income</option>
                                                            <option value="1">Expense</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-10">
                                                        <table class="table user-transaksi">
                                                            <caption>List of users</caption>
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Nama Transaksi</th>
                                                                <th scope="col">Nominal</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">Yakobus</th>
                                                                <td>Rp.000000</td>
                                                            </tr>
                                                            <tr>
                                                                <th >
                                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"
                                                                           >
                                                                </th>
                                                                <td>
                                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"
                                                                           >
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button class="btn btn-success users-transaksi" >+</button>
                                            </div>
                                        </div>

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
            console.log('xxx')
           $('#add_list_Transaksi').on('click', function (e){
               e.preventDefault();
               console.log('add-list-transaki');
               let el_list_transaksi = '<div class="row row-transaksi" style="border: solid rgba(0, 0, 0, 0.1); padding: 10px;">\n' +
                   '                                            <div class="col-md-11">\n' +
                   '                                                <div class="row">\n' +
                   '                                                    <div class="col-lg-2">Category</div>\n' +
                   '                                                    <div class="col-lg-10">\n' +
                   '                                                        <select name="catetory[]"  class="form-control">\n' +
                   '                                                            <option value="0">Income</option>\n' +
                   '                                                            <option value="1">Expense</option>\n' +
                   '                                                        </select>\n' +
                   '                                                    </div>\n' +
                   '                                                </div>\n' +
                   '                                                <div class="row">\n' +
                   '                                                    <div class="col-lg-2"></div>\n' +
                   '                                                    <div class="col-lg-10">\n' +
                   '                                                        <table class="table user-transaksi">\n' +
                   '                                                            <caption>List of users</caption>\n' +
                   '                                                            <thead>\n' +
                   '                                                            <tr>\n' +
                   '                                                                <th scope="col">Nama Transaksi</th>\n' +
                   '                                                                <th scope="col">Nominal</th>\n' +
                   '                                                            </tr>\n' +
                   '                                                            </thead>\n' +
                   '                                                            <tbody>\n' +
                   '                                                            <tr>\n' +
                   '                                                                <th scope="row">Yakobus</th>\n' +
                   '                                                                <td>Rp.000000</td>\n' +
                   '                                                            </tr>\n' +
                   '                                                            <tr>\n' +
                   '                                                                <th >\n' +
                   '                                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"\n' +
                   '                                                                           >\n' +
                   '                                                                </th>\n' +
                   '                                                                <td>\n' +
                   '                                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"\n' +
                   '                                                                           >\n' +
                   '                                                                </td>\n' +
                   '                                                            </tr>\n' +
                   '                                                            </tbody>\n' +
                   '                                                        </table>\n' +
                   '                                                    </div>\n' +
                   '                                                </div>\n' +
                   '                                            </div>\n' +
                   '                                            <div class="col-lg-1">\n' +
                   '                                                <button class="btn btn-success users-transaksi">+</button>\n' +
                   '                                            </div>\n' +
                   '                                        </div>'
               $('#list_transaksi').append(el_list_transaksi);

           }) ;
            $('#list_transaksi').on('click', function (e) {
                e.preventDefault();
                let objEl = $(e.target);
                console.log('row-transaksi')
                if(objEl.hasClass('users-transaksi')){
                    let row_transaksi_scope = objEl.closest('.row-transaksi');
                    console.log('row_transaksi_scope')
                    console.log(row_transaksi_scope)
                    let body_table  = row_transaksi_scope.find('table.user-transaksi > tbody');
                    console.log(body_table);

                    let new_row = '<tr>\n' +
                        '                                                                <th >\n' +
                        '                                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"\n' +
                        '                                                                           >\n' +
                        '                                                                </th>\n' +
                        '                                                                <td>\n' +
                        '                                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"\n' +
                        '                                                                           >\n' +
                        '                                                                </td>\n' +
                        '                                                            </tr>'
                    body_table.append(new_row)
                    console.log('row appended')
                    return false;
                }
                return false;
            })
        });
    </script>
@endpush
@push('dashboard_styles')
    <style >
        .row-transaksi{
            margin-bottom: 10px;
        }
    </style>
@endpush
