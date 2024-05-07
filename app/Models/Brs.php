<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brs extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'তারিখ', 'data' => 'date'],
        ['name' => 'খতিয়ান নং', 'data' => 'khotian_no'],
        ['name' => 'ইউনিক আইডি', 'data' => 'unique_id'],
        ['name' => 'মৌজা', 'data' => 'mouja'],
        ['name' => 'রেঃসাঃনং', 'data' => 'resa_no'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function jlno()
    {
        return $this->belongsTo(Jlno::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function brs_details()
    {
        return $this->hasMany(BrsDetail::class, 'brs_id');
    }
}
