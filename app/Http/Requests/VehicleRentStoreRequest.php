<?php
/**
 * Created by PhpStorm.
 * User: achmadiachmadi
 * Date: 01/01/19
 * Time: 08.06
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class VehicleRentStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'vehicle_rent_description'                             => 'required|min:5',
            'vehicle_rent_date'                                    => 'required|date',
            'vehicle_rent_code'                                    => 'required|string|max:255|min:1',
            'vehicle_rent_rate'                                    => 'required|numeric',
            'detail.*.category'                                    => 'required|numeric',
            'detail.*.data.*.vehicle_rent_detail_transaction_name' => 'required|string|max:255|min:2',
            'detail.*.data.*.vehicle_rent_detail_nominal'          => 'required|numeric|min:100|max:100000000',

        ];
    }

    public function messages()
    {
        return [
            'vehicle_rent_description.required'                             => 'Data Deskripsi harus diisi dan minimal 5 karakter.',
            'vehicle_rent_description.min'                                  => 'Data Deskripsi harus diisi dan minimal 5 karakter.',
            'vehicle_rent_date.required'                                    => 'Data Tanggal harus diisi dengan format 9999-99-99.',
            'vehicle_rent_date.date'                                        => 'Data Tanggal harus diisi dengan format 9999-99-99.',
            'vehicle_rent_code.required'                                    => 'Data Kode Transaksi harus diisi dengan minimal 1 karakter dan maksimal 255 karakter kode.',
            'vehicle_rent_code.string'                                      => 'Data Kode Transaksi harus diisi dengan minimal 1 karakter dan maksimal 255 karakter kode.',
            'vehicle_rent_rate.required'                                    => 'Data Rate Uang harus diisi dengan angka',
            'vehicle_rent_rate.numeric'                                     => 'Data Rate Uang harus diisi dengan angka',
            'detail.*.data.*.vehicle_rent_detail_transaction_name.required' => 'Data Nama Transaksi harus diisi dengan minimal 2 karakter dan maksimal 255 karakter ',
            'detail.*.data.*.vehicle_rent_detail_transaction_name.max'      => 'Data Nama Transaksi harus diisi dengan minimal 2 karakter dan maksimal 255 karakter ',
            'detail.*.data.*.vehicle_rent_detail_transaction_name.min'      => 'Data Nama Transaksi harus diisi dengan minimal 2 karakter dan maksimal 255 karakter ',
            'detail.*.data.*.vehicle_rent_detail_nominal.required'          => 'Data Nominal Transaksi harus diisi dengan minimal 100 rupiah dan maksimal 100.000.000 rupaih ',
            'detail.*.data.*.vehicle_rent_detail_nominal.numeric'           => 'Data Nominal Transaksi harus diisi dengan minimal 100 rupiah dan maksimal 100.000.000 rupaih ',
            'detail.*.data.*.vehicle_rent_detail_nominal.min'               => 'Data Nominal Transaksi harus diisi dengan minimal 100 rupiah dan maksimal 100.000.000 rupaih ',
            'detail.*.data.*.vehicle_rent_detail_nominal.max'               => 'Data Nominal Transaksi harus diisi dengan minimal 100 rupiah dan maksimal 100.000.000 rupaih ',

        ];
    }

}