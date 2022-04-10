<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table   = 'states';
    protected $guarded = [];
}
