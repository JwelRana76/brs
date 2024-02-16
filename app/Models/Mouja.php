<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouja extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'থানা', 'data' => 'upazila'],
        ['name' => 'নাম', 'data' => 'name'],
        ['name' => 'কোড', 'data' => 'code'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
}
