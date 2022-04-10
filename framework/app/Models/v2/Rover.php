<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model
{
    use HasFactory;
    protected $table   = 'rovers';
    protected $guarded = [];
}
