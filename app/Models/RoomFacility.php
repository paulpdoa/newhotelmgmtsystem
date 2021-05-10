<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    use HasFactory;
    protected $primaryKey = 'room_facility_id';
    public $timestamps = false;
    public $keyType = 'string';
}
