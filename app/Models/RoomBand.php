<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBand extends Model
{
    use HasFactory;
    protected $primaryKey='room_band_id';
    public $keyType = 'string';
    public $timestamps = false;
}
