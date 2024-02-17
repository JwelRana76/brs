<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brs extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'বিভাগ', 'data' => 'division'],
        ['name' => 'নাম', 'data' => 'name'],
        ['name' => 'কোড', 'data' => 'code'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];
}
