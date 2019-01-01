<?php

namespace App\Http\Controllers;

use App\VehicleRent;
use App\VehicleRentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RecapVehiclesRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $vrQuery = VehicleRent::query();

        $vrQuery->select(DB::raw('
                             vehicle_rent.vehicle_rent_date,
                             category.category_name,
                             sum(vehicle_rent_detail_nominal) as vehicle_rent_detail_nominal'));
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
            $vrQuery->where('vehicle_rent.vehicle_rent_description', 'like', $vehicle_rent_description . '%');
        }

        $vehicleRent = $vrQuery->groupBy(['vehicle_rent.vehicle_rent_date', 'category.category_name'])->orderBy('vehicle_rent.vehicle_rent_date')->paginate(5);
        return view('recap_vehicle_rent.index', compact('vehicleRent'));
    }


}
