<?php

namespace App\Http\Controllers;

use App\VehicleRent;
use App\VehicleRentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VehiclesRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vrQuery = VehicleRent::query();
        $vrQuery->select(DB::raw('vehicle_rent.*, 
                                        vehicle_rent_detail.vehicle_rent_id,
                                        vehicle_rent_detail.category_id,
                                        vehicle_rent_detail.vehicle_rent_detail_transaction_name,
                                        vehicle_rent_detail.vehicle_rent_detail_nominal,
                                        vehicle_rent_detail.group_code,
                                        vehicle_rent_detail.id as vehicle_rent_detail_id'));
        $vrQuery->join('vehicle_rent_detail', 'vehicle_rent_detail.vehicle_rent_id', '=', 'vehicle_rent.id');
        $vrQuery->join('category', 'vehicle_rent_detail.category_id', '=', 'category.id');

        $vehicleRent = $vrQuery->paginate(5);
//        DD($vehicleRent);
        return view('vehicle_rent.index', compact('vehicleRent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle_rent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vehicleRent = new VehicleRent(
            [
                'vehicle_rent_description' => $request->get('vehicle_rent_description'),
//                'vehicle_rent_date'        => $request->get('vehicle_rent_date'),
                'vehicle_rent_date'        => Carbon::now(),
                'vehicle_rent_code'        => $request->get('vehicle_rent_code'),
                'vehicle_rent_rate'        => $request->get('vehicle_rent_rate')
            ]
        );

        $vehicleRent->save();
        $detail = $request->get('detail');

        foreach ($detail as $uid => $detail) {

            $category = $detail['category'];
            $data     = $detail['data'];

            foreach ($data as $d) {

                $vehicleRentDetail = VehicleRentDetail::create(
                    [
                        'group_code'                          => $uid,
                        'category_id'                          => $category,
                        'vehicle_rent_detail_nominal'          => $d['vehicle_rent_detail_nominal'],
                        'vehicle_rent_detail_transaction_name' => $d['vehicle_rent_detail_transaction_name']

                    ]
                );
                $vehicleRent->vehicleRentDetail()->save($vehicleRentDetail);
            }
        }
        dd($request->all());
        return redirect()->route('sewaKendaraan.index')->with('success', 'Data berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('vehicle_rent.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vr = VehicleRent::findOrFail($id);
        return view('vehicle_rent.edit', compact('vr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vc = VehicleRent::findOrFail($id);
        $vc->vehicle_rent_description = $request->get('vehicle_rent_description');
        $vc->vehicle_rent_code = $request->get('vehicle_rent_code');
        $vc->vehicle_rent_rate = $request->get('vehicle_rent_rate');
        $vc->vehicle_rent_date = $request->get('vehicle_rent_date');
        $vc->save();

        $detail = $request->get('detail');
//        dd($detail);
        foreach ($detail as $uid => $detail) {

            $category = $detail['category'];
            $data     = $detail['data'];

            $listData = [];
            foreach ($data as $d) {

//                $vehicleRentDetail = VehicleRentDetail::create(
//                    [
//                        'group_code'                          => $uid,
//                        'category_id'                          => $category,
//                        'vehicle_rent_detail_nominal'          => $d['vehicle_rent_detail_nominal'],
//                        'vehicle_rent_detail_transaction_name' => $d['vehicle_rent_detail_transaction_name']
//
//                    ]
//
//                );
                array_push($listData,[ $category => [
                    'group_code'                          => $uid,
//                    'category_id'                          => $category,
                    'vehicle_rent_detail_nominal'          => $d['vehicle_rent_detail_nominal'],
                    'vehicle_rent_detail_transaction_name' => $d['vehicle_rent_detail_transaction_name']

                ]] );

//                $vc->category()->sync([$category => [
//                    'group_code'                          => $uid,
////                    'category_id'                          => $category,
//                    'vehicle_rent_detail_nominal'          => $d['vehicle_rent_detail_nominal'],
//                    'vehicle_rent_detail_transaction_name' => $d['vehicle_rent_detail_transaction_name']
//
//                ]] );

            }
//            dd($listData);
            $vc->category()->sync($listData);
            dd($listData);
//            dd($request->all());
        }

        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
