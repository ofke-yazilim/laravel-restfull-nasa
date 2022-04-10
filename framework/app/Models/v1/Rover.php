<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model
{
    use HasFactory;
    protected $table   = 'rovers';
    protected $guarded = [];
}
