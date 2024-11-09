<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'website'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
