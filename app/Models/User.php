<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Datafw;
use App\Models\Datafm;
use App\Models\Datavc;
use App\Models\Datarh;
use App\Models\Com;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function datafinws()
    {
        return $this->hasMany(Datafw::class);
    }
    public function datafinms()
    {
        return $this->hasMany(Datafm::class);
    }
    public function datarhs()
    {
        return $this->hasMany(Datarh::class);
    }
    public function datavcs()
    {
        return $this->hasMany(Datavc::class);
    }
    public function coms()
    {
        return $this->hasMany(Com::class);
    }
    
}
