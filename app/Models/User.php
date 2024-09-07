<?php

// namespace App\Models;

// use App\Models\Presenters\UserPresenter;
// use App\Models\Traits\HasHashedMediaTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\Permission\Traits\HasRoles;

// class User extends Authenticatable implements HasMedia
// {
//     use HasFactory;
//     use HasRoles;
//     use Notifiable;
//     use SoftDeletes;
//     use HasHashedMediaTrait;
//     use UserPresenter;

//     protected $guarded = [
//         'id',
//         'updated_at',
//         '_token',
//         '_method',
//         'password_confirmation',
//     ];

//     protected $dates = [
//         'deleted_at',
//         'email_verified_at',
//     ];

//     protected $fillable = [
//         'name',
//         'username',
//         'email',
//         'password',
//     ];

//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];
// }

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Traits\HasHashedMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
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
        // 'password' => 'hashed',
    ];
}
