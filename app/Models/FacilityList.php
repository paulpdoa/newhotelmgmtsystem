<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityList extends Model
{
    use HasFactory;
    protected $primaryKey = 'facility_id';
    public $timestamps = false;
    public $keyType = 'string';
}
