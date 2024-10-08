<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Plats()
    {
        return $this->belongsToMany(Plat::class);
    }
    public function LigneSupplement()
    {
        return  $this->hasMany(LigneSupp::class);
    }
}
