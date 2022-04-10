<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plateau extends Model
{
    use HasFactory;
    protected $table   = 'plateaus';
    protected $guarded = [];
}
