<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 
     */
    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            if ($model->id)
                Storage::disk('local')->put('/users/'. date('Y-m') . '/'. $model->id .'/data.txt', $model);
        });
        self::updated(function($model){
            if ($model->id)
                Storage::disk('local')->append('/users/'. date('Y-m') . '/'. $model->id .'/data.txt', $model);
        });
        self::deleted(function($model){
            if ($model->id)
                Storage::disk('local')->append('/users/'. date('Y-m') . '/'. $model->id .'/data.txt', $model);
        });
    }
}
