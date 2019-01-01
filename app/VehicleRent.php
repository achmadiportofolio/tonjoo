<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleRent extends Model

{

    protected $table = 'vehicle_rent';

    protected $fillable = [
        'vehicle_rent_description',
        'vehicle_rent_code',
        'vehicle_rent_rate',
        'vehicle_rent_date'
    ];
    protected $casts = [
        'vehicle_rent_date' => 'date'
    ];

    public function vehicleRentDetail()
    {
        return $this->hasMany(VehicleRentDetail::class, 'vehicle_rent_id', 'id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'vehicle_rent_detail', 'vehicle_rent_id', 'category_id')
            ->withPivot([
                'vehicle_rent_detail_transaction_name',
                'vehicle_rent_detail_nominal',
                'group_code'
            ]);
    }

}

