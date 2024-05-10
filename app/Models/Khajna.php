<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khajna extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'তারিখ', 'data' => 'date'],
        ['name' => 'খতিয়ান নং', 'data' => 'khotian_no'],
        ['name' => 'জেলা', 'data' => 'district'],
        ['name' => 'হোল্ডিং নং', 'data' => 'holding_no'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
    public function owners()
    {
        return $this->hasMany(OwnerDetail::class, 'khajna_id');
    }
    public function lands()
    {
        return $this->hasMany(LandDetail::class, 'khajna_id');
    }
}
