<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cs extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'খতিয়ান নং', 'data' => 'khotian_no'],
        ['name' => 'মৌজা', 'data' => 'mouja'],
        ['name' => 'রেঃসাঃনং', 'data' => 'resa_no'],
        ['name' => 'তৌজি নং', 'data' => 'touja_no'],
        ['name' => 'পরগণা', 'data' => 'porogona'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function jlno()
    {
        return $this->belongsTo(Jlno::class);
    }
    public function csDetailsOne()
    {
        return $this->hasMany(SaDetail::class, 'cs_id');
    }
    public function csDetailsTwo()
    {
        return $this->hasMany(SaDetailsTwo::class, 'cs_id');
    }
    public function csDetailsThree()
    {
        return $this->hasMany(SaDetailsThree::class, 'cs_id');
    }
    public function csDetailsFour()
    {
        return $this->hasMany(SaDetailsFour::class, 'cs_id');
    }
}
