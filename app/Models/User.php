<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'last_name',
        'email',
        'password',
        // Урок 9
        'avatar',
        'last_login_at'
    ];

    // Урок 9
    protected $dates = [
        'last_login_at'
    ];
    // -----

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
        // Урок 8
        'is_admin' => 'boolean'
    ];

    // Урок 9
    public $timestamps = false; // Сделали, чтобы при обновлении в БД в таблице user столбца 'last_login_at' столбец 'updated_at' не обновлялся. Обрати внимание, что в миграции для 'last_login_at' делали тип timestamp, а столбцы 'created_at' и 'updated_at' относятся к типу timestamps и именно его мы тут меняем.
    // -----
}
