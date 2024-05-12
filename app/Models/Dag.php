<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $columns = [
        ['name' => 'তারিখ', 'data' => 'date'],
        ['name' => 'মৌজা', 'data' => 'mouja'],
        ['name' => 'অপশন', 'data' => 'action'],
    ];

    public function mouja()
    {
        return $this->belongsTo(Mouja::class);
    }
}
