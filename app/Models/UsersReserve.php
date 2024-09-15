<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersReserve extends Model
{
    use HasFactory;

    protected $table = 'users_reserve';

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'otp_code',
        // tambahkan kolom lain yang sesuai dengan profil pengguna
    ];
}
