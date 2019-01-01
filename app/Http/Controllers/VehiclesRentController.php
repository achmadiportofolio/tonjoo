<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRentStoreRequest;
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
    public function index(Request $request)
    {

        $vrQuery = VehicleRent::query();


        $vrQuery->select(DB::raw('vehicle_rent.*, 
                                        vehicle_rent_detail.vehicle_rent_id,
                                        vehicle_rent_detail.category_id,
                                        category.category_name,
                                        vehicle_rent_detail.vehicle_rent_detail_transaction_name,
                                        vehicle_rent_detail.vehicle_rent_detail_nominal,
                                        vehicle_rent_detail.group_code,
                                        vehicle_rent_detail.id as vehicle_rent_detail_id'));
        $vrQuery->join('vehicle_rent_detail', 'vehicle_rent_detail.vehicle_rent_id', '=', 'vehicle_rent.id');
        $vrQuery->join('category', 'vehicle_rent_detail.category_id', '=', 'category.id');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $start_date = request()->get('start_date');
            $end_date   = request()->get('end_date');
            $vrQuery->whereBetween('vehicle_rent.vehicle_rent_date', [$start_date, $end_date]);
        }
        if ($request->filled('category_id')) {
            $category_id = request()->get('category_id');
            $vrQuery->where('vehicle_rent_detail.category_id', $category_id);
        }
        if ($request->filled('vehicle_rent_description')) {
            $vehicle_rent_description = request()->get('vehicle_rent_description');
            $vrQuery->where(
                'vehicle_rent.vehicle_rent_description',
                'like',
                $vehicle_rent_description . '%'
            );
        }

        $vehicleRent = $vrQuery->orderBy('vehicle_rent.created_at')->paginate(5);
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
    public function store(VehicleRentStoreRequest $request)
    {
        $vehicleRent = new VehicleRent(
            [
                'vehicle_rent_description' => $request->get('vehicle_rent_description'),
                'vehicle_rent_date'        => $request->get('vehicle_rent_date'),
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
                        'group_code'                           => $uid,
                        'category_id'                          => $category,
                        'vehicle_rent_detail_nominal'          => $d['vehicle_rent_detail_nominal'],
                        'vehicle_rent_detail_transaction_name' => $d['vehicle_rent_detail_transaction_name']

                    ]
                );
                $vehicleRent->vehicleRentDetail()->save($vehicleRentDetail);
            }
        }

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
    public function update(VehicleRentStoreRequest $request, $id)
    {
        $vc                           = VehicleRent::findOrFail($id);
        $vc->vehicle_rent_description = $request->get('vehicle_rent_description');
        $vc->vehicle_rent_code        = $request->get('vehicle_rent_code');
        $vc->vehicle_rent_rate        = $request->get('vehicle_rent_rate');
        $vc->vehicle_rent_date        = $request->get('vehicle_rent_date');
        $vc->save();

        $detail = $request->get('detail');
        $vc->category()->detach();
        foreach ($detail as $uid => $detail) {
            $category = $detail['category'];
            $data     = $detail['data'];

            foreach ($data as $d) {
                $vehicleRentDetail = VehicleRentDetail::create(
                    [
                        'group_code'                           => $uid,
                        'category_id'                          => $category,
                        'vehicle_rent_detail_nominal'          => $d['vehicle_rent_detail_nominal'],
                        'vehicle_rent_detail_transaction_name' => $d['vehicle_rent_detail_transaction_name']

                    ]
                );
                $vc->vehicleRentDetail()->save($vehicleRentDetail);
            }
        }

        return redirect()->route('sewaKendaraan.index')->with('success', 'Data berhasil disimpan.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vc                       = VehicleRent::findOrFail($id);
        $vehicle_rent_description = $vc->vehicle_rent_description;
        $vehicle_rent_code        = $vc->vehicle_rent_code;
        $vc->vehicleRentDetail()->delete();

        if ($vc->delete()) {
            return redirect()->route('sewaKendaraan.index')
                ->with(
                    'success',
                    'Data transaksi '
                    . $vehicle_rent_code
                    . ' ('
                    . $vehicle_rent_description
                    . ') berhasil dihapus.'
                );
        }

        return redirect()->route('sewaKendaraan.index')
            ->with(
                'success',
                'Data transaksi '
                . $vehicle_rent_code
                . ' ('
                . $vehicle_rent_description
                . ') gagal dihapus.'
            );
    }
}
