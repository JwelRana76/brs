<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'জেলা', 'data' => 'district'],
        ['name' => 'নাম', 'data' => 'name'],
        ['name' => 'কোড', 'data' => 'code'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
