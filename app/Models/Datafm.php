<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datafm extends Model
{
    use HasFactory;
    protected $fillable = [
        'sales_budget',
        'sales_actual'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
