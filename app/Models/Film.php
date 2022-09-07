<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
