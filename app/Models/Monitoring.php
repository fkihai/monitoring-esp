<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'temp',
        'hum',
        'nh3',
        'fan1',
        'fan2',
        'fan3',
        'fan4'
    ];
}
