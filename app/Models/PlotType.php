<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'ধরন', 'data' => 'type'],
        ['name' => 'নাম', 'data' => 'name'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];
}
