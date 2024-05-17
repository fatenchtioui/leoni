<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datavc12 extends Model
{
    use HasFactory;
    protected $fillable = [
        'hc_direct',
        'hc_indirect',
        'abs_p',
        'abs_np',
        'fluctuation'
    
    ];
}
