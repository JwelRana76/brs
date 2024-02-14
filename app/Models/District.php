<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'name', 'data' => 'name'],
        ['name' => 'code', 'data' => 'code'],
        ['name' => 'action', 'data' => 'action'],
    ];
}
