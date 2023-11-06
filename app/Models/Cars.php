<?php

namespace App\Models;

use App\Models\Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = ['company','user_id','model','mileage','price','year','color','engine','gearbox','fuel','location','feauters','description'];

    public function images() : HasMany{
        return $this->hasMany(Images::class);
    }
}
