<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    // use this code to override default value where the table creates update at field in database
    public $timestamps = false;
    protected $primaryKey = 'booking_id';
    public $keyType = 'string';
}
