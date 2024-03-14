<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'খতিয়ান নং', 'data' => 'khotian_no'],
        ['name' => 'মৌজা', 'data' => 'mouja'],
        ['name' => 'রেঃসাঃনং', 'data' => 'resa_no'],
        ['name' => 'তৌজি নং', 'data' => 'touja_no'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function jlno()
    {
        return $this->belongsTo(Jlno::class);
    }
    public function saDetailsOne()
    {
        return $this->hasMany(SaDetail::class, 'sa_id');
    }
    public function saDetailsTwo()
    {
        return $this->hasMany(SaDetailsTwo::class, 'sa_id');
    }
    public function saDetailsThree()
    {
        return $this->hasMany(SaDetailsThree::class, 'sa_id');
    }
    public function saDetailsFour()
    {
        return $this->hasMany(SaDetailsFour::class, 'sa_id');
    }
}
