<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jlno extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'মৌজা', 'data' => 'mouja'],
        ['name' => 'নাম', 'data' => 'name'],
        ['name' => 'কোড', 'data' => 'code'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function mouja()
    {
        return $this->belongsTo(Mouja::class);
    }
}
