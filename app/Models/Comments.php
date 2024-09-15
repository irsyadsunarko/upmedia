<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'name',
        'profile_pic',
        'comment',
        'product_id',
    ];
}
