<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherLog extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude', 'weather_data', 'user_id'];

    protected $casts = [
        'weather_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
