<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Livraison()
    {
        return  $this->hasMany(Livraison::class);
    }
}
