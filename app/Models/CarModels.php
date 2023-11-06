<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModels extends Model
{
    use HasFactory;

    protected $fillable = ['company','model'];
}
