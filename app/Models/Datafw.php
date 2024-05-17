<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datafw extends Model
{
    use HasFactory;
    protected $fillable = [
        'week_number',
        'date',
        'nh_budget',
        'nh_actual',
        'efficience_budget',
        'efficience_actual',
       

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
