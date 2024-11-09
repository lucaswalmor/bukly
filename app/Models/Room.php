<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'hotel_id'
    ];

    /**
     * Define o relacionamento com a model Hotel.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
