<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datarh extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_forcast_s1',
        'production_calendar',
        'customer_calendar',
        'customer_consumption_last_12_week',
        'stock_plant_tic_tool'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
