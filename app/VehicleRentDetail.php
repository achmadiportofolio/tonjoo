<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleRentDetail extends Model
{

    protected $table = 'vehicle_rent_detail';

    protected $fillable = [
        'vehicle_rent_id',
        'category_id',
        'vehicle_rent_detail_transaction_name',
        'vehicle_rent_detail_nominal',
        'group_code'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vehicleRent()
    {
        return $this->belongsTo(VehicleRent::class, 'vehicle_rent_id', 'id');
    }
}
