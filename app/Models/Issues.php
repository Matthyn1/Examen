<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Time',
        'PriceperKg',
        'StashKg',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function parts()
    {
        return $this->belongsTo('App\Models\parts');
    }
}
